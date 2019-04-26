@extends('layouts.master')

@section('content')
<div class="jumbotron">
    <div class="row justify-content-center">
        <div class="content">
        <div class="list-group">
            @foreach($users as $user)
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$user->name}}</h5>
                    </div>
                    <p class="mb-1">{{$user->email}}</p>
                </a>
            @endforeach
        </div>
        </div>
    </div>
</div>
@endsection
