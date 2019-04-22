@extends('layout')

@section('title', "Lista {$id}")

@section('content')
     <h1>Lista #{{ $id }}</h1>

    Mostrando detalle de la lista: {{ $id }}
   
@endsection