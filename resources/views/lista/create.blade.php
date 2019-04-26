@extends('secondTemplate')

@section('content')
	<h1 class="text-center font-weight-light mt-1 my-3">Add new list</h1>

	<div class="container">
		<form method="POST" action="/lists">
			{{ csrf_field() }}

			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="">List title</span>				
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
				<button type="submit" class="btn btn-success">Submit!</button>
			</div>
		</form>
	</div>

@endsection