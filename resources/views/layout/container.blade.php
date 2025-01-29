<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
    <link href="/css/partial/form.css" rel="stylesheet" type="text/css" />
    <title>Fsoft-test</title>
</head>
<body class="page">
    <header class="header flex">
        <div class="logo">Fsoft-test</div>

        <nav class="flex">
            <a href="{{ route('dashboard') }}" class="header__nav__link no-link">Home</a>
            <a href="{{route('user.create')}}"  class="header__nav__link no-link">Cadastrar</a>
            @if (Auth::check())
            <form action="{{ route('logout') }}" method="post">
                @csrf
                @method('POST')
                    <button type="submit" class="header__nav__btn no-link flex">Sair</button>
            </form>
            @else
                <a href="{{route('login')}}" class="header__nav__btn no-link flex">Login</a>
            @endif
            
        </nav>
    </header>

    @yield('content')

</body>
</html>