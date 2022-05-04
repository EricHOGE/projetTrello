@extends('layouts.app')

@section('content')
    


<div class="row justify-content-center">
    <div class="col-4 todo">
        <form action="{{ route('invites.store')}}" method="POST">
        @csrf
        <label for="category">E-mail de l'invité</label>
        <br>
        <input type="text" name="category">
        <button type="submit" class="btn btn-primary">Inviter</button>
        </form>
    </div>
    @foreach ($invites as $invite)
        @if ($invite->email != Auth::user()->email)
        <h1>La personne invitée n'a pas de compte</h1>
        @endif

    @endforeach
</div>
@endsection