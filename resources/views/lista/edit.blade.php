@extends('secondTemplate')

@section('content')

	<h1>Editar lista</h1>

	<div class="container">
		<form method="POST" action="/lists/{{$list->id}}">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label>Titutlo</label>
				<input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" 
				name="title" value="{{$list->title}}">
				@if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
	                </span>
                @endif
			</div>

				<div class="custom-control custom-checkbox" style="margin-bottom: 20px">
	    			<input type="checkbox" class="custom-control-input" name="isPublic" id="defaultUnchecked"
	    			{{ ($list->public == 1) ? 'checked' : '' }}>
	    			<label class="custom-control-label" for="defaultUnchecked">Publica</label>
				</div>

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