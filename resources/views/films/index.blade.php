@extends('layout')

@section('content')
    <h2 class="page-title">Liste des films</h2>

    @if($films->isEmpty())
        <div class="text-muted text-center">rien a afficher</div>
    @else
    <table>
        <thead>
            <tr>
                <th width="1%">Image</th>
                <th>Titre</th>
                <th>Genre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($films as $film)
            <tr>
                <th>
                    <img src="{{ $film->getImageUrl() }}" height="50px" alt="image du film" />
                </th>
                <td>{{ $film->titre }}</td>
                <td>{{ $film->genre }}</td>
                <td>
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $films->links() }}
    @endif
@endsection