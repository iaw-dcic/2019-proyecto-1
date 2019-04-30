@extends('layouts.homelink')

@section('stylesheets')
	<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
	<link rel="stylesheet" href="{{asset('css/login.css')}}">
	<link rel="stylesheet" href="{{asset('css/itemsForm.css')}}">
@endsection

@section('content')
	<div class="wrapper">
			<div id="formContent">
				<h1>Edit item</h1>
				<form method="POST" action="/{{$user->username}}/myLists/{{$list->id}}/items/{{$item->id}}">
					@method('PATCH')
					@csrf
					<div>
						<input type="text" name="name" placeholder="item name" value="{{$item->name}}">
						@if ($errors->has('name'))
							<div class="error-label invalid-feedback" role="alert">
								<strong>{{ $errors->first('name') }}</strong>
							</div>
							<br>
						@endif
						<input type="text" name="description" placeholder="item description" value="{{$item->description}}">
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

					<input type="submit" value="Apply">
				</form>


				<form method="POST" action="/{{$user->username}}/myLists/{{ $list->id }}/items/{{$item->id}}">
					@method('DELETE')
					@csrf

					<input type="submit" class="red-button" value="Delete item">
				</form>
			</div>
		</div>
@endsection
