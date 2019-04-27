@extends('layouts.master')
@section('content')
<div class="container">
        {{-- Para esta vista me pasan como parametro todas las playlists publicas--}}
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Playlists by {{auth()->user()->name}}</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($playlists as $playlist)
            <div class="col-sm-4 fluid">
                <div class="card text-center">
                    <div class="card-body bg-secondary rounded-big">
                        <h3>
                            <a class="card-link" href="{{ url($playlists->id) }}">
                                {{$playlist->name}}
                            </a>
                        </h3>
                        <p  class="card-text">
                            {{$playlist->description}}
                        </p>
                        <ol>
                            @foreach ($playlist->videos() as $video)
                                <li>
                                    <a class="class-link" href="{{$video->url}}">
                                        {{$video->title}}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
