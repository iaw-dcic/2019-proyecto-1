@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>{{$playlist->name}}</h3>
                <p>{{$playlist->description}}</p>
                <ol>
                @foreach ($playlist->videos as $video)
                    <li>
                        <a href="{{$video->url}}">
                            {{$video->title}}
                        </a>
                    </li>
                @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection
