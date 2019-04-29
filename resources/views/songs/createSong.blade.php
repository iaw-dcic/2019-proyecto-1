@extends('layouts.app')

@section('myLayoutTitle', 'Add New Song')

@section('cssFileListing')
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h1 class="title">Create New Song</h1>

    <form method="POST" action="/albums/{{ $album->list_id }}/songs">

        {{ csrf_field() }}

        <div class="field">
            <label class="label" for="song_name">Song Title</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('song_name') ? 'is-danger' : '' }}" name="song_name" required value="{{ old('song_name') }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="artist">Artist</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('artist') ? 'is-danger' : '' }}" name="artist" required value="{{ old('artist') }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="album">Official Album</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('album') ? 'is-danger' : '' }}" name="album" required value="{{ old('album') }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="release_year">Release Year</label>
            <div class="control">
                <input type="number" min="1" class="input {{ $errors->has('release_year') ? 'is-danger' : '' }}" name="release_year" required value="{{ old('release_year') }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="notes">Notes</label>
            <div class="control">
                <textarea type="text" class="input" name="notes" value="{{ old('notes') }}"></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Song To Current List</button>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="button" onclick="location.href='/albums/{{ $album->list_id }}'">Go Back</button>
            </div>
        </div>
    
    </form>

@endsection