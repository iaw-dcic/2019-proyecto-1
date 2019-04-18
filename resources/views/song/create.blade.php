@extends('secondTemplate')

@section('content')
	<h1>Agregar canción</h1>

	<div class="container" style="padding-top: 20px">
		<form method="POST" action="/songs/{{$list->id}}">
			{{ csrf_field() }}

			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="">Título de la canción</span>
				  </div>
				  <input type="text" class="form-control" name="title">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="">Album de la canción</span>
				  </div>
				  <input type="text" class="form-control" name="album">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="">Banda de la canción</span>
				  </div>
				  <input type="text" class="form-control" name="band">
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Crear canción</button>
			</div>
		</form>
	</div>

@endsection