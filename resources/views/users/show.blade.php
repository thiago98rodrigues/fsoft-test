@extends('layout.container')
@section('content')

    @if (session('success'))
    {{ session('success') }}
    @endif
    {{$user->name}}

    <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Desejo apagar esse registro?')">Apagar</button>
    </form>
@endsection  
