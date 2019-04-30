@extends('secondTemplate')

@section('content')
	<h1 class="text-center font-weight-light mt-1 my-3">Edit my profile</h1>

	<div class="container">
		<form method="POST" action="/edit_profile">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}

			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$user->name}}">

				@if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
			</div>

			<div class="form-group">
  				<label for="exampleFormControlTextarea2">Description</label>
  				<textarea class="form-control rounded-0" rows="3" name="description">{{$user->description}}</textarea>
			</div>

			<div class="form-group">
				<label>Preference</label>
			 	<select name="preference">
				 	<option value="none">None</option>
				  	<option value="rock">Rock</option>
				  	<option value="pop">Pop</option>
				  	<option value="jazz">Jazz</option>
				</select> 
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
		</form>
	</div>
@endsection