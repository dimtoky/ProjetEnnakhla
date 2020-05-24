<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\modifyUserRequest;
use App\Http\Requests\modifyPasswordRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ftpManager;
use App\ftpclients;

class ClientController extends Controller
{
         /*
    |--------------------------------------------------------------------------
    | Controlleur fonctions de Clients
    |--------------------------------------------------------------------------
    |
    | Ce controlleur regroupe toute les actions concenrant les clients
    | 
    |
    */


/**
     * Crée la vue du profile d'un utilisateur
     *
     * @return view
     */
    public function getprofile()
    {
        if(Auth::check())
        {
        $user =  Auth::user();

       	return view('client.profile', ['name' =>  Auth::user()->name, 'user' => $user ,'passmod' => 0 ,'check' => false] );
        }
          else
    {
        return redirect('/');
    }
    }


/**
     * Crée la vue du profile avec les infos d'identification FTP ajoutées
     *
     * @return view
     */
    public function getftp(Request $request)
    {
        if(Auth::check())
        {
        $user =  Auth::user();
       $curPassword = $request['curpassword'];
if (Hash::check($curPassword, $user->password))
{
     $ftpclient = ftpclients::where('user_id', Auth::user()->id)->first();
       	return view('client.profile', ['name' =>  Auth::user()->name, 'user' => $user ,'passmod' => 0 ,'check' => true , 'ftpuser' => $ftpclient] );
}
else
{
return view('client.profile', ['name' =>  Auth::user()->name, 'user' => $user ,'passmod' => 4 ,'check' => false] );
}

        }
          else
    {
        return redirect('/');
    }
    }


/**
     * Methode qui gére la modification des mots de passe
     *
     * @return view
     */
        public function modifypassword(modifyPasswordRequest $request)
    {
        if(Auth::check())
        {
         $user = Auth::user();
         $curPassword = $request['curpassword'];
         $Password = $request['password'];
         $CPassword = $request['confirmedpassword'];



if (Hash::check($curPassword, $user->password))
{
 if ( $Password ==  $CPassword)
  {
        $user_id = $user->id;
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($Password);
        $obj_user->save();

        return view('client.profile', ['name' =>  Auth::user()->name, 'user' => $user ,'passmod' => 1,'check' => false] );
}
 else
        {
            return view('client.profile', ['name' =>  Auth::user()->name, 'user' => $user ,'passmod' => 3,'check' => false] );
        }
 }
else
{
       return view('client.profile', ['name' =>  Auth::user()->name, 'user' => $user ,'passmod' => 2,'check' => false ]  );
}
        }
          else
    {
        return redirect('/');
    }
    }



/**
     * Methode qui renvoie la liste de tous les clients ou de tous les utilisateurs (clients et autres)
     *
     * @return view
     */
    public function getclients()
    {
if(Auth::check() && Auth::user()->role_id == 2)
        {
        $users = DB::table('users')->where('role_id', '=', 1)->get();
        
        return view('admin.lClient', ['name' =>  Auth::user()->name, 'users' => $users ] );
        }
else if(Auth::check() && Auth::user()->role_id == 3)
        {
        $users = DB::table('users')->orderBy('role_id', 'desc')->get();
        
        return view('admin.lClient', ['name' =>  Auth::user()->name, 'users' => $users ] );
        }
         else
    {
        return ("Accés Interdit");
    }
    }
   
/**
     * Methode qui renvoie les informations d'un utilisateur
     * @param  $id 
     * @return view
     */
    public function getclient($id)
    {
if(Auth::check() && (Auth::user()->role_id == 2 || Auth::user()->role_id == 3))
        {
        $users = DB::table('users')->where('id', '=', $id)->first();
        if ($users->role_id == 1) {
             $files = app('App\Http\Controllers\ftpManager')->getclientfiles($id);
             return view('admin.pClient', ['name' =>  Auth::user()->name, 'user' => $users  , 'OK' => false,'files' => $files, 'isadmin' => FALSE] );
        }
        else
        {
             return view('admin.pClient', ['name' =>  Auth::user()->name, 'user' => $users  , 'OK' => false, 'isadmin' => TRUE] );
        }
       
        }
         else
    {
        return ("Accés Interdit");
    }
    }



/**
     * Methode qui gére la modification des informations d'un utilisateur
     * @param  Request $request
     * @return view
     */
      public function modifyclient(Request $request )
    {
if(Auth::check() && (Auth::user()->role_id == 2 || Auth::user()->role_id == 3))
        {
     $users = DB::table('users')
            ->where('id', '=', $request['id'])
            ->update(['company' => $request['company'],
                      'name' => $request['name'],
                     'email' => $request['email']]);

            return redirect('lClient');              
        }
         else
    {
        return ("Accés Interdit");
    }
    }


/**
     * Methode qui gére la suppression d'un utilisateur,on supprime son compte sur le site et son compte FTP
     * @param  Request $request
     * @return view
     */
     public function deleteclient(Request $request)
    {
if(Auth::check() && (Auth::user()->role_id == 2 || Auth::user()->role_id == 3))
        {

           $deletedRows = ftpclients::where('user_id', $request['id'])->delete(); 
          $users = DB::table('users')
            ->where('id', '=', $request['id'])
            ->delete();

            return redirect('lClient');  
        }
         else
    {
        return ("Accés Interdit");
    }
    }

}
