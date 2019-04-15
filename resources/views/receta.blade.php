@extends('layout')

@section('content')
@if(isset($details))
<div  class="tabla">
    <table class="table">
    <thead class="thead-dark">
       <tr>
        <th> Nombre </th>
        <th> Descripcion </th>
        <th> Pasos </th>
        <th> Ingredientes <th>
        </tr>
        </thead>
    <tbody>
        
        @foreach($details as $receta)
        <tr>
      
          <td> {{$receta->nombre }}</td>
          <td> {{$receta->descripcion}} </td>
          <td>{{ $receta->pasos }}</td>
          @foreach($ingredientes as $ingrediente)
          <td>{{ $ingrediente }}</td>
          @endforeach
          @endforeach
    </tbody>    
    @else 
    <p>NO HAY NADA CHE </p>
 </div>
 @endif

 @stop

 