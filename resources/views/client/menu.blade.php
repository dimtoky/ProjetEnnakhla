@extends('layouts.client')

@section('title', 'Menu')



@section('head')
   <link href="css/menustyle.css" rel="stylesheet">
@endsection



@section('content')
  <h1>Bonjour {{$name}}</h1>
        <div class="panel panel-default">
            <div class="panel-heading">Mes Fichiers</div>
            <div class="panel-body">


                <div class="row">
                    <div class="col-lg-12" style="">
                        <ul class="list-group list-group-header">
                            <li class="list-group-item list-group-body">
                                <div class="row"  >
                                    <div class="col-lg-4 text-left">Nom</div>
                                    <div class="col-lg-2 text-left">Ajouté le</div>
                                    <div class="col-lg-2 text-center" >Etat</div>
                                    <div class="col-lg-2 col-lg-offset-2 text-center">Valider</div>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-group list-group-body" style="">
                          
                                 @if ($files!=NULL)
                                     @foreach ($files as $fileU)
                                    <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-4 text-left" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span> {{ $fileU['name'] }}
                                    </div>
                                    <div class="col-lg-2" style="">{{ $fileU['info']['day'] }} {{ $fileU['info']['month'] }} {{ $fileU['info']['time'] }}</div>
                                    <div class="col-lg-2" style="">
                                      @foreach ($validatedfiles as $validatedfile)
                                          @if ($validatedfile->nom == $fileU['name'])
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">Validé
                                        </div>
                                        </div>
                                            @endif
                                       @endforeach   

                                    </div>
                                   
                                    <div class="col-lg-2 col-lg-offset-2 text-center ">  
                                                              
                                       <a href="{!! url('validatef/'.$fileU['name'].'') !!}" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                                    </div>

                                </div>
                            </li>
                                   @endforeach
                                   @endif
               
                        </ul>        
                    </div>
                </div>
                <div class="row">
                    <a id="addbutton" href="{!! url('addfiles') !!}" class="btn btn-success btn-lg col-sm-6 col-sm-offset-10">Envoyer fichier</a>
                </div>

            </div>

        </div>
@endsection