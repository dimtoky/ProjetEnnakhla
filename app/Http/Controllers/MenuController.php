<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ftpManager;
use Illuminate\Support\Facades\Auth;
use App\ftpfiles;
use App\User;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{  /*
    |--------------------------------------------------------------------------
    | Controlleur des pages principales
    |--------------------------------------------------------------------------
    |
    | Ce controlleur permet d'identifier si l'utilisateur connecté est un admin 
    | ou pas et de renvoyer la page principal associée à son niveau
    |
    */


/**
     * récupére le role_id de la session et génére la vue correspondante
     *
     * @return view
     */
	public function logright()
	    {
		$user =  Auth::user()->role_id;
		

		if ($user == 1)
		{
			  $files = app('App\Http\Controllers\ftpManager')->getclientfiles(Auth::user()->id);
			   $validatedfiles = ftpfiles::where('user_id', '=', Auth::user()->id)->get();
			return view('client.menu', ['name' =>  Auth::user()->name, 'files' => $files, 'validatedfiles' => $validatedfiles] );
		}
		else if  ($user == 2 || $user == 3)
		{
			$files = app('App\Http\Controllers\ftpManager')->getfiles();
			
			$validatedfiles = DB::table('ftpfiles')
			->select('ftpfiles.nom', 'ftpfiles.id','ftpfiles.created_at','users.name','ftpfiles.code')
            ->join('users', 'ftpfiles.user_id', '=', 'users.id')
			->orderBy('ftpfiles.created_at', 'desc')
            ->get();


			return view('admin.files', ['name' =>  Auth::user()->name, 'files' => $files, 'validatedfiles' => $validatedfiles] );
		}
	}
}
