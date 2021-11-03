@extends('layout')

@section('content')
    <form action="{{ route('auth.attempt') }}" method="POST" class="login-form">
        @csrf
        <small>Email</small>
        <input type="text" name="email" class="mb-20"/>
        <small>Mot de passe</small>
        <input type="text" name="password" class="mb-20"/>

        <button type="submit">Valider</button>
    </form>
@endsection