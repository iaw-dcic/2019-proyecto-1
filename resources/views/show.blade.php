@extends('mainTemplate')

@section('content')

	<h1>{{$list->title}}</h1>

	<a href="{{$list->id}}/edit">editar</a>

@endsection