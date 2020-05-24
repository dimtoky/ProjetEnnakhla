<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ennakhla Upload</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/loginstyle.css" rel="stylesheet">
    <link href="css/basestyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>.panel-login{background-color:rgba(255,255,255,.9);border-radius:20px;border-color:#ccc;-webkit-box-shadow:0 2px 3px 0 rgba(0,0,0,.2);-moz-box-shadow:0 2px 3px 0 rgba(0,0,0,.2);box-shadow:0 2px 3px 0 rgba(0,0,0,.2)}.panel-login>.panel-heading{color:#00415d;background-color:#fff;border-color:#fff;text-align:center}.panel-login>.panel-heading a{text-decoration:none;color:#666;font-weight:700;font-size:15px;-webkit-transition:all .1s linear;-moz-transition:all .1s linear;transition:all .1s linear}.panel-login>.panel-heading a.active{color:#029f5b;font-size:18px}.panel-login>.panel-heading hr{margin-top:10px;margin-bottom:0;clear:both;border:0;height:1px;background-image:-webkit-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,.15),rgba(0,0,0,0));background-image:-moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,.15),rgba(0,0,0,0));background-image:-ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,.15),rgba(0,0,0,0));background-image:-o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,.15),rgba(0,0,0,0))}.panel-login input[type=text],.panel-login input[type=email],.panel-login input[type=password]{height:45px;border:1px solid #ddd;font-size:16px;-webkit-transition:all .1s linear;-moz-transition:all .1s linear;transition:all .1s linear}.btn-login,.btn-register{outline:0;font-size:14px;height:auto;font-weight:400;padding:14px 0;text-transform:uppercase}.panel-login input:focus,.panel-login input:hover{outline:0;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;border-color:#ccc}.btn-login{background-color:#59B2E0;color:#fff;border-color:#59B2E6}.btn-login:focus,.btn-login:hover{color:#fff;background-color:#53A3CD;border-color:#53A3CD}.forgot-password{text-decoration:underline;color:#888}.forgot-password:focus,.forgot-password:hover{text-decoration:underline;color:#666}.btn-register{background-color:#1CB94E;color:#fff;border-color:#1CB94A}.btn-register:focus,.btn-register:hover{color:#fff;background-color:#1CA347;border-color:#1CA347}.logo>h1,.summary{color:#253144;text-align:center}.logo,.summary{background-color:rgba(255,255,255,.5);white-space:nowrap}.summary{border-radius:25px;display:block;margin-top:1em;font-size:3em}.logo{width:55%;padding-bottom:.5em;padding-top:.5em;margin-left:23%;border-radius:15px}.logo>h1{font-size:5em;font-weight:700}</style>
</head>

<body>

    <div class="body">
        
    
    <div class="menu">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{!! url('/') !!}">Ennakhla Upload</a>
                </div>
                
            </div>
        </nav>
    </div>



    <div class="container">
        <div class="logo">
           <!-- <img src="img/logo.png" alt="Ennakhla Logo" id="logo">-->
           <h1>Ennakhla Upload</h1>
        </div>
        <div class="summary">
            <p>Envoyez nous vos projets pour impression en quelques clics</p>
        </div>
<br><br><br>
    <div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
				
					<div class="panel-body">
                    <br>
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" method="POST" action="{!! url('login') !!}" accept-charset="UTF-8" style="display: block;">
								       {!! csrf_field() !!}
                                	<div class="form-group">
									
                                               <input id="email" type="text" class="form-control input-lg" name="email" tabindex="1" placeholder="Email">
                                                
                                                 @if ($errors->has('email'))
                                   <div class="alert alert-danger">
                          <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif

									</div>
									<div class="form-group">
                                          <input id="password" type="password" class="form-control input-lg" tabindex="2" name="password" placeholder="Mot de passe">
                                             
                                              @if ($errors->has('password'))
                                   <div class="alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif

									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Se connecter">
                                                  
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="{{ url('password/reset') }}" tabindex="5" class="forgot-password">Mot de passe oublié?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="footer">
        <footer>Imprimerie EN-NAKHLA &copy; S.A.R.L. Tous droits réservés.</footer>
</div>

</body>

</html>