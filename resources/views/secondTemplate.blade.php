@extends('mainTemplate')

@section('leftside')
<!-- Left Side Of Navbar -->
    @auth
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/home">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/lists">My lists</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/create">Add list</a>
            </li>
        </ul>
    @endauth
@endsection