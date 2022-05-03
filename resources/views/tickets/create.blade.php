@extends('layouts.app')

@section('content')
    


<div class="row justify-content-center">
    <div class="col-4 todo">
        <form action="{{ route('tickets.store')}}" method="POST">
        @csrf
        <label for="content">Contenu de votre ticket</label>
        <br>
        <input type="hidden" name="liste_id" value="{{$id}}" />
        <input type="text" name="content">
        <button type="submit" class="btn btn-primary">Ajouter la tâche</button>
        </form>
    </div>
</div>
@endsection