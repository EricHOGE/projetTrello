@extends('layout.app')

@section('contenu')


    <div>
        <h1>Détail du ticket</h1>

   @foreach ($tickets as $liste_id => $ticket)
    <br>
        {{ $id }}
        <a href="{{ route( 'tickets.show', $liste_id) }}" class="btn btn-primary">Voir Le détail</a>
    <hr>
    @endforeach
    </div>
@endsection