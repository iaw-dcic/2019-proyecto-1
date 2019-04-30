@extends('layouts.homelink')

@section('stylesheets')
	<link rel="stylesheet" href="{{asset('css/wrappers.css')}}">
@endsection

@section('content')
<div class="wrapper">
	<div id="formContent">
		<h1>Edit profile</h1>
		<form method="POST" action="/profile/{{$user->username}}" enctype="multipart/form-data">
			@method('PATCH')
			@csrf
			<input type="text" class="text-input" name="username" value="{{$user->username}}" placeholder="username">
			@if ($errors->has('username'))
				<div class="error-label invalid-feedback" role="alert">
					<strong>{{ $errors->first('username') }}</strong>
				</div>
				<br>
			@endif
			<div id="file-input">
				<span id="image-label">Profile picture:</span>
				<span>
				<input type="file" class="file-input" name="image">
				@if ($errors->has('image'))
					<div class="error-label invalid-feedback" role="alert">
						<strong>{{ $errors->first('image') }}</strong>
					</div>
					<br>
				@endif
				</span>
			</div>
			<input type="text" class="text-input" name="nickname" value="{{$user->nickname}}" placeholder="nickname">
			<input type="text" class="text-input" name="bio" value="{{$user->bio}}" placeholder="bio">
			<input type="submit" class="submit-input" value="Save changes">
		</form>
	</div>
</div>
@endsection
