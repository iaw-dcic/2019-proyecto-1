@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="/images/profile.jpg" class="card-img-top" alt="Card image cap">
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