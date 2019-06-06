@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Crear Post</h1>
    {!! Form::open(['action'=>'PostsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
    <div class="form-group">
        {{Form::label('title','Titulo')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Titulo'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Comentario')}}
        {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Comentario', 'maxlength'=>100,'rows'=>2])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    
    {{Form::submit('Crear', ['class'=>'btn btn-success'])}}
    {!!Form::close()!!}
</div>
@endsection