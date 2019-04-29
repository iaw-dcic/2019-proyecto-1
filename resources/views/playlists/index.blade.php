@extends('layouts.master')
@section('content')
<div class="container">
        {{-- Para esta vista me pasan como parametro todas las playlists publicas--}}
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1>Playlists by {{$user->name}}</h1>
        </div>
    </div>
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
</div><!--container-->
@endsection
