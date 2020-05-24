<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - Ennakhla Upload </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('css/basestyle.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/menustyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     @yield('head')
</head>

<body>




    <div class="menu">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{!! url('/home') !!}">Ennakhla Upload</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">   <span class="glyphicon glyphicon-user"></span>{{$name}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="list-group-item list-group-item-warning"><a href="{!! url('account') !!}"><span class="glyphicon glyphicon-cog"></span> Mon Compte</a></li>
                            <li class="list-group-item list-group-item-success"><a href="{!! url('addfiles') !!}"><span class="glyphicon glyphicon-upload"></span> Ajouter fichier</a></li>
                            <li class="list-group-item list-group-item-info"><a href="{!! url('contact') !!}"><span class="glyphicon glyphicon-earphone"></span> Assistance</a></li>
                            <li class="list-group-item list-group-item-danger"><a href="{!! url('logout') !!}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off" ></span> Se déconnecter</a></li>                       
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>



    <div class="container">
      @yield('content')
    </div>

    <div class="footer">
        <footer>Imprimerie EN-NAKHLA &copy; S.A.R.L. Tous droits réservés.</footer>
    </div>

</body>

</html>