<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <title>Plastika Drašković - Administracija</title>
    <meta content="" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <link href="{{mix('css/external/external.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{mix('css/app/app.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{mix('css/administration/admin.css')}}" type="text/css" rel="stylesheet"/>
</head>
<body>
<nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
    <div class="container"><a class="navbar-brand" href="#">Plastika Drašković</a>
        <button class="navbar-toggler" data-target="#navcol-1" data-toggle="collapse">
            <span class="sr-only"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
                <li class="nav-item active" role="presentation"><a class="nav-link" href="#">Proizvodi</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Porudžbine</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Korisnici</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Poruke</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#">Promocije</a></li>
            </ul>
            <form class="form-inline mr-auto" target="_self">
                <div class="form-group"></div>
            </form>
            <a class="btn btn-light action-button" role="button" href="#">E-prodavnica</a>
        </div>
    </div>
</nav>

@yield('content')

<div class="d-md-flex justify-content-md-center footer-basic" style="padding-bottom: 10px;padding-top: 10px;margin: 10px;">
    <footer class="text-primary">
        <div class="social">
            <a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a>
            <a href="#"><i class="icon ion-social-twitter"></i></a>
            <a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Početna</a></li>
            <li class="list-inline-item"><a href="#">Usluge</a></li>
            <li class="list-inline-item"><a href="#">O nama</a></li>
            <li class="list-inline-item"><a href="#">Pravila</a></li>
            <li class="list-inline-item"><a href="#">Polisa</a></li>
        </ul>
        <p class="copyright">Company Name © 2017</p>
    </footer>
</div>

<script src="{{mix('js/external/external.js')}}" type="text/javascript"></script>
<script src="{{mix('js/administration/admin.js')}}" type="text/javascript"></script>

</body>
</html>
