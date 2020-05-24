@extends('layouts.client')

@section('title', 'Menu')



@section('head')
  <link href="css/fileinput.min.css" rel="stylesheet">
    <link href="css/uploadstyle.css" rel="stylesheet">
   
@endsection



@section('content')
       <div class="panel panel-default">
      <div class="panel-heading">Validation du fichier "{{$fname}}"</div>
                <div class="panel-body">
                    <form action="{!! url('validatef') !!}" method="POST">
                      {!! csrf_field() !!}
                        <div class="form-group">
                        <h4>La validation permet de notifier l'imprimerie Ennakhla de la disponibilité d'un fichier sur le serveur FTP.</h4>
                        <h4>Si vous disposez du Numéro de commande, merci de le renseigner.</h4>
                        <h4><b>ATTENTION :</b> Ne validez que les fichiers que vous considérez comme prêts pour impression.</h4>
                        <h4>Si vous désirez modifier un fichier avant validation, supprimez le fichier du serveur FTP et envoyer la version modifiée.</h4>
                        </div>
                        <div class="form-group">
                          @if ($issend == 1)
       <div class="alert alert-success">
                                 <strong> Le fichier a été validé, merci.</strong>
       </div>   
       @elseif ($issend == 2)
        <div class="alert alert-danger">
                                 <strong> Erreur lors de la validation, veuillez réessayer.</strong>
       </div>   
       @endif
                         </div>
                          <div class="form-group">
                            <label for="usr">Fichier:</label>
                            <p class="form-control">{{$fname}}</p>
                           <input type="hidden" name='fname'  id="usr" value="{{$fname}}">
                        </div>

                      <div class="form-group">
                            <label for="usr">Numéro de commande:</label>
                            <input type="text" name='code' class="form-control" id="usr" placeholder="Ajouter un numéro de commande si disponible">
                        </div>
                      
                         <br><br>
                          <div class="form-group">
                          <div class="row">
                           
                          <a href="{!! url('home') !!}" class="btn btn-default btn-lg col-sm-2 col-sm-offset-1" role="button" >Retour au menu</a>
                   <input type="submit" value="Valider" name="submit" class="btn btn-success btn-lg col-sm-2 col-sm-offset-6" >
                    </div>
                    </div>
                    </form>
 </div>
 </div>
                   
@endsection