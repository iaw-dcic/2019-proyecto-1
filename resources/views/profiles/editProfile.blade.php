@extends('layouts.app')

@section('myLayoutTitle', 'Profile')

@section('cssFileListing')
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
@endsection

@section('content')

    <h1 id="createElem" class="title">Edit Profile</h1>

    <form id="createElem" method="POST" action="/profiles/{{ Auth::user()->name }}">

        {{ method_field('PATCH') }}

        {{ csrf_field() }}

        <div id="selectBox" class="field">
            <label class="label" for="email_public">Email Privacy</label>
            <select class="form-control" name="email_public">
                <option value=1>Public</option>
                <option value=0>Private</option>
            </select>
        </div>
        <div class="field">
            <label class="label" for="first_name">First Name</label>
            <div class="control">
                <input type="text" class="input" name="first_name" value="{{ Auth::user()->first_name }}">
            </div>
        </div>
        <div id="selectBox" class="field">
            <label class="label" for="first_name_public">First Name Privacy</label>
            <select class="form-control" name="first_name_public">
                <option value="1" {{ (Auth::user()->first_name_public) == 1 ? 'selected="selected"' : '' }}>Public</option>
                <option value="0" {{ (Auth::user()->first_name_public) == 0 ? 'selected="selected"' : '' }}>Private</option>
            </select>
        </div>
        <div class="field">
            <label class="label" for="last_name">Last Name</label>
            <div class="control">
                <input type="text" class="input" name="last_name" value="{{ Auth::user()->last_name }}">
            </div>
        </div>
        <div id="selectBox" class="field">
            <label class="label" for="last_name_public">Last Name Privacy</label>
            <select class="form-control" name="last_name_public">
                <option value="1" {{ (Auth::user()->last_name_public) == 1 ? 'selected="selected"' : '' }}>Public</option>
                <option value="0" {{ (Auth::user()->last_name_public) == 0 ? 'selected="selected"' : '' }}>Private</option>
            </select>
        </div>

        <div class="field">
            <div class="control">
                <button class="btn btn-outline-secondary" type="submit" class="button is-link">Modify User</button>
            </div>
        </div>
    </form>

    <form method="POST" action="/profiles/{{ Auth::user()->name }}">

        {{ method_field('DELETE') }}

        {{ csrf_field() }}

        <div class="field">
            <div class="control">
                <button class="btn btn-outline-secondary" type="submit" class="button">Delete User</button>
            </div>
        </div>
    </form>

    <div id="backButton" class="field">
        <div class="control">
            <button class="btn btn-outline-secondary" type="button" id="goBackButton" onclick="location.href='{{ url()->previous() }}'">Return</button>
        </div>
    </div>

@endsection