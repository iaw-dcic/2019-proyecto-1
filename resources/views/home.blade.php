@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sd-4">
            <div class="well well-lg">
                <h3>Hola, {{$user->name}}!</h3>
                <a class="btn btn-primary btn-sm" href="{{ url(auth()->user()->id,'create')}}">Nueva playlist</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="col-sm-8">
            <h4>Tus playlists</h4>
            @foreach ($user->playlists as $playlist)
            <div class="card text-center">
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
                        @foreach ($playlist->videos() as $video)
                        <li>
                            <a class="class-link" href="{{$video->url}}">
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
        </div>

    </div><!-- row -->
</div><!-- container -->
@endsection
