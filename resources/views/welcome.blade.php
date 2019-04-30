@extends('layouts.master')

@section('content')
<div class="container">
        {{-- Para esta vista me pasan como parametro todas las playlists publicas--}}
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Playlists mas populares</h1>
                <p>Ultimas playlists ordenadas por popularidad en base a los usuarios</p>
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
</div>
@endsection
