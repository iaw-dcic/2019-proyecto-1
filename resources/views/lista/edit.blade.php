@extends('secondTemplate')

@section('content')

	<h1>Editar lista</h1>

	<div class="container">
		<form method="POST" action="/lists/{{$list->id}}">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label>Titutlo</label>
				<input type="text" class="form-control" name="title" value="{{$list->title}}">
			</div>

			@if ($list->public == 0)
				<div class="custom-control custom-checkbox" style="margin-bottom: 20px">
	    			<input type="checkbox" class="custom-control-input" name="isPublic" id="defaultUnchecked">
	    			<label class="custom-control-label" for="defaultUnchecked">Publica</label>
				</div>
			@else 
				<div class="custom-control custom-checkbox" style="margin-bottom: 20px">
	    			<input type="checkbox" class="custom-control-input" name="isPublic" id="defaultUnchecked" checked>
	    			<label class="custom-control-label" for="defaultUnchecked">Publica</label>
				</div>
			@endif

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Editar</button>
			</div>
		</form>
		<form method="POST" action="/lists/{{$list->id}}">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
			<div class="form-group">
				<button type="submit" class="btn btn-danger">Eliminar</button>
			</div>
		</form>
	</div>

@endsection