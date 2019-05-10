@extends('main')
@section('title')
	{{$usr}} | Listas
@endsection

@section('content')
<div class="container">
<table class="table table-striped">
<thead class="thead-dark">
	<th>nombre</th>
	<th>visibilidad</th>
	<th> Acción </th>
</thead>
<tbody>	
@foreach ($listas as $lista)
	<tr>
		<td>
			<a href="{{ route('listas.show',$lista->id)}}"> {{$lista->nombre}}</a>
		</td>
		<td>
			@if($lista->lista_publica == '1')
				<span class="badge badge-pill badge-primary">Publica</span>
  			@else
  				<span class="badge badge-pill badge-danger">Privada</span>
			@endif
		</td>
		<td> 
			<a href="{{ route('listas.edit',$lista) }}" role="button" class="btn btn-warning" aria-pressed="true">Editar</a>
			<a href="{{ route('listas.destroy',$lista->id) }}" role="button" class="btn btn-danger" aria-pressed="true">Eliminar</a>
		</td>
	</tr>
	@endforeach
</tbody>
</table>
<a href="{{route('listas.create',$lista)}}" role="button" class="btn btn-primary btn-lg btn-block" aria-pressed="true">Agregar</a>
</div>
@endsection
