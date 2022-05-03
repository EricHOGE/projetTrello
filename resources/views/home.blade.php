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






                    {{-- <a href="{{ route ('lists.create') }}"> <input type="button" value="Créer vos catégories"></a> --}}
                </div>
            </div>
        </div>
    </div>
</div>


    
        <h1 class="title">Liste</h1>

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
                </div>   
            </div>


                <form action="{{ route('tickets.show', ["ticket" => $list->id]) }}" method="POST">
                        @csrf
                        @method('GET')
                        <button class="btn btn-success">Voir le détail des tickets</button>
                </form>

                

           
        </div>
        @endforeach
    </div>

  
@if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
</div>
@endsection


