@extends('secondTemplate')

@section('content')
	<h1>Agregar lista</h1>

	<div class="container">
		<form method="POST" action="/lists">
			{{ csrf_field() }}

			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="">Nombre de la lista</span>				
				  </div>
				  <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" 
				  value="{{ old('title') }}">
				  		@if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
        	                </span>
                        @endif
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Crear lista</button>
			</div>
		</form>
	</div>

@endsection