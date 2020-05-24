       @extends('layouts.admin')

        @section('title', 'Liste clients')

   @section('content')
      <div class="panel panel-default">
                        <div class="panel-heading">Liste clients</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" style="">

                                    <ul class="list-group list-group-body" style="">
                                        <li class="list-group-item">
                                            <div class="row">

@foreach ($users as $user)
          <div class="col-lg-3 text-center">
                                                    <a href="{!! url('lClient/'.$user->id.'') !!}">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">{{ $user->name }} <br> {{ $user->company }}</div>
                                                            @if ($user->role_id == 1)
                                                            <div class="panel-body"><img src="img/defaultUser.png" class="img-responsive" style="width:100%"
                                                                    alt="Image">
                                                            </div>
                                                            @else
                                                             <div class="panel-body"><img src="img/plogo.png" class="img-responsive" style="width:100%"
                                                                    alt="Image">
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </a>
                                                </div>
@endforeach

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endsection