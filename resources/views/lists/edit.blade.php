@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-4 todo">
        <form action="{{ route('lists.update', $list->id)}}" method="POST">
        @csrf
        @method('PUT')

        <label for="category">Modifier votre catégorie</label>
        <br>
        <input type="text" name="category" value="{{$list->category}}">
        <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
</div>

@endsection