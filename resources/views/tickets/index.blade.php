@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tickets') }}</div>
    

                <div class="card-body">

                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">  
                        </div>
                    @endif

                     <form action="{{ route('tickets.store')}}" method="POST">
                        @csrf
                        <label for="content">Contenu de votre ticket</label>
                        <br>
                        <input type="text" name="content">
                        <input type="hidden" name="liste_id" value="{{ $liste_id }}" />
                        
                        <button type="submit" class="btn btn-primary">Ajouter la tâche</button>
                    </form>
                  

                
                   
                </div>
              

                 
                <a href="{{ route ('home') }}"> <input type="button" value="Retour aux catégories"></a>

            </div>
        </div>
    </div>
</div>


    

    <div class="card">
        <h1>Tickets</h1>
        <div class="categorieslists">
            @foreach ($tickets as $ticket)

                <div> {{ $ticket->content }} </div>
                <a href="{{ route ('tickets.edit', $ticket->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Supprimer le ticket</button>
                </form>
               
            @endforeach
        </div>

    </div>

  
@if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
</div>

@endsection