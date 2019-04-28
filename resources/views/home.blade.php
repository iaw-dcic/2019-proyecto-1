@extends('layouts.app')

@section('fontListing')
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
@endSection

@section('cssFileListing')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Welcome Back {{ Auth::user()->name }}
                    </div>
                </div>

                <ul class="listChoice">
                    <li><a class="listChoiceElem" href="{{ route('profile') }}">Profile</a>: Go to your profile</li>
                    <li><a class="listChoiceElem" href="{{ url('albums/') }}">Your Lists</a>: Look and edit your existing albums</li>
                    <li><a class="listChoiceElem" href="{{ url('albums/create') }}">Create New List</a>: Create a new, empty album list</li>
                    <li><a class="listChoiceElem" href="{{ route('browse') }}">Browse Lists</a>: Look through all of the existing lists</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
