   @extends('layouts.admin')

   @section('title', 'Profil' )

   @section('content')
      <div class="panel panel-default col-lg-12" >
  <h1 class="page-header " style="text-align: center;">Profil de {{$user->name}}</h1>
  <div class="row">
  @if ($isadmin)
<div class="col-sm-12">
  @else
<div class="col-sm-5">
@endif
<div class="panel panel-default" >
 <div class="panel-heading">Informations</div>
   @if ($OK==true)
                               <div class="alert alert-success">
                                 <strong> Utilisateur modifié</strong>
                                </div>   
                                @endif
 <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{!! url('modifyUser') !!}">
                        {{ csrf_field() }}
                         <input id="id" type="hidden" class="form-control" name="id" value="{{$user->id}}">
                          @if ($isadmin)
 <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Fonction</label>

                            <div class="col-md-6">
                           @if ($user->role_id == 3)  
                                <input id="name" type="text" class="form-control" name="name" value="Administrateur" disabled>
                           @else
                                <input id="name" type="text" class="form-control" name="name" value="Service Client" disabled>
                           @endif
                            </div>
                        </div>
@endif
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" disabled>
                            </div>
                        </div>


                       <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Entreprise</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" name="company" value="{{$user->company}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required>

                            </div>
                        </div>

                        <br>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                               <input class="btn btn-default" value="Annuler" type="reset"> 
                               
                            </div>
                          
                        </div>
                    </form>
                     <div class="form-group">
                            <div class="col-md-7 col-md-offset-4">
                     <form class="form-horizontal" role="form" method="POST" action="{!! url('deleteUser') !!}">
                      {{ csrf_field() }}
                         <input id="id" type="hidden" class="form-control" name="id" value="{{$user->id}}">
                     <button type="submit" class="btn btn-danger">Supprimer</button>
                       </form>
                       </div>
                       </div>
      </div>
</div>
</div>
    <div class="col-sm-7">
   @if (!$isadmin) <div class="panel panel-default" >
     <div class="panel-heading">Fichiers</div>
  <div class="panel-body">
      <div class="row">
                                <div class="col-lg-12" style="">
                                    <!--   <div class="panel panel-default list-group-panel">-->
                                    <!--    <div class="panel-body"> -->
                                    <ul class="list-group list-group-header">
                                        <li class="list-group-item list-group-body">
                                            <div class="row">
                                                <div class="col-lg-4 text-left">Nom</div>
                                                <div class="col-lg-4 text-center">Ajouté le</div>
                                                <div class="col-lg-4 text-center">Taille</div>
                                            
                                            </div>
                                        </li>
                                    </ul>
                                    
                                    <ul class="list-group list-group-body" style="">
                                    
                             <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({ trigger: "hover" });   
});
</script>
                                    @if ($files!=NULL)
                                     @foreach ($files as $fileU)
                                     
                                         <li class="list-group-item">
                                      
                                            <div class="row">
                                                <div  class="col-lg-4 text-left filename" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" data-placement="bottom" data-toggle="popover"  data-trigger="hover"  data-content="{{ $fileU['name'] }}"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span> {{ $fileU['name'] }}
                                                </div>
                                                <div class="col-lg-4 text-center" style="">{{ $fileU['info']['day'] }} {{ $fileU['info']['month'] }} {{ $fileU['info']['time'] }}</div>
                                             <div class="col-lg-4 text-center" style="">{{ number_format($fileU['info']['size']/1000000, 2, '.', '') }} Mo</div>
                                                

                                            </div>
                                        </li>
                                   
                                    @endforeach
                                    @else
                                     <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-12 text-center"> Aucun Fichier
                                                </div>
                                              
                                            </div>
                                        </li>
                                    @endif  
                                  
                                                                
                                    </ul>
                                </div>
                            </div>
      </div>
</div>
    </div>

 @endif
  
  </div>
</div>
@endsection