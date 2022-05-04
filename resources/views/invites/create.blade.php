@extends('layouts.app')

@section('content')
    


<div class="row justify-content-center">
    <div class="col-4 todo">
        <form action="{{ route('invites.store')}}" method="POST">
        @csrf
        <label for="user_email">E-mail de l'invité</label>
        <br>
        <input type="text" name="user_email">
        <button type="submit" class="btn btn-primary">Inviter</button>
        </form>
    </div>
    {{-- @foreach ($invites as $invite)
        <h1>La personne invitée n'a pas de compte</h1>
    @endforeach --}}
</div>
@endsection