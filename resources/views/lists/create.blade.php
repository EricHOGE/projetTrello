@extends('layouts.app')

@section('content')
    


<div class="row justify-content-center">
    <div class="col-4 todo">
        <form action="{{ route('lists.store')}}" method="POST">
        @csrf
        <label for="category">Nouvelle catégorie</label>
        <br>
        <input type="text" name="category">
        <button type="submit" class="btn btn-primary">Créer la catégorie</button>
        </form>
    </div>
</div>
@endsection