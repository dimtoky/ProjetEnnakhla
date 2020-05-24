    @extends('layouts.admin')

 @section('title', 'Ajouter Utilisateur')

   @section('content')
              @if ($OK==true)
                               <div class="alert alert-success">
                                 <strong> L'utilisateur a été ajouté.</strong>
                                </div>   
                                @endif
                                   
                                
                            <div>
                              <div class="panel panel-default">
                <div class="panel-heading">Ajout Clients</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{!! url('newUser') !!}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Entreprise</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" name="company" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <!--  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->
                         @if ($isadmin==true)
                        <div class="form-group">
                        <label for="role" class="col-md-4 control-label">Catégorie:</label>
                         <div class="col-md-6">
                          
                               <select class="form-control" id="sel1" name="role_id"  required>
                                   <option value="1">Client</option>
                                   <option value="2">Service client</option>
                                   <option value="3">Administrateur</option>                                 
                               </select>
                        </div>
                         </div>
                         @endif
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                            </div>
                             
                                </div>
                                @endsection