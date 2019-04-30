@extends('layouts.app')

@section('myLayoutTitle', 'Lists')

@section('cssFileListing')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="title">Created Lists</h1>

    <div class="btn-group" role="group">

        <button class="btn btn-outline-secondary" type="button" onclick="location.href='/albums/create'">Add New List</button>
        
        <button class="btn btn-outline-secondary" type="button" onclick="location.href='/home'">Go Back</button>
         
    </div>

    @if($album->count())

        <ul class="list-group">

            @foreach ($album as $elem)

                <li class="list-group-item"><button class="btn btn-link" onclick="location.href='/albums/{{ $elem->list_id }}'">{{ $elem->list_name }}</button></li>

            @endforeach

        </ul>

    @else

        <p id="emptyMessage">There are no lists created by this user.</p>

    @endif

@endsection