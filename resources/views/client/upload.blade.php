@extends('layouts.client')

@section('title', 'Menu')



@section('head')
  <link href="css/fileinput.min.css" rel="stylesheet">
    <link href="css/uploadstyle.css" rel="stylesheet">
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"
    />
    <script type="text/javascript" src="  {!! asset('js/bootstrap-filestyle.min.js') !!}"> </script>
    <script src="js/fileinput.js"></script>
    <script src="js/locales/fr.js"></script>
 
    <script>
        $(document).ready(function () {
            var date_input = $('input[name="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'dd/mm/yyyy',
                language: 'ru',
                container: container,
                todayHighlight: true,
                autoclose: true,

            };
            date_input.datepicker(options);
        })

    </script>
@endsection



@section('content')
       <div class="panel panel-default">
      <div class="panel-heading">Envoi de fichiers via FTP</div>
                <div class="panel-body">
                    <form action="{!! url('upload') !!}" method="POST" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                        <div class="form-group">
                        <h4>Sélectionnez votre fichier puis appuyez sur le bouton 'Envoyer' pour commencer le transfert FTP.</h4>
                        <h4>Une fois le bouton 'Envoyer' pressé, attendez le message de confirmation de réception.</h4>
                          <h4>Vous pouvez par la suite valider votre fichier dans le menu principal pour notifier l'imprimerie.</h4>
                               <h4><b>ATTENTION :</b> Ne validez que les fichiers que vous considérez comme prêts pour impression.</h4>
                        </div>
                        <div class="form-group">
                          @if ($issend == 1)
       <div class="alert alert-success">
                                 <strong> Le fichier a été correctement transmis sur le serveur FTP.</strong>
       </div>   
       @elseif ($issend == 2)
        <div class="alert alert-danger">
                                 <strong> Erreur à la transmission du fichier, veuillez réessayer.</strong>
       </div>   
        @elseif ($issend == 3)
        <div class="alert alert-warning">
                                 <strong> Aucun fichier selectionné !</strong>
       </div>   
       @endif
                         </div>
                    <!--    <div class="form-group">
                            <label for="usr">Nom:</label>
                            <input type="text" name='nom' class="form-control" id="usr" placeholder="Nom du fichier">
                        </div>
                        <div class="form-group">
                            <label for="usr">Code ID:</label>
                            <input type="text" name='ID' class="form-control" id="usr" placeholder="Code ID">
                        </div>
                        <div class="form-group">
                        
                            <label class="control-label" for="date">Date</label>
                            <input class="form-control" id="date" name="date" placeholder="JJ/MM/AAAA" type="text" />
                        </div>-->
                         <div class="form-group">
                          <label class="control-label" for="date">Fichier</label>
                         <input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonText="Fichier à envoyer" data-buttonName="btn-primary">
                         </div>
                         <br><br>
                          <div class="form-group">
                          <div class="row">
                           
                          <a href="{!! url('home') !!}" class="btn btn-default btn-lg col-sm-2 col-sm-offset-1" role="button" >Retour au menu</a>
                   <input type="submit" value="Envoyer" name="submit" class="btn btn-success btn-lg col-sm-2 col-sm-offset-6" >
                    </div>
                    </div>
                    </form>
 </div>
 </div>
                   
@endsection