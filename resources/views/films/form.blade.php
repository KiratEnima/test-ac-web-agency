@extends('layout')

@section('content')
    <form action="{{ route('auth.attempt') }}" method="POST" class="form">
        @csrf
        <small>Titre</small>
        <input type="text" name="titre" class="mb-20"/>
        <small>Genre</small>
        <input type="text" name="genre" class="mb-20"/>
        <small>Image</small>
        <input type="file" name="image" class="mb-20"/>

        <button type="submit">Créer</button>
    </form>
@endsection