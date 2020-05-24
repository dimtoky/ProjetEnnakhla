<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\addUserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\registerMail;
use App\ftpclients;

class addUserController extends Controller
{
         /*
    |--------------------------------------------------------------------------
    | Controlleur Ajouts utilisateurs
    |--------------------------------------------------------------------------
    |
    | Ce controlleur permet la creation de nouveaux utilisiteurs pour  
    | l'application
    | 
    |
    */


/**
     * Crée la vue pour le formulaire d'ajout d'utilisateurs
     *
     * @return view
     */
   public function create()
    {
       
if(Auth::check() && Auth::user()->role_id == 3)
        {
  return view('admin.newuser',  ['name' =>  Auth::user()->name, 'OK' => false , 'isadmin' => true ]);
        }
else if(Auth::check() && Auth::user()->role_id == 2)
        {
  return view('admin.newuser',  ['name' =>  Auth::user()->name, 'OK' => false , 'isadmin' => false  ]);
        }
else
        {
  return ("Accés Interdit");
        }

    }


/**
     * Ajoute un utilisateur à la BDD et lui envoie un mail
     *
     * @return view
     */
    public function store(addUserRequest $request)
    {

$request['password'] = str_random(8);

 Mail::to($request['email'])
            ->send(new registerMail($request->except('_token')));

        
        if(Auth::check() && Auth::user()->role_id == 3)
        {
 User::create([
            
            'company' => $request['company'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id' => $request['role_id'],
        ]);
$user = User::where('name',$request['name'] )->first();

$ftpclient = new ftpclients;

$ftpclient->user_id = $user->id;
$ftpclient->nom = $user->name;
$ftpclient->mot_de_passe = str_random(8);
if($request['role_id']==1)
{
$ftpclient->repertoire = '/home/ftp/'.$user->name;
}
else
{
$ftpclient->repertoire = '/home/ftp';
}


$ftpclient->save();

         return view('admin.newuser',  ['name' =>  Auth::user()->name, 'OK' => true, 'isadmin' => true ]);
        }
else if(Auth::check() && Auth::user()->role_id == 2)
        {
  User::create([
            
            'company' => $request['company'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id' => 1,
        ]);

$user = User::where('name',$request['name'] )->first();

$ftpclient = new ftpclients;

$ftpclient->user_id = $user->id;
$ftpclient->nom = $user->name;
$ftpclient->mot_de_passe = str_random(8);
$ftpclient->repertoire = '/home/ftp/'.$user->name;

$ftpclient->save();


         return view('admin.newuser',  ['name' =>  Auth::user()->name, 'OK' => true, 'isadmin' => false ]);
        }
        

       
         
    }

   
}

