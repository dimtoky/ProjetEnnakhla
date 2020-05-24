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

    <style>
  body {

}
.panel-login {
    background-color: rgba(255,255,255,0.9);
      border-radius: 20px;
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}

.summary
{
     border-radius: 25px;
    display: block;
    margin-top: 1em; 
    font-size: 3em;
    color: #253144;
    background-color: rgba(255,255,255,0.5);
    white-space:nowrap;
 text-align: center;
}

.logo
{
    background-color: rgba(255,255,255,0.5);
    width: 55%;
    padding-bottom: 0.5em;
    padding-top: 0.5em;
    margin-left: 23%;
    border-radius: 15px;
    white-space:nowrap;
}

.logo > h1
{
    color: #253144;
    font-size: 5em;
    font-weight: bold;
     text-align: center;
}

    </style>
</head>

<body>

    <div class="body">
        
    
    <div class="menu">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Ennakhla Upload</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{!! url('admin') !!}"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>
                    
                </ul>
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
							      @if ($OK == true)
                                   <div class="alert alert-success">
                                       <strong>Ajouté !</strong> l'utilisateur à été ajouté.
                                </div>
                                @endif
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
													<a href="{{ route('register') }}" tabindex="5" class="forgot-password">Mot de passe oublié?</a>
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