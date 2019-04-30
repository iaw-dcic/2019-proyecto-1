@extends('layouts.master')

@section('title','Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h3>Hola, {{$user->name}}!</h3>
        </div>
        <div class="col-sm-6">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div><!-- row -->
    <div class="row">
        <div class="col-sm-10">
            <h3>Tus playlists<h1>
        </div>
        <div class="col-sm-2 justify-content-right">
            <div class="well well-lg">
                <a class="btn btn-primary btn-sm" href="{{ url(auth()->user()->id,'create')}}">Nueva playlist</a>
            </div>
        </div>
    </div><!-- row-->
    <div class="row">
            <div class="card-deck">
                @foreach ($user->playlists as $playlist)
                    <div class="card">
                        <div class="card-body bg-secondary rounded-big">
                            <h3>
                                <a class="card-link" href="{{ url($user->id,$playlist) }}">
                                    {{$playlist->name}}
                                </a>
                            </h3>
                            <p  class="card-text">
                                {{$playlist->description}}
                            </p>
                            <ol>
                                @foreach ($playlist->videos as $video)
                                    <li>
                                        <a href="{{$video->url}}">
                                                    @if ( empty($video->title) )
                                                        {{$video->url}}
                                                    @else
                                                        {{$video->title}}
                                                    @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                </div>
                @endforeach
            </div><!-- card deck-->
        </div><!-- row-->
</div><!-- container -->
@endsection
