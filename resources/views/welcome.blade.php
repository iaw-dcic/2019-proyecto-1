@extends('layouts.master')

@section('title','miplaylist')

@section('content')
<div class="container">
        {{-- Para esta vista me pasan como parametro todas las playlists publicas--}}
    @if($playlists->count())
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Playlists públicas</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($playlists as $playlist)
            <div class="col-sm-4 fluid">
                <div class="card text-center">
                    <div class="card-body bg-secondary rounded-big">
                        <h3>
                            <a class="card-link" href="{{ route('show_playlist',
                            ['user'=>$playlist->user_id,'playlist'=>$playlist->id])}}">
                                {{$playlist->name}}
                            </a>
                        </h3>
                        @if ($playlist->videos->count())
                        <div class="embed-responsive embed-responsive-4by3">
                            {!!$playlist->videos->first()->getEmbed()!!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <div class="row justify-content-center">
        <div class="jumbotron bg-info">
            <h4 class="display-3 text-center">:(</h4>
            <hr class="my-1">
            <p class="lead">Parece que aún no hay playlists públicas.</p>
            @auth
            <p class="lead">
                <a class="btn btn-light btn-md" href="{{route('create_playlist',['user'=>auth()->user()->id])}}" role="button">Crear playlist!</a>
            </p>
            @endauth
        </div>
    </div>
    @endif
</div>
@endsection
