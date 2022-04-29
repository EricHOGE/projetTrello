@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Get Started!') }}</div>
    

                <div class="card-body">

                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">  
                        </div>
                    @endif

                    <a href="{{ route ('lists.create') }}"> <input type="button" value="Créer vos catégories"></a>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="card">
        <h1>Categories</h1>
        <div class="categorieslists">
        @foreach ($lists as $list)

            <div> {{ $list->category }} </div>
        @endforeach
</div>

    </div>

  
@if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
</div>
@endsection


