@extends('layout.app')

@section('contenu')


    <div>
        <h1>Détail du ticket</h1>

        <div class="card">
            <div class="card-header">
                {{ $ticket->content }}
            </div>
            <div class="card-body">
               
                <p class="card-text">{{ $ticket->content }}</p>
     
            </div>
        </div>
    </div>
@endsection