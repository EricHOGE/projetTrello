@extends('layouts.app')

@section('content')
    


<div class="row justify-content-center">
    <div class="col-4 todo">
        <form action="{{ route('invites.store')}}" method="POST">
        @csrf
        <label for="user_email">E-mail de l'invité</label>
        <br>
        <input type="text" name="user_email">
        <input type="hidden" name="invite_email" value="{{ Auth::user()->email }}">
        <button type="submit" class="btn btn-primary">Inviter</button>
        </form>
    </div>
    @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
</div>
@endsection