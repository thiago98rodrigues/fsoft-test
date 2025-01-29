@extends('layout.container')
@section('content')
    
<main class="main flex">


<form action="{{route('user-update', ['user' => $user->id])}}" method="POST" class="form flex">
        @csrf
        @method('PUT')
        <hgroup class="form__group-title">
            <h2 class="title">Edição de Usuário</h2> 
        </hgroup>
        <fieldset class="form__fieldset">
            <label for="name" class="form__label">Nome: </label>
            <input type="text" name="name" placeholder="Nome Completo" value="{{ old('name', $user->name) }}" class="form__input" >
        </fieldset>

        <fieldset class="form__fieldset">
            <label for="email" class="form__label">Email: </label>
            <input type="email" name="email" placeholder="" value="{{ old('email', $user->email) }}" class="form__input" >
        </fieldset>

        <fieldset class="form__fieldset">
            <label for="password" class="form__label">Senha: </label>
            <input type="password" name="password" placeholder="Nova Senha" class="form__input" >
        </fieldset>

        @if($errors->any())
        <div class="messagem-erro flex">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>     
        @endif
        <button type="submit" class="btn">Cadastrar</button>
    </form>
    </main>
@endsection  