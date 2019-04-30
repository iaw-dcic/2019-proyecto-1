@extends('layouts.homelink')

@section('stylesheets')
	<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
	<link rel="stylesheet" href="{{asset('css/wrappers.css')}}">
	<link rel="stylesheet" href="{{asset('css/itemsForm.css')}}">
@endsection

@section('content')
	<div class="wrapper">
		<div id="formContent">
			<h1>Create item</h1>
			<form method="POST" action="/{{$user->username}}/myLists/{{ $list->id }}/items">
				@csrf
				<div>
					<input type="text" class="text-input" name="name" placeholder="item name" value= '{{ old('name') }}'>
					@if ($errors->has('name'))
						<div class="error-label invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</div>
						<br>
					@endif
					<input type="text" class="text-input" name="description" placeholder="item description" value= '{{ old('description') }}'>
					@if ($errors->has('description'))
						<div class="error-label invalid-feedback" role="alert">
							<strong>{{ $errors->first('description') }}</strong>
						</div>
						<br>
					@endif
					<div>
						<select id="priority-select" class="form-control" name="priority">
							<option>Low</option>
							<option>Medium</option>
							<option>High</option>
						</select>
					</div>
				</div>

				<input type="submit" class="submit-input" value="Create item">
			</form>
		</div>
	</div>
@endsection
