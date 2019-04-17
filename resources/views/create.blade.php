@extends('mainTemplate')

@section('content')
	<h1>Seccion de listas</h1>

	<div class="container">
		<form method="POST" action="/lists">
			{{ csrf_field() }}

			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="">Nombre de la lista</span>
				  </div>
				  <input type="text" class="form-control" name="title">
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Crear lista</button>
			</div>
		</form>
	</div>

@endsection