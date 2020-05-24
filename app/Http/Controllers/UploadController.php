<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ftpclients;

class UploadController extends Controller
{
   /*
    |--------------------------------------------------------------------------
    | Controlleur des pages principales
    |--------------------------------------------------------------------------
    |
    | Ce controlleur genere le formulaire d'upload de fichiers et gére l'upload sur le 
    | serveur FTP
    */


/**
     * génére le formulaire d'upload
     *
     * @return view
     */
  public function create()
  {
     return view('client.upload', ['name' => Auth::user()->name, 'issend' => 0 ]);
    
  }

/**
     * effecture l'upload du fichiers en se connectant au serveur FTP avec les identifiants
     * correspondant à l'utilisateur connecté
     * @return view
     */
  public function store(Request $request)
    {
        
    if ($request->fileToUpload == NULL) {
      return view('client.upload', ['name' => Auth::user()->name, 'issend' => 3 ]);
    }else {
      
    

        $ftpclient = Auth::user();
        $ftpconid = ftpclients::where('user_id',$ftpclient->id)->first();
// Mise en place d'une connexion basique
 $conn_id = ftp_connect(env('FTP_REMOTESERVER'));

// Identification avec un nom d'utilisateur et un mot de passe
$login_result = ftp_login($conn_id, $ftpconid->nom, $ftpconid->mot_de_passe);

// Charge un fichier
if (ftp_put($conn_id, $request->fileToUpload->getClientOriginalName(), $request->file('fileToUpload'), FTP_ASCII)) {
 return view('client.upload', ['name' => Auth::user()->name, 'issend' => 1 ]);
} else {
 return view('client.upload', ['name' => Auth::user()->name, 'issend' => 2 ]);
}

// Fermeture de la connexion
ftp_close($conn_id);
    }}


}
