<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ftpfiles;
use App\ftpclients;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\FValidation;

class validationFilesController extends Controller
{
     /*
    |--------------------------------------------------------------------------
    | Controlleur des de la validation de fichiers
    |--------------------------------------------------------------------------
    |
    | Ce controlleur gére les validations des fichiers 
    */


/**
     * génére le formulaire de validation, si le fichier est deja validé, on effectue une redirection vers le menu
     *
     * @return view
     */
    public function create($fname)
  {
       $validatedfile = ftpfiles::where('nom','=', $fname)->where('user_id', '=', Auth::user()->id)->first();

if ($validatedfile == NULL) {
     return view('client.validate', ['name' => Auth::user()->name, 'issend' => 0 , 'fname' => $fname ]); 
}else
{
    return redirect()->back();
}
    
  }

/**
     * ajoute la validation dans la table ftpfiles et envoie une notification par mail de la validation
     *
     * @return view
     */
  public function store(Request $request)
    {
        $validatedfile = new ftpfiles;

        $validatedfile->nom = $request->fname;

        $validatedfile->user_id = Auth::user()->id;

        $validatedfile->code = $request->code;

        $validatedfile->save();

        Mail::to('dimension43@hotmail.fr')
            ->send(new FValidation(Auth::user()->name, $request->fname));

         return view('client.validate', ['name' => Auth::user()->name, 'issend' => 1 , 'fname' => $request->fname ]); 
    }

/**
     * retire une validation de la table ftpfiles
     *
     * @return void
     */
    public function delete(Request $request)
    {
         $validatedfile = ftpfiles::find($request->id);
         $validatedfile->delete();
          return redirect('/home');


    }
}
