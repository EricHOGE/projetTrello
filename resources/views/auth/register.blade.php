@extends('layouts.app')

@section('content')
<div class="container">
   {{--  <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div> --}}
{{--                 <div class="logo">
 --}}                    
</div>

{{-- <br><br><br><br><br> --}}

<div class="card-body register">
   
    <u><h1>S'INSCRIRE</h1></u>
    <br>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input id="name" type="text" placeholder="Nom" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <br>           
        
        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

         @error('email')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
         
         <br>

        <input id="password" type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror
         <br>

        <input id="password-confirm" type="password" placeholder="Confirmer Mot de passe" class="form-control" name="password_confirmation" required autocomplete="new-password">
        <br>

        <button type="submit" class="btn btn-primary">
            {{ __("S'inscrire") }}
        </button>

        <br><br>

        <p>En cliquant sur S’inscrire, vous acceptez nos Conditions générales. Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment nous utilisons les cookies et autres technologies similaires en consultant notre Politique d’utilisation des cookies.</p>

    </form>
</div>


@endsection
