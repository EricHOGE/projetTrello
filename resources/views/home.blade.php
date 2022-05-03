@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

    

                <div class="card-body">

                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">  
                        </div>
                    @endif

                    <div class="card-header">{{ __('Créez votre nouvelle catégorie') }}</div>

                    <div class="row ">
                        <div class="col-4 todo">
                            <form action="{{ route('lists.store')}}" method="POST">
                            @csrf
                            <br>
                            <input type="text" name="category">
                            <br>
                            <br>
                            <button type="submit" class="btn btn-success">Créer la catégorie</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


    
        <h1 class="title" style="display:flex; justify-content:center">Liste des catégories</h1>

    <div class="cardList">
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
                    <br>
                    <br>
                    <br>
                    <form action="{{ route('tickets.store', ["ticket" => $list->id])}}" method="POST">
                    @csrf
                    <label for="content">Contenu de votre ticket</label>
                    <br>
                    <input type="hidden" name="liste_id" value="{{$list->id}}" />
                    <input type="text" name="content">
                    <button type="submit" class="btn btn-primary">Ajouter la tâche</button>
                    </form>
                </div>   
            </div>
            <div class="categoriestickets">
                @foreach ($list->tickets()->get() as $ticket)

                    <div> {{ $ticket->content }} </div>
                    <a href="{{ route ('tickets.edit', $ticket) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    
                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Supprimer le ticket</button>
                    </form>
                
                @endforeach
            </div>
        </div>
        
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


