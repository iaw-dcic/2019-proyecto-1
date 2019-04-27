@extends('secondTemplate')

@section('content')
	<h1 class="text-center font-weight-light mt-1 my-3">Add new song</h1>

	<div class="container" style="padding-top: 20px">
		<form method="POST" action="/songs/{{$list->id}}">
			{{ csrf_field() }}

			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="">Song</span>
				  </div>
				  <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}">
				    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
    	                </span>
        	        @endif
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="">Album</span>
				  </div>
				  <input type="text" class="form-control{{ $errors->has('album') ? ' is-invalid' : '' }}" name="album" value="{{ old('album') }}">
			 		@if ($errors->has('album'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('album') }}</strong>
    	                </span>
        	        @endif
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="">Artist</span>
				  </div>
				  <input type="text" class="form-control{{ $errors->has('band') ? ' is-invalid' : '' }}" name="band" value="{{ old('band') }}">
				    @if ($errors->has('band'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('band') }}</strong>
    	                </span>
        	        @endif
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Add song!</button>
			</div>
		</form>
	</div>

@endsection