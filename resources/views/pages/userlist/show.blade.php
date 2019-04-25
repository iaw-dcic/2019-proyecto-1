@extends('layouts.app')

@section('content')

<header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">{{ $userlist->title }}</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">{{ $userlist->description }}</p>
        </div>
      </div>
    </div>
</header>

@if ($userlist->elements->count())

<table class="table transparent">
    <thead class="thead-light">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        @auth
          @if (Auth::user()->id == $userlist->user_id)
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          @endif
        @endauth
      </tr>
    </thead>
    <tbody>
    <div>
        @foreach ($userlist->elements as $element)
            <tr>
                <a href="/listelements/{{ $element->id }}/edit">
                    <th scope="row">{{ $element->name }}</th>
                </a>
                <td>{{ $element->description }}</td>
                @auth
                @if (Auth::user()->id == $userlist->user_id)
                <form method="POST" action="#">
                    @method('PATCH')
                    @csrf
                    <td><button type="submit" class="btn btn-primary btn-primary">Edit element</button></td>
                </form>
                <form method="POST" action="/listelements/{{ $element->id }}">
                    @method('DELETE')
                    @csrf
                    <td><button type="submit" class="btn btn-primary btn-primary">Delete element</button></td>
                </form>
                @endif
                @endauth
            </tr>
        @endforeach
    </div>
    </tbody>
</table>
@else

<header class="masthead">
<div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center text-center">
      <div class="col-lg-8 align-self-baseline">
        <p class="text-white-75 font-weight-light mb-5">This list is currently empty.</p>
      </div>
    </div>
  </div>
</header>
@endif

@auth
@if (Auth::user()->id == $userlist->user_id)
<form method="POST" action="/userlists/{{ $userlist->id }}">
    @method('DELETE')
    @csrf
    <div>
        <button type="submit" class="btn btn-primary btn-primary deleteListButton">Delete list</button>
    </div>
</form>
@endif

@if (Auth::user()->id == $userlist->user_id)
<form method="POST" action="/userlists/{{ $userlist->id }}/listelements" style="margin-left: 46px;">
    @csrf

    <div>
        <input type="text" name="name" placeholder="Element name">
    </div>

    <div>
        <textarea name="description" placeholder="Description"></textarea>
    </div>

    <div>
        <button type="submit" class="btn btn-primary btn-primary">Create</button>
    </div>
</form>
@endif
@endauth

@endsection