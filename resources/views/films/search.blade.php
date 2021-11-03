@extends('layout')

@section('content')
    @include('components.search_input', ['term' => $term])
    <br/>
    <div class="mb-20 mt-20">
        Resultats pour "<strong>{{ $term }}</strong>"
    </div>

    @if($films->isEmpty())
        <div class="text-muted text-center">Aucun résultat ne correspond à votre recherche</div>
    @else
    <table>
        <thead>
            <tr>
                <th width="1%">Image</th>
                <th>Titre</th>
                <th>Genre</th>
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
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $films->links() }}
    @endif
@endsection