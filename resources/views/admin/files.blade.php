   @extends('layouts.admin')

   @section('title', 'Fichiers récents')

   @section('content')
    <div class="panel panel-default">
                        <div class="panel-heading">Fichiers Validés</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" style="">                                 
                                    <ul class="list-group list-group-header">
                                        <li class="list-group-item list-group-body">
                                            <div class="row">
                                                <div class="col-lg-4 text-left">Nom</div>
                                                <div class="col-lg-2 text-center">Validé le</div>
                                                <div class="col-lg-2 text-center">Uploader</div>
                                                <div class="col-lg-2 text-center">N° Commande</div>
                                                <div class="col-lg-2 text-center">Retirer</div>
                                            </div>
                                        </li>
                                    </ul>
                                      <ul class="list-group list-group-body" style="">
                                        <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({ trigger: "hover" });   
});
</script>
                                     @foreach ($validatedfiles as $validatedfile)
                                   
                                    
                              
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-4 text-left" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" data-toggle="popover" data-placement="bottom"  data-trigger="hover"  data-content="{{ $validatedfile->nom}}"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
                                                
                                                {{ $validatedfile->nom}}
                                                </div>
                                                <div class="col-lg-2 text-center" style="">{{ $validatedfile->created_at }} </div>
                                                <div class="col-lg-2 text-center" style="">  {{$validatedfile->name }}</div>
                                                <div class="col-lg-2 text-center" style=""> {{ $validatedfile->code }}</div>
                                                <div class="col-lg-2 text-center">
                                                 <form  role="form" method="POST" action="{!! url('deleteValidation') !!}">
                                                  {{ csrf_field() }}
                                                   <input id="name" type="hidden" class="form-control" name="id" value="{{ $validatedfile->id}}">
                                                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                   
                                  
                                    @endforeach
                                 
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
     <div class="panel panel-default">
                        <div class="panel-heading">Fichiers récents</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" style="">                                 
                                    <ul class="list-group list-group-header">
                                        <li class="list-group-item list-group-body">
                                            <div class="row">
                                                <div class="col-lg-4 text-left">Nom</div>
                                                <div class="col-lg-3 text-center">Ajouté le</div>
                                                <div class="col-lg-3 text-center">Uploader</div>
                                                <div class="col-lg-2 text-center">Taille Fichier</div>
                                                
                                            </div>
                                        </li>
                                    </ul>
                                      <ul class="list-group list-group-body" style="">
                                        <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({ trigger: "hover" });   
});
</script>
                                     @foreach ($files as $file)
                                     @if ($file!=NULL)
                                     @foreach ($file as $fileU)
                                     @if ((date('M') == $fileU['info']['month'])&($fileU['info']['day'] >= (date('d')-3) ))
                              
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-4 text-left" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" data-toggle="popover" data-placement="bottom"  data-trigger="hover"  data-content="{{ $fileU['name'] }}"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
                                                @if ($fileU['info']['day'] == date('d'))
                                                   <span class="badge">Nouveau</span>
                                                @endif
                                                {{ $fileU['name'] }}
                                                </div>
                                                <div class="col-lg-3 text-center" style="">{{ $fileU['info']['day'] }} {{ $fileU['info']['month'] }} {{ $fileU['info']['time'] }}</div>
                                                <div class="col-lg-3 text-center" style="">{{ $fileU['client'] }}</div>
                                                <div class="col-lg-2 text-center" style="">{{ number_format($fileU['info']['size']/1000000, 2, '.', '') }} Mo</div>
                                               

                                            </div>
                                        </li>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                 
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
@endsection