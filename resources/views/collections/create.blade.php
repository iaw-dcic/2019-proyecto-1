@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Crear Colección</h1>

    {!! Form::open(['action'=>'CollectionsController@store', 'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('collection_name','Titulo')}}
        {{Form::text('collection_name','',['class'=>'form-control','placeholder'=>'Titulo', 'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('public','Lista Publica:')}}
        {{Form::checkbox('public',true)}}
    </div>

    {{Form::submit('Crear', ['class'=>'btn btn-success'])}}
    {!!Form::close()!!}
</div>
@endsection