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


@foreach ($userLists as $userlist)
<div class="row" id="listRow">
    <div class="col-md-2 noLeftPadding">
        <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/300x200" alt="">
        </a>
    </div>
    <div class="col-md-5">
        <h2 class="font-weight-light">{{ $userlist->title }}</h2>
        <p class="font-weight-light">Made by <a  href="/profile/{{ $userlist->user_id }}">{{ $userlist->user->username }}</a></p>
        <p class="font-weight-light">{{ $userlist->description }}</p>
        <a class="btn btn-primary" href="/userlists/{{ $userlist->id }}">View list</a>
    </div>
</div>
<hr> 
@endforeach
<div class="lists-paginator">
     {{ $userLists->links() }}
</div>
<ul>
    @auth
    <form method="POST" action="/users/{{ Auth::user()->id }}/userlists">
        @csrf
        <div>
            <input type="text" name="title" placeholder="List title">
        </div>

        <div>
            <textarea name="description" placeholder="Description"></textarea>
        </div>

        <div>
            <button type="submit" class="btn btn-primary btn-primary">Create</button>
        </div>
    </form>
    @endauth
</ul>
@endsection