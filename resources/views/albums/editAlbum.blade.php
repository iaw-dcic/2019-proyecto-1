@extends('layouts.app')

@section('myLayoutTitle', 'Lists')

@section('cssFileListing')
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h1 id="createElem" class="title">Edit List</h1>

    <form id="createElem" method="POST" action="/albums/{{ $album->list_id }}">

        {{ method_field('PATCH') }}

        {{ csrf_field() }}

        <div class="field">
            <label class="label" for="list_name">List Title</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('list_name') ? 'is-danger' : '' }}" name="list_name" required value="{{ $album->list_name }}">
            </div>
        </div>
        <div id="selectBox" class="field">
            <label class="label" for="public">List Privacy</label>
            <select class="form-control" name="public">
                <option value=1 {{ ($album->public) == 1 ? 'selected="selected"' : '' }}>Public</option>
                <option value=0 {{ ($album->public) == 0 ? 'selected="selected"' : '' }}>Private</option>
            </select>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Modify List</button>
            </div>
        </div>
    </form>

    <form method="POST" action="/albums/{{ $album->list_id }}">

        {{ method_field('DELETE') }}

        {{ csrf_field() }}

        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete List</button>
            </div>
        </div>
    </form>

    <div id="backButton" class="field">
        <div class="control">
            <button type="button" onclick="location.href='/albums/{{ $album->list_id }}'">Go Back</button>
        </div>
    </div>

@endsection