@extends('secondTemplate')

@section('content')

	<h1 class="text-center font-weight-light mt-1 my-3">Edit list</h1>

	<div class="container">
		<form method="POST" action="/lists/{{$list->id}}">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label>Title</label>
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
	    			<label class="custom-control-label" for="defaultUnchecked">Public</label>
				</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
		</form>
		<form method="POST" action="/lists/{{$list->id}}">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
			<div class="form-group">
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
		</form>
	</div>

@endsection