@extends('layout')

@section('myLayoutTitle', 'Listas')

@section('content')

    <h1 class="title">Create New List</h1>

    <form method="POST" action="/songs">

        {{ csrf_field() }}

        <div class="field">
            <label class="label" for="song_name">Song Title</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('song_name') ? 'is-danger' : '' }}" name="song_name" required value="{{ old('song_name') }}">
            </div>
        </div>

        <div class="field">
            <label class="lavel" for="artist">Artist Name</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('artist') ? 'is-danger' : '' }}" name="artist" required value="{{ old('artist') }}">
            </div>
        </div>

        <div class="field">
            <label class="lavel" for="album">Album</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('album') ? 'is-danger' : '' }}" name="album" required value="{{ old('album') }}">
            </div>
        </div>

        <div class="field">
            <label class="lavel" for="release_year">Release Year</label>
            <div class="control">
                <input type="number" step="1" class="input {{ $errors->has('release_year') ? 'is-danger' : '' }}" name="release_year" required value="{{ old('release_year') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="notes">Notes</label>
            <div class="control">
                <textarea name="notes" class="textarea" value="{{ old('notes') }}"></textarea>
            </div>
        
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create List</button>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="button" onclick="location.href='{{ url('home') }}'">Go Back</button>
            </div>
        </div>

        @if ($errors->any())
        <div class="notification is-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

@endsection