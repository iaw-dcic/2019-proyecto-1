@extends('layouts.app') 
@section('content')

<header class="masthead">
    <div class="container">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10">
                <h1 class="text-uppercase text-white font-weight-bold">Public lists</h1>
                <hr class="divider my-2">
            </div>
        </div>
    </div>
</header>

<div class="row wrap justify-content-center">
    @foreach ($userLists as $userlist)
        <div class="col-sm-2">
            <div class="card mb-4">
                @if($userlist->image)
                    <img class="card-img-top"  src="{{ $userlist->image }}">
                @else 
                    <img class="card-img-top" src="http://placehold.it/300x200">
                @endif
                
                <div class="card-body">
                    <h5 class="card-title">{{ $userlist->title }}</h5>
                    <p class="card-text p">{{ $userlist->description }}</p>
                    <a class="btn btn-primary" href="/userlists/{{ $userlist->id }}">View list</a>
                    <p class="card-text">Made by <a href="/profile/{{ $userlist->user_id }}">{{ $userlist->user->username }}</a></p>
                </div>
            </div>
        </div>
        @if($loop->iteration % 4 == 0)
            </div><div class="row wrap justify-content-center ">
        @endif
    @endforeach
</div>

<div class="container">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div>{{ $userLists->links() }}</div>
    </div>
</div>
@auth
      
@endauth
@endsection