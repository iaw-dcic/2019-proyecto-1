@extends('layout')

@section('myLayoutTitle', 'Listas')

@section('myLayoutContent')

    <h1 class="title">Edit List</h1>

    <form>

        <div class="field">
            <label class="label" for="song_name">Song Title</label>
            <div class="control">
                <input type="text" class="input" name="title" required>
            </div>
        </div>

        <div class="field">
            <label class="lavel" for="artist">Artist Name</label>
            <div class="control">
                <input type="text" class="input" name="artist" required>
            </div>
        </div>

        <div class="field">
            <label class="lavel" for="album">Album</label>
            <div class="control">
                <input type="text" class="input" name="album" required>
            </div>
        </div>

        <div class="field">
            <label class="lavel" for="release_year">Release Year</label>
            <div class="control">
                <input type="number" step="1" class="input" name="release_year" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="notes">Notes</label>
            <div class="controll">
                <textarea name="notes" class="textarea"></textarea>
            </div>
        
        </div>

        <div class="field">
            <div class="controll">
                <button type="submit" class="button is-link">Update List</button>
            </div>
        </div>

    </form>

@endsection