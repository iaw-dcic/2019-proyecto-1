@extends('layouts.app')

@section('content')

<h1>{{ $userlist->title }}</h1>
<h2>description:{{ $userlist->description }}</h2>
<h2>owner:<a href="/profile/{{ $userlist->user_id }}">{{ $userlist->user->username }}</a></h2>

<form method="POST" action="/userlists/{{ $userlist->id }}">
    @method('DELETE')
    @csrf
    <div>
        <button type="submit">Delete list</button>
    </div>
</form>

@if ($userlist->elements->count())
<div>
    @foreach ($userlist->elements as $element)
        <li>
            <a href="/listelements/{{ $element->id }}/edit">
                {{ $element->name }}
            </a>
            <form method="POST" action="/listelements/{{ $element->id }}">
                @method('DELETE')
                @csrf
                <button type="submit">Delete element</button>
            </form>
        </li>
    @endforeach
</div>
@endif

<form method="POST" action="/userlists/{{ $userlist->id }}/listelements">
    @csrf

    <div>
        <input type="text" name="name" placeholder="Element name">
    </div>

    <div>
        <textarea name="description" placeholder="Description"></textarea>
    </div>

    <div>
        <button type="submit">Create</button>
    </div>
</form>

@endsection