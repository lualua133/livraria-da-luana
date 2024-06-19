<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livraria</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="g-sidenav-show  bg-gray-200">
    <header>
        <h1>Livraria</h1>
        <h5>Bem vindo {{ Auth::user()?->name }}</h5>
    </header>
    <nav>
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" href="">Sair</button>
            </form>
            <a href="{{ route('usuario.create') }}">Registrar</a>
        @endauth
    </nav>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('successo'))
        <div class="alert alert-success">
            {{ session('successo') }}
        </div>
    @endif

    <div class="container">
        @yield('content')
    </div>
</body>

</html>
