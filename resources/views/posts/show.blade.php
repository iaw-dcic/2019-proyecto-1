@extends('layouts.app')

@section('content')
    <a href= "/posts" class = "btn btn-default"> Go Back </a>
    <h1> {{$post->title}} </h1>
    <div class='jumbotron'>
        {!!$post->body!!}
    </div>
    <hr>
    <small> Written on {{$post ->created_at}} by <a href ="/home/{{$post->user_id}}" class="btn btn-default">{{$post->user['name']}}</a>  </small>
    <hr>
    @if(!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
        <a href ="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
            <div class = 'float-right'>
            {{ Form::open(['action' => ['PostsController@destroy', $post->id] , 'method'=> 'POST', 'class' =>'pull-right']) }}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
            </div>
        @endif
    @endif 
    
@endsection 

