@extends('layouts.app')

@section('myLayoutTitle', 'Songs')

@section('cssFileListing')
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
@endsection

@section('content')
    
    <h1 class="title">Edit List</h1>

    <form method="POST" action="/albums/{{ $album->list_id }}/songs">

        {{ csrf_field() }}

        <div class="field">
            <label class="label" for="song_name">Song Title</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('song_name') ? 'is-danger' : '' }}" name="song_name" required value="{{ $song->song_name }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="artist">Artist Name</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('artist') ? 'is-danger' : '' }}" name="artist" required value="{{ $song->artist }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="album">Album</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('album') ? 'is-danger' : '' }}" name="album" required value="{{ $song->album }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="release_year">Release Year</label>
            <div class="control">
                <input type="number" step="1" class="input {{ $errors->has('release_year') ? 'is-danger' : '' }}" name="release_year" required value="{{ $song->release_year }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="notes">Notes</label>
            <div class="control">
                <textarea name="notes" class="textarea" value="{{ $song->notes }}"></textarea>
            </div>
        
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Edit List</button>
            </div>
        </div>
    </form>

    <form method="POST" action="/albums/{{ $album->list_id }}/songs">

        {{ method_field('DELETE') }}

        {{ csrf_field() }}

        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete Song</button>
            </div>
        </div>
    </form>

    <div id="backButton" class="field">
        <div class="control">
            <button type="button" onclick="location.href='/albums/{{ $album->list_id }}'">Go Back</button>
        </div>
    </div>

@endsection