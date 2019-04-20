@extends('layout')

@section('content')
 
<div  class="table-responsive">
    <table class="table">
    <thead class="thead-dark">
       <tr>
        <th> Nombre </th>
        <th> Descripcion </th>
        <th> Pasos </th>
        <th></th>
         
        </tr>
        </thead>
    <tbody>
        
        @foreach($recetas as $receta)
        <tr>
          
          <td> {{$receta->nombre }}</td>
          <td> {{$receta->descripcion}} </td>
          <td>{{ $receta->pasos }}</td>
          <td>
          <table>
              <th> Ingredientes</th>
              <th> Medida</th>
              <th> Cantidad</th>
          @foreach($ingredientes as $ingrediente)
          
             @if($ingrediente->receta_id == $receta->id)
                  <tr>
                 <td>{{ $ingrediente->ingredienteId->nombre }}</td>
                    
                   
                 <td>{{ $ingrediente->medidaId->nombre }} </td>
                  <td>{{ $ingrediente->cantidad }}</td> 
                
          @endif
         
          @endforeach
        </table>
        </td>
        </tr>
          @endforeach
    </tbody>    
</table>
 </div>
  

 @stop

 