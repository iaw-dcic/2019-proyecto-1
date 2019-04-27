@extends('layout')
@section('content')
   <br> 
    @foreach($listas as $lista)
    @if($lista->public)
    <h2> {{$lista->nombre}} </h2>
    @endif
    @endforeach
@stop