@extends('layouts.master')
@section('content')
<div class="container">
    {{-- Para esta vista me pasan como parametro todas las playlists publicas--}}
    @if ($playlists->count())
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h3>Playlists by {{$user->name}}</h3>
        </div>
    </div>
    <div class="row">
            <div class="card-deck">
                    @foreach ($playlists as $playlist)
                        @if ($playlist->public)
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
                        @endif
                    @endforeach
                </div><!-- card deck-->
    </div><!-- row-->
    @else
    <div class="row justify-content-center">
        <div class="jumbotron bg-info">
            <h4 class="display-4">Whoops!</h4>
            <p class="lead">Parece que {{$user->name}} no tiene playlists públicas.</p>
            <hr class="my-4">
            <p class="lead">
                    <a class="btn btn-light btn-md" href="{{route('welcome')}}" role="button">Volver</a>
            </p>
        </div>
    </div>
    @endif
</div><!--container-->
@endsection
