@extends('layouts.app')

@section('myLayoutTitle', 'Lists')

@section('cssFileListing')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="title">{{ $album->list_name }}</h1>

    <div id="albumInfo" class="content"><b>Owner:</b> {{ $album->owner }}</div>

    <div id="albumInfo" class="content"><b>Status:</b> 
        @if($album->public == 1) Public
        @else Private
        @endif
    </div>

    @if($album->songs->count())

        <ul>

            @foreach($album->songs as $song)

                <li>

                    <p>{{ $song->song_name }}</p>

                    <p>{{ $song->artist }}</p>

                    <p>{{ $song->album }}</p>

                    <p>{{ $song->release_year }}</p>

                    <p>{{ $song->notes }}</p>

                    <p><a href="/songs/{{ $song->song_id }}/edit">Edit</a></p>

                </li>

            @endforeach

        </ul>

    @endif

    <p>

        <a id="editButton" href="/albums/{{ $album->list_id }}/edit">Edit</a>

    </p>

    <p>

        <a id="createButton" href="/songs/create">Add Song</a>

    </p>

@endsection