@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Get Started!') }}</div>
                 <div class="card-header">{{ __('Tickets') }}</div>
    

                <div class="card-body">

                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">  
                        </div>
                    @endif

                    <a href="{{ route ('lists.create') }}"> <input type="button" value="Créer vos catégories"></a>
                </div>
            </div>
        </div>
    </div>
</div>


    
        <h1 class="title">Liste</h1>

    <div class="cardList">
        <div>
        @foreach ($categories as $list)
        <div class="categorieslists">
            <div class="lists">
                <div>
                    <h2>{{ $list->category }}</h2>
                </div>  
                
                <div class="editIcon">
                    <a href="{{ route ('lists.edit', $list->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>  
                
                <div class="trashIcon">
                    <form action="{{ route('lists.destroy', $list->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-default" type="submit"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>   
            </div>
            <div class="categoriestickets">
                @foreach ($list->tickets()->get() as $ticket)

                    <div> {{ $ticket->content }} </div>
                    <a href="{{ route ('tickets.edit', $ticket->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('tickets.store')}}" method="POST">
                    @csrf
                    <label for="content">Contenu de votre ticket</label>
                    <br>
                    {{-- <input type="hidden" name="liste_id" value="{{$id}}" /> --}}
                    <input type="text" name="content">
                    <button type="submit" class="btn btn-primary">Ajouter la tâche</button>
                    </form>
                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Supprimer le ticket</button>
                    </form>
                
                @endforeach
            </div>
        </div>
                {{-- <form action="{{ route('tickets.show', ["ticket" => $list->id]) }}" method="POST">
                        @csrf
                        @method('GET')
                        <button class="btn btn-success">Voir le détail des tickets</button> --}}
                {{-- </form> --}}

        
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


