@extends('layouts.app')

@section('myLayoutTitle', 'Lists')

@section('cssFileListing')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="title">{{ $album->list_name }}</h1>

    <div id="albumInfoOwner" class="content"><b>Owner: </b><a href="/profiles/{{ $album->owner }}">{{ $album->owner }}</a></div>

    <div id="albumInfoStatus" class="content"><b>Status: </b> 
        @if($album->public == 1) Public
        @else Private
        @endif
    </div>

    @if((Auth::check()) && (Auth::user()->name) == ($album->owner))

        <div class="btn-group" role="group">

            <button class="btn btn-outline-secondary" onclick="location.href='/albums/{{ $album->list_id }}/edit'">Edit List</button>

            <button class="btn btn-outline-secondary" onclick="location.href='/albums/{{ $album->list_id }}/songs/create'">Add Song</button>

            <button class="btn btn-outline-secondary" onclick="location.href='/albums/'">Go Back</button>

        </div>

    @else

        <p><button class="btn btn-outline-secondary" id="createButton" onclick="location.href='/browse/'">Go Back</button></p>

    @endif

    @if($album->songs->count())

        <ul id="albumShowList" class="list-group">

            @foreach($album->songs as $song)

                <li class="list-group-item"><b>Song Name: </b>{{ $song->song_name }}

                    <ul class="list-group">

                        <li class="list-group-item"><b>Artist: </b>{{ $song->artist }}</li>

                        <li class="list-group-item"><b>Album: </b>{{ $song->album }}</li>

                        <li class="list-group-item"><b>Release Year: </b>{{ $song->release_year }}</li>

                        <li class="list-group-item"><b>Notes: </b>{{ $song->notes }}</li>

                        @if((Auth::check()) && ((Auth::user()->name) == ($album->owner)))

                            <li class="list-group-item"><button class="btn btn-link" onclick="location.href='/albums/{{ $album->list_id }}/songs/{{ $song->song_id }}/edit'">Edit</button></li>

                        @endif

                    </ul>

                </li>

            @endforeach

        </ul>

    @endif

@endsection