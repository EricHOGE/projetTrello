@extends('layouts.app')

@section('content')


    <div class="container">


        {{-- Section permettant d'afficher les erreurs de saisie  --}} 
        <div class="row erreur">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            @endif
        </div>


        <div class="row justify-content-center">
            <div class="col-md-4">
                        
                {{-- Section permettant d'afficher les erreurs de connexion  --}} 
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
                        <input type="hidden" name="auth_email" value="{{Auth::user()->email}}" />
                        <br>
                        <br>
                        <button type="submit" class="btn btn-success">+ Créer la catégorie</button>
                    </form>                    
                
                </div>
            </div>
        </div>
    </div>

    <section>
        <h1 class="title">Mon Tableau de Bord</h1>

        {{-- Section correspondant aux categories --}}   
        <div class="cardList">
            @foreach ($categories as $list)
            <div class="categoriesLists">
                <div class="lists">
                    <div class="headList">
                        <div>
                            {{ $list->category }}
                        </div>  


                        {{-- Section correspondant aux icones d'edition et de suppresion  --}}                       
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

                    {{-- Section correspondant à la création d'une tâche  --}}                           
                    <div class="inputTask">
                        <form action="{{ route('tickets.store', ["ticket" => $list->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="liste_id" value="{{$list->id}}" />
                        <input type="text" name="content" placeholder="Ajouter une tâche">
                        <button type="submit" class="btn btn-primary">+</button>
                        </form>
                    </div> 


                    {{-- Section correspondant aux tickets  --}} 
                    @foreach ($list->tickets()->get() as $ticket)
                    <div class="categoriesTickets" draggable="true">
                        <div> {{ $ticket->content }} </div>
                        <div class="iconTicket">
                            <div>
                                <a href="{{ route ('tickets.edit', $ticket) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                            <div>
                                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>         
            @endforeach  
        </div>   
    </section>

    

    @foreach ($shared_users as $user)
    <section>
        <h1 class="title">Tableau de Bord partagé par  {{$user->name}}</h1>

        {{-- Section correspondant aux categories --}}   
        <div class="cardList">
            @foreach ($user->lists()->get() as $list)
            <div class="categoriesLists">
                <div class="lists">
                    <div class="headList">
                        <div>
                            {{ $list->category }}
                        </div>  


                        {{-- Section correspondant aux icones d'edition et de suppresion  --}}                       
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

                    {{-- Section correspondant à la création d'une tâche  --}}                           
                    <div class="inputTask">
                        <form action="{{ route('tickets.store', ["ticket" => $list->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="liste_id" value="{{$list->id}}" />
                        <input type="text" name="content" placeholder="Ajouter une tâche">
                        <button type="submit" class="btn btn-primary">+</button>
                        </form>
                    </div> 


                    {{-- Section correspondant aux tickets  --}} 
                    @foreach ($list->tickets()->get() as $ticket)
                    <div class="categoriesTickets" draggable="true">
                        <div> {{ $ticket->content }} </div>
                        <div class="iconTicket">
                            <div>
                                <a href="{{ route ('tickets.edit', $ticket) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                            <div>
                                    <form action="{{ route('tickets.destroy', $ticket) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>         
            @endforeach  
        </div>   
    </section>
    @endforeach


    @if(session()->has('message'))
        <div class="alert alert-success">
                {{ session()->get('message') }}
        </div>
    @endif


@endsection