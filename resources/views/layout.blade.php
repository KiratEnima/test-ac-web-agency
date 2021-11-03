<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Films</title>
    <link href="/dist/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="brand">AC Films</div>


            <ul class="nav">
                <li><a href="{{ route('home') }}">Acceuil</a></li>
                <li><a href="{{ route('films.index') }}">Films</a></li>
                @auth
                <li><a href="{{ route('auth.logout') }}">Déconnexion</a></li>
                @else
                <li><a href="{{ route('auth.login') }}">Se connecter</a></li>
                @endif
            </ul>
        </div>

        <div class="content">
            @if ($errors->any())
                <div class="text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>

        @include('films.modal')
        <script src="/dist/js/app.js"></script>
    </div>
</body>
</html>