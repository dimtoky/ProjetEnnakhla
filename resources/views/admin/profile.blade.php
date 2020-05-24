@extends('layouts.admin')

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
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">Nom:</label>
          <div class="col-lg-8">      
             <p class="form-control-static">{{$user->name}}</p>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Entreprise</label>
          <div class="col-lg-8">
          <p class="form-control-static">{{$user->company}}</p>
          </div>
        </div>  
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
             <p class="form-control-static">{{$user->email}}</p>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Modifier Mot de passe:</label>
          <div class="col-md-8">
            <input class="form-control"  type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirmer:</label>
          <div class="col-md-8">
            <input class="form-control"  type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Modifier" type="button">
            <span></span>
            <input class="btn btn-default" value="Annuler" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection