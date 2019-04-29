@extends('layouts.app')

@section('myLayoutTitle', 'Lists')

@section('cssFileListing')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="title">{{ $album->list_name }}</h1>

    <div id="albumInfo" class="content"><b>Owner:</b> <a href="/profiles/{{ $album->owner }}">{{ $album->owner }}</a></div>

    <div id="albumInfo" class="content"><b>Status:</b> 
        @if($album->public == 1) Public
        @else Private
        @endif
    </div>

    @if($album->songs->count())

        <ul>

            @foreach($album->songs as $song)

                <li>

                    <p><b>Song Name: </b>{{ $song->song_name }} 

                    <b>Artist: </b>{{ $song->artist }} 

                    <b>Album: </b>{{ $song->album }} 

                    <b>Release Year: </b>{{ $song->release_year }} 

                    <b>Notes: </b>{{ $song->notes }}</p>

                    <p><a href="/albums/{{ $album->list_id }}/songs/{{ $song->song_id }}/edit">Edit</a></p>

                </li>

            @endforeach

        </ul>

    @endif

    <p>

        <a id="editListButton" href="/albums/{{ $album->list_id }}/edit">Edit List</a>

    </p>

    <p>

        <a id="createButton" href="/albums/{{ $album->list_id }}/songs/create">Add Song</a>

    </p>

    <p>

        <a id="createButton" href="/albums/">Go Back</a>

    </p>

@endsection