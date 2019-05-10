@extends('main')
@section('title')
	{{$usr}} | Listas {{$lista->nombre}}
@endsection

@section('content')
<div class="container">
<table class="table table-striped">
<thead class="thead-dark">
	<th>nombre</th>
	<th>autor</th>
	<th> genero </th>
	<th> acción </th>
</thead>
<tbody>	
@foreach ($libros as $libro)
	<tr>
		<td>
			{{$libro->nombre}}
		</td>
		<td>
			{{$libro->autor}}
		</td>
		<td>
			{{$libro->genero}}
		</td>
		<td> 
			<a href="{{ route('libros.edit',$libro->id) }}" role="button" class="btn btn-warning" aria-pressed="true">Editar</a>
			<a href="{{ route('libros.destroy',$libro->id) }}" role="button" class="btn btn-danger" aria-pressed="true">Eliminar</a>
		</td>
	</tr>
	@endforeach
</tbody>
</table>
<a href="{{route('libros.create',$lista->id)}}" role="button" class="btn btn-primary btn-lg btn-block" aria-pressed="true">Agregar</a>
</div>
@endsection
