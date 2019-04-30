@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <hr>
    <img style="width:100" src="/public/{{$post->cover_image}}">
    <br><br>
    <div>{!!$post->body!!}</div>
    <hr>
    <small>Written on {{$post->created_at}} by <a href="/profile/{{$post->user->id}}">{{$post->user->name}}</a></small>
    <hr>
    @if(!Auth::guest()) 
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default"> Edit</a>
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    <br><br>
    <a href="/posts" class="btn btn-primary">Go back</a>
@endsection