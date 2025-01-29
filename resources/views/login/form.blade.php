<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
    <link href="/css/partial/form.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <main class="main flex">    
    
    <form action="{{ route('login.auth') }}" method="post" class="form flex">
    @csrf
    @method('POST')
        @if($message = Session::get('error'))
            {{$message}}
        @endif
        
        <hgroup class="form__group-title">
            <h3>Olá, seja</h3>
            <h2 class="title">Bem-vindo!</h2> 
        </hgroup>
        <fieldset class="form__fieldset">
            <label for="email" class="form__label">Email </label>
            <input type="email" name="email" id="" class="form__input">
        </fieldset>
        
        <fieldset class="form__fieldset">
            <label for="password" class="form__label">Senha </label>
            <input type="password" name="password" id="" class="form__input">
        </fieldset>
        

        @if($errors->any())
            <div class="messagem-erro flex">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
            </div>
        
        @endif
        <button type="submit" class="btn">Entrar</button>
        <a href="{{ route('user.create') }}" class="no-link">Ainda não tem uma conta?</a>
    </form>
    </main>
    
</body>
</html>