@extends('layouts.client')

@section('title', 'Profile')



@section('head')

@endsection



@section('content')
   <div class="panel panel-default" >
  <h1 class="page-header " style="text-align: center;">Mon Compte</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="img/defaultUser.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h2>{{$name}}</h2>
        
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3>Informations</h3>
     <div class="form-horizontal" >
        <div class="form-group">
          <label class="col-lg-3 control-label">Nom:</label>
          <div class="col-lg-8">      
              <input class="form-control" type="text" value="{{$user->name}}" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Entreprise</label>
          <div class="col-lg-8">
            <input class="form-control"  type="text" value="{{$user->company}}" disabled>
          </div>
        </div>  
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
               <input class="form-control"  type="text" value="{{$user->email}}" disabled>
          </div>
        </div> 
        @if ($check)
        <h3>Compte FTP</h3>
        <h5 style="color:#006ef4;">Utilisez ces informations pour vous connecter au serveur FTP avec un client comme FileZilla</h5>
         <div class="form-group">
          <label class="col-lg-3 control-label">Serveur</label>
          <div class="col-lg-8">
            <p class="form-control">Addresse serveur</p>
          </div>
        </div>  
          <div class="form-group">
          <label class="col-lg-3 control-label">Identifiant</label>
          <div class="col-lg-8">
             <p class="form-control">{{$ftpuser->nom}}</p>
          </div>
        </div>  
        <div class="form-group">
          <label class="col-lg-3 control-label">Mot de passe:</label>
          <div class="col-lg-8">
                <p class="form-control">{{$ftpuser->mot_de_passe}}</p>
          </div>
        </div>
        @else
         <h3>Compte FTP</h3>
          <form class="form-horizontal" role="form"  method="POST" action="{!! url('getftpac') !!}">
        {{ csrf_field() }}
        <h5 style="color:#006ef4;">Utilisez ces informations pour vous connecter au serveur FTP avec un client comme FileZilla</h5>
        <div class="form-group">
          <label class="col-md-3 control-label">Mot de passe Actuel:</label>
          <div class="col-md-8">
            <input class="form-control" name="curpassword"  type="password">
          @if ($passmod==4)
              <div class="alert alert-danger">
                    <strong>Mauvais mot de passe !</strong>
              </div>   
              
          @endif
          </div>
        </div>
        </div>
           <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">

               <button type="submit" class="btn btn-success">Afficher</button>
            <span></span>
           
              
          </div>
         
        </div>
        </form>
        @endif
         <h3>Modifiers mot de passe</h3>
          <form class="form-horizontal" role="form"  method="POST" action="{!! url('modifypassword') !!}">
        {{ csrf_field() }}
         <div class="form-group">
          <label class="col-md-3 control-label">Mot de passe Actuel:</label>
          <div class="col-md-8">
            <input class="form-control" name="curpassword"  type="password">
          @if ($passmod==2)
              <div class="alert alert-danger">
                    <strong>Mauvais mot de passe actuel !</strong>
              </div>   
          @endif
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Nouveau Mot de passe:</label>
          <div class="col-md-8">
            <input class="form-control" name="password"  type="password">
            @if ($passmod==3)
              <div class="alert alert-danger">
                   <strong>Les mots de passe ne correspondent pas !</strong>
              </div>   
          @endif
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirmer:</label>
          <div class="col-md-8">
            <input class="form-control" name="confirmedpassword"  type="password">
          </div>
        </div>                       
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
           @if ($passmod==1)
              <div class="alert alert-success">
                  <strong> Mot de passe modifié</strong>
              </div>   
          @endif
               <button type="submit" class="btn btn-primary">Modifier</button>
            <span></span>
            <input class="btn btn-default" value="Annuler" type="reset">
              
          </div>
         
        </div>
   
       </form>
       
    </div>
     </div>    
  </div>
</div>
@endsection