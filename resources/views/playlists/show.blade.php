@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>{{$playlist->name}}</h3>
                <p>{{$playlist->description}}</p>
                <a class="btn btn-primary btn-sm"
                href="{{action('PlaylistsController@edit',['user'=>$user,'playlist'=>$playlist]) }}" >
                    Editar
                </a>
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
    </div>
@endsection
