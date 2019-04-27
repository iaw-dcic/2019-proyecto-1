@extends('secondTemplate')

@section('content')

	<h1 class="text-center font-weight-light mt-1 my-3">Edit song</h1>

	<div class="container">
		<form method="POST" action="/songs/{{$song->id}}">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label>Title</label>
				<input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{$song->title}}">
				@if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
	                </span>
    	        @endif
			</div>
			<div class="form-group">
				<label>Album</label>
				<input type="text" class="form-control{{ $errors->has('album') ? ' is-invalid' : '' }}" name="album" value="{{$song->album}}">
				@if ($errors->has('album'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('album') }}</strong>
	                </span>
    	        @endif
			</div>
			<div class="form-group">
				<label>Artist</label>
				<input type="text" class="form-control{{ $errors->has('band') ? ' is-invalid' : '' }}" name="band" value="{{$song->band}}">
				@if ($errors->has('band'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('band') }}</strong>
	                </span>
    	        @endif
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
		</form>
		<form method="POST" action="/songs/{{$song->id}}">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
			<div class="form-group">
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
		</form>
	</div>

@endsection