@extends('main')

@section('title')
	{{$usr}} | Perfil
@endsection

@section('content')


<div class="container">
  <div class="row">
    <div class="col-8">
    	<table class="table table-striped">
			<thead class="thead-dark">
			<th>nombre</th>
			<th>visibilidad</th>
			</thead>
		<tbody>	
			@foreach ($listas as $lista)
			<tr>
				<td>
					{{$lista->nombre}}
				</td>
				<td>
				@if($lista->lista_publica == '1')
					<span class="badge badge-pill badge-primary">Publica</span>
  				@else
  					<span class="badge badge-pill badge-danger">Privada</span>
				@endif
				</td>
			</tr>
			@endforeach
		</tbody>
		</table>
	</div>
    <div class="col-4 border border-secondary">
    	<div class="row-4">
    		<img src="{{asset('/images/profiles/'.$usr_img)}}" class="img-thumbnail	" alt="Responsive image">
    	</div>
    	<div class="row-4">
    		<p class="lead">{{$usr_acerca}}</p>
    	</div>
    </div>
    </div>
  </div>
</div>
@endsection