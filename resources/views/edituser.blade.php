@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Editar Datos</h1>
    
    {!! Form::open(['action'=>['PagesController@update',$user->id], 'method'=>'POST'])!!}
        <div class="form-group">
        {{Form::label('name','Nombre')}}
        {{Form::text('name', $user->name, ['class'=>'form-control','placeholder'=>'Nombre'])}}
    </div>
    <div class="form-group">
        {{Form::label('email','Email')}}
        {{Form::text('email', $user->email,['class'=>'form-control','placeholder'=>'Email'])}}
    </div>
    <div class="form-group">
        {{Form::label('edad','Edad')}}
        {{Form::text('edad', $user->edad,['class'=>'form-control','placeholder'=>'Edad'])}}
    </div>
    <div class="form-group">
        {{Form::label('profesion','Profesion')}}
        {{Form::text('profesion', $user->profesion,['class'=>'form-control','placeholder'=>'Profesion'])}}
    </div>
    
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!!Form::close()!!}
</div>
@endsection
{{--
    name
    email
    edad
    profesion
--}}