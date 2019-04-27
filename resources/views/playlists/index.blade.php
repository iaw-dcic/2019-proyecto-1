@extends('layouts.master')
@section('content')
    <div class="container">
        <h2>Mis playlists</h2>
        <div class="list-group">
        @foreach ($playlists as $playlist)
            <div class="list-item">
                {{$playlist->name}}
            </div>
        @endforeach
        </div>
    </div>
    <div class="container">
        <a class="btn btn-lg btn-secondary" href="{{ url('/playlists/create') }}">Nueva</a>
    </div>
@endsection
