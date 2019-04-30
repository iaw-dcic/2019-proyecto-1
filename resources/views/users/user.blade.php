@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" class="card-img-top" alt="avatar">
                    @endif
                    <div class="card-header"><h3>{{$user->name}}</h3></div>
                    <div class="card-body">
                        <p class="card-text">{{$user->description}}</p>
                        @if (Auth::user()->id==$user->id)
                            <a href="./{{$user->id}}/edit" class="btn btn-primary">Edit profile</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection