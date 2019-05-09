@extends('layouts.app')

@section('content')
    <h1>Is that the last Item you want to add?</h1>

     <div class = 'float-right'>  
     <a href= "/home" class = "btn btn-default">Yes</a> 
     {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=> 'POST']) }}
     {{Form::submit('No', ['class'=>'btn btn-danger'])}}
     {!!Form::close()!!} 
     </div>

             

    
@endsection 