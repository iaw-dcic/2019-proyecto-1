@extends('layouts.app')

@section('content')
    <h1>{{ $user->username }}</h1>
    <h1>Public lists:</h1>
    

    @foreach ($user->lists as $userlist)
        <div class="row" id="listRow">
        <div class="col-md-2 noLeftPadding">
            <a href="#">
                <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/300x200" alt="">
            </a>
        </div>
        <div class="col-md-5">
            <h3 class="font-weight-light">{{ $userlist->title }}</h3>
            <p class="font-weight-light">{{ $userlist->description }}</p>
            <a class="btn btn-primary" href="/userlists/{{ $userlist->id }}">View list</a>
        </div>
        </div>
        <hr> 
    @endforeach
@endsection