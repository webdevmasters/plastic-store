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
                <li class="nav-item {{Route::is('admin.products.index')?'active':''}}" role="presentation"><a class="nav-link" href="{{route('admin.products.index')}}">Proizvodi</a></li>
                <li class="nav-item {{Route::is('admin.orders.index')?'active':''}}" role="presentation"><a class="nav-link" href="{{route('admin.orders.index')}}">Porudžbine</a></li>
                <li class="nav-item {{Route::is('admin.users.index')?'active':''}}" role="presentation"><a class="nav-link" href="{{route('admin.users.index')}}">Korisnici</a></li>
                <li class="nav-item {{Route::is('admin.messages.index')?'active':''}}" role="presentation"><a class="nav-link" href="{{route('admin.messages.index')}}">Poruke</a></li>
                <li class="nav-item {{Route::is('admin.promotions.index')?'active':''}}" role="presentation"><a class="nav-link" href="{{route('admin.promotions.index')}}">Promocije</a></li>
            </ul>
            <form class="form-inline mr-auto" target="_self">
                <div class="form-group"></div>
            </form>
            <a class="btn btn-light action-button" role="button" href="{{url('/')}}">E-prodavnica</a>
        </div>
    </div>
</nav>
<main>
    @yield('content')
</main>


<script src="{{mix('js/external/external.js')}}" type="text/javascript"></script>
<script src="{{mix('js/administration/admin.js')}}" type="text/javascript"></script>
@stack('scripts')
</body>
</html>
