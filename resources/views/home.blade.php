@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">

                    <div class="card-body">

                    
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">  
                            </div>
                        @endif

                        <form action="{{ route('lists.store')}}" method="POST">
                            @csrf
                            <h3>Nommez votre catégorie</h3>
                            <input type="text" name="category" placeholder="Votre catégorie...">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                            <br>
                            <br>
                            <button type="submit" class="btn btn-success">+ Créer la catégorie</button>
                        </form>
                        <br>
                        <input type="text" name="category">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                        <input type="hidden" name="auth_email" value="{{Auth::user()->email}}" />
                        <br>
                        <br>
                        <button type="submit" class="btn btn-success">Créer la catégorie</button>
                    </form>
                
                </div>
            </div>
        </div>
    </div>


    <br><br>
    <h1 class="title" style="display:flex; justify-content:center">Liste des catégories</h1>
 
    <div class="cardList">
        @foreach ($categories as $list)
            @if ($list->user_id != Auth::user()->id)
            @else
                <div class="categorieslists">
                    <div class="lists">
                        <div class="headlist">
                        
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
                        <div>
                            <form action="{{ route('tickets.store', ["ticket" => $list->id])}}" method="POST">
                            @csrf
                            <label for="content">Contenu de votre ticket</label>
                            <br>
                            <input type="hidden" name="liste_id" value="{{$list->id}}" />
                            <input type="text" name="content">
                            <button type="submit" class="btn btn-primary">Ajouter la tâche</button>
                            </form>
                        </div>
                        
                        @foreach ($list->tickets()->get() as $ticket)

                        <div class="categoriestickets">
                            <div> 
                                <p>{{ $ticket->content }}</p>
                            </div>
                            <div>
                                <a href="{{ route ('tickets.edit', $ticket) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                            <div>
                                <form action="{{ route('tickets.destroy', $ticket) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Supprimer le ticket</button>
                                </form>
                            </div> 
                        </div>

                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>


<section>
        <h2 class="title" style="display:flex; justify-content:center">Mon dashboard</h2>
 
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
</section>

@foreach ($shared_users as $user)
    <section>
        <h2 class="title" style="display:flex; justify-content:center">Dashboard de {{$user->name}}</h2>
        
        @foreach ($user->lists()->get() as $list)
                
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

    </section>
@endforeach



@if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
</div>

@endsection