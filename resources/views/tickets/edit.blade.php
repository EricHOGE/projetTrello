@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-4 todo">
        <form action="{{ route('tickets.update', $ticket)}}" method="POST">
        @csrf
        @method('PUT')

        <label for="category">Modifier votre ticket</label>
        <br>
        <input type="text" name="content" value="{{$ticket->content}}">
        <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
</div>

@endsection