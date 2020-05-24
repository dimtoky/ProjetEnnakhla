<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;

class contactController extends Controller
{      /*
    |--------------------------------------------------------------------------
    | Controlleur du formulaire de contact
    |--------------------------------------------------------------------------
    |
    | Ce controlleur gére la creation du formulaire de contact et l'envoie du
    | message par mail 
    |
    */


/**
     * Crée le vue du formulaire contact
     *
     * @return view
     */
     public function create()
  {
     return view('client.contact', ['name' => Auth::user()->name, 'issend' => 0 ]);
    
  }

/**
     * Envoie le mail en utilisant les information du formulaire
     *
     * @return view
     */
    public function send(Request $request)
    {
        
        Mail::to('dimension43@hotmail.fr')
          ->send(new contactMail($request->except('_token')));



    return view('client.contact', ['name' => Auth::user()->name, 'issend' => 1 ]);


    }
}
