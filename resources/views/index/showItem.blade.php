@extends('index.layout')

@section('content')

	
<h1 class = "title"> <p class="font-weight-bolder"> {{$lista -> title}} </p></h1> 
	

  
    @if($items->count())
    
			
	<div class = "container">
		<table class="table">	
			<thead class="thead-dark">
				<tr>
				<th scope="col">Ciudad</th>
				<th scope="col">Fecha</th>
				<th scope="col">Cantidad de Días</th>
				</tr>
			</thead>
			
			<tbody>
			@foreach($items as $item)
			<tr>
				<td>{{$item->title}}</td>
				<td>{{$item->fecha}}</td>
				<td>{{$item->cantDias}}</td>
			</tr>
			@endforeach
			@else 
				<h4> Todavia no ha decidido que ciudad visitar </h4>

			@endif
			</tbody>
		</table>
	</div>
@endsection
