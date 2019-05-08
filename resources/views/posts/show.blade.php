@extends('layouts.app')

@section('content')
    <a href= "/posts" class = "btn btn-default"> Go Back </a>
    <h1> {{$post->title}} </h1>
    <div class='jumbotron'>
        {!!$post->body!!}
    </div>
  
    @if(!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
        
    <div>
        @foreach($items as $item)
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://source.unsplash.com/random/286x180/?{{str_replace(' ', '%20', $item->name)}}" alt="Image related to the name article">
        <div class="card-body">
            <h5 class="card-title">{{$item->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$item->price}}</h6>
            <a href="{{$item->link}}" class="card-link">Link</a>
        </div>
        </div>
        @endforeach
          <hr>
    <small> Created on {{$post ->created_at}} by <a href ="/home/{{$post->user_id}}" class="btn btn-default">{{$post->user['name']}}</a>  </small>
    <hr>
    </div>
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

