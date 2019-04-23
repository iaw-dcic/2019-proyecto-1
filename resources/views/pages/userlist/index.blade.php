@extends('layouts.app')
@section('content')
<h1>Public lists</h1>

<ul>
    @foreach ($userLists as $userlist)
    <li>
        <a href="/userlists/{{ $userlist->id }}">
            {{ $userlist->title }}
        </a>
    </li>
    @endforeach

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
            <button type="submit">Create</button>
        </div>
    </form>
    @endauth
</ul>
@endsection