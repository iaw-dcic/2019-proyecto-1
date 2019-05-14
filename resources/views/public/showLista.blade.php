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
	</tr>
	@endforeach
</tbody>
</table>
</div>
@endsection
