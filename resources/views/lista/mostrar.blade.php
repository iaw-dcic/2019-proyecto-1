@extends('main')
@section('title')
	{{$usr}} | Perfil
@endsection

@section('content')
<span class="border border-secondary">
<table class="table table-striped">

<thead>
	<th>nombre</th>
	<th>ID</th>
</thead>
<tbody>	
@foreach ($listas as $lista)
	<tr>
		<td>
			{{$lista->nombre}}
		</td>
		<td>
			{{$lista->id}}
		</td>
	</tr>
	@endforeach
</tbody>
</table>
</div>
</span>
@endsection


