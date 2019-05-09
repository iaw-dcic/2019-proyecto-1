@extends('layouts.app')

@section('content')

<h1>Are you sure you want to delete this collection?</h1>    

<div class='jumbotron'>
            
            {{ Form::open(['action' => ['PostsController@destroy', $post->id] , 'method'=> 'POST', 'class' =>'pull-right']) }}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Yes', ['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}

            <a href ="/posts/{{$post->id}}/edit" class="btn btn-default"></a>
              

       
</div>

@endsection