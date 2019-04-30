@extends('layouts.app')

@section('myLayoutTitle', 'Profile')

@section('cssFileListing')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile Info</div>
                    <div class="card-body">
                        <p><b>Username:</b> {{ $user->name }}</p>
                        @if((((Auth::check()) && (Auth::user()->name) == ($user->name))) || (($user->email_public) == 1))
                            <p><b>Email:</b> {{ $user->email }}</p>
                        @endif

                        @if((((Auth::check()) && (Auth::user()->name) == ($user->name))) || (($user->first_name_public) == 1))
                            <p><b>First Name:</b> {{ $user->first_name }}</p>
                        @endif
                        
                        @if((((Auth::check()) && (Auth::user()->name) == ($user->name))) || (($user->last_name_public) == 1))
                            <p><b>Last Name:</b> {{ $user->last_name }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if((Auth::check() && Auth::user()->name) == ($user->name))
        <div id="editButton">
            <button class="btn btn-outline-secondary" type="button" onclick="location.href='/profiles/{{ Auth::user()->name }}/edit'">Edit</button>
        </div>
    @endif
        <div id="goBackButton">
            <button class="btn btn-outline-secondary" type="button" onclick="location.href='/home'">Return To Home</button>
        </div>

@endsection