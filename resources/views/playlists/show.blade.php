@extends('layouts.master')

@section('title')
{{$playlist->name}} by {{$user->name}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @auth
                {{--titulo de playlist--}}
                <h3>{{$playlist->name}}</h3>
                @if(!auth()->user()->id == $user->id)
                {{--usuario logeado pero no es el dueño de la playlist--}}
                {{--muestro autor de playlist--}}
                <h5>by <a class="card-link" href="{{route('profile',['user'=>$user->id])}}">{{$user->name}}</a></h5>
                @endif
                {{-- descripcion de playlist --}}
                <p>{{$playlist->description}}</p>
                <ol>
                @foreach ($playlist->videos as $video)
                    <li>
                        {{--videos de playlist--}}
                        <a href="{{$video->url}}">@if ( empty($video->title) ){{$video->url}}@else{{$video->title}}@endif</a>
                        <a class="eliminar-link" href="{{action('PlaylistVideosController@destroy',['user'=>$user,'playlist'=>$playlist,'video'=>$video]) }}"
                        onclick="event.preventDefault();document.getElementById('eliminar-video-{{$video->id}}').submit();">Eliminar</a>
                        @if(auth()->user()->id == $user->id)
                        <form id="eliminar-video-{{$video->id}}" method="POST" style="display: none;"
                        action="{{action('PlaylistVideosController@destroy',['user'=>$user,'playlist'=>$playlist,'video'=>$video]) }}">
                                @method('DELETE')@csrf
                        </form>
                        @endif

                    </li>
                @endforeach
                </ol>
                @else



                {{--Usuario no logeado--}}
                @if($playlist->public)
                {{--si la playlist es publica--}}
                {{--titulo de playlist--}}
                <h3>{{$playlist->name}}</h3>
                {{--autor de playlist--}}
                <h5>by <a class="card-link" href="{{route('profile',['user'=>$user->id])}}">{{$user->name}}</a></h5>
                {{-- descripcion de playlist --}}
                <p>{{$playlist->description}}</p>
                <ol>
                @foreach ($playlist->videos as $video)
                    <li>
                    {{--videos de playlist--}}
                    <a href="{{$video->url}}">@if ( empty($video->title) ){{$video->url}}@else{{$video->title}}@endif</a>
                    </li>
                @endforeach
                </ol>
                @endif
                @endauth



            </div>
            <div class="col-md-6">
                @auth
                @if(auth()->user()->id == $user->id)
                <div class="btn-group" role="group">
                    @if (!$playlist->public)
                        {{--boton para publicar playlist--}}
                        <form method="POST"
                        action="{{action('PlaylistsController@publish',['user'=>$user,'playlist'=>$playlist]) }}">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-light">
                            {{ __('Publicar') }}
                            </button>
                        </form>
                    @endif
                <button class="btn btn-primary btn-sm"
                href="{{action('PlaylistsController@edit',['user'=>$user,'playlist'=>$playlist]) }}" >
                Editar
                </button>
                </div>
                {{-- formulario para agregar videos --}}
                <div class="jumbotron">
                        <div class="card">
                                <div class="card-body">
                <form method="POST"
                action="{{action('PlaylistVideosController@store',['user'=>$user,'playlist'=>$playlist]) }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col">
                                <input placeholder="URL" id="url" type="text" class="form-control{{ $errors->has('url') ? 'is-invalid' : '' }}"
                                name="url" value="{{ old('ulr') }}" required autofocus>
                                @if ($errors->has('url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <input placeholder="Titulo" id="title" type="text" class="form-control{{ $errors->has('title') ? 'is-invalid' : '' }}"
                                name="title" value="{{ old('title') }}" autofocus>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col">
                                    <input placeholder="Categoria" id="category" type="text" class="form-control{{ $errors->has('category') ? 'is-invalid' : '' }}"
                                    name="category" value="{{ old('category') }}" autofocus>
                                    @if ($errors->has('category'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    {{ __('Agregar') }}
                                </button>
                            </div>
                        </div>
                </form>
                </div>
                        </div>
                </div>
                @include('errors')
                @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
