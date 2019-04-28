@extends('layouts.app')

@section('sectioncontent')
<section id="hero">
    <div class="hero-container">
        <div class="col-md-8">
            <div class="row mb-2">
                <div class="col-md-4">
                    <label class="text-white" for="listname">Lista: {{$lista->listname}}</label>
                    <div>
                        <span class="badge badge-success badge-pill">{{$lista->likes}} Likes</span>
                        <span class="badge badge-success badge-pill">{{$lista->views}} Vistas</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="text-white" for="description">Descripción</label>
                    <textarea readonly disabled class="scrollbar-primary" style="border-radius:15px; background-color: black;color:#fff;" cols="30" rows="3">{{$lista->description}}</textarea>
                </div>
                <div class="col-md-4">
                    <label class="text-white" for="listname">Creado Por:</label>
                    <img class="rounded-circle mr-1" width="50px" height="50px" src="{{ asset('uploads/avatars/'.$creator->avatar) }}">
                    <a class="text-white" style="a:active {color: red;}" href="/profile/{{$creator->username}}">{{$creator->username}}</a>
                </div>
            </div>
            <div class="additemsdiv scrollbar-primary">
                <div class="mr-2">
                    <div id="songscontainer">
                        <div class="form-row">
                            @foreach($items as $item)
                            <div class="form-group col-md-4">
                                <label class="text-white" for="songname">Nombre de Cancion</label>
                                <input type="text" class="form-control" value="{{ $item->songname }}" readonly disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="text-white" for="artist">Artista</label>
                                <input type="text" class="form-control" value="{{ $item->artist }}" readonly disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="text-white" for="album">Album</label>
                                <input type="text" class="form-control" value="{{ $item->album }}" readonly disabled>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row mt-4">
                @guest
                <div class="col-md-6 offset-md-4">
                    <button type="button" class="btn btn-primary" onclick="window.location='{{ route('login') }}';">
                        {{ __('Me Gusta') }}
                    </button>
                </div>
                @else
                @if($like)
                <form method="POST" action="{{ route('unLikeList') }}">
                    @csrf
                    @method('DELETE')
                    <div class="col-md-6 offset-md-4">
                        {!! Form::hidden('list_id',  $lista->id) !!}
                        <button type="submit" class="btn btn-success">
                            {{ __('Me Gusta') }}
                        </button>
                    </div>
                </form>
                @else
                <form method="POST" action="{{ route('likeList') }}">
                    @csrf
                    <div class="col-md-6 offset-md-4">
                       {!! Form::hidden('list_id',  $lista->id) !!}
                        <button type="submit" class="btn btn-primary">
                            {{ __('Me Gusta') }}
                        </button>
                    </div>
                </form>
                @endif
                @endguest
            </div>
        </div>
    </div>
</section>

@endsection