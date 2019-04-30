@extends('layouts.homelink')

@section('stylesheets')
	<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
	<link rel="stylesheet" href="{{asset('css/wrappers.css')}}">
@endsection

@section('content')
	<div class="wrapper">
		<div id="formContent">
			<h1>Edit list</h1>
			<form method="POST" action="/{{$user->username}}/myLists/{{ $list->id }}">
				@method('PATCH')
				@csrf
				<div>
					<input type="text" class="text-input" name="list_name" placeholder="list name" value= '{{ $list->list_name }}'>
				</div>
				@if($errors->has('list_name'))
					<div class="error-label invalid-feedback" role="alert">
						<strong>{{ $errors->first('list_name') }}</strong>
					</div>
					<br>
				@endif
				<!-- Rounded switch -->
				<div>
					<label>Public</label>
					<label class="switch">
						<input name="public" type="checkbox" {{$list->public ? 'checked' : ''}}>
						<span class="slider round"></span>
					</label>
				</div>
				<div>
					<a href="/{{$user->username}}/myLists/{{$list->id}}/items/create">Add new item</a>
				</div>
				<div class="items">
					@foreach ($list->items as $item)
						<div>
							<div class="priority priority-{{$item->priority}}"></div>
							<a href="/{{$user->username}}/myLists/{{$list->id}}/items/{{$item->id}}/edit">
								<span  class="item-name" data-toggle="tooltip" data-placement="right" title="{{$item->description}}">
									{{$item->name}}
								</span>
							</a>
						</div>
					@endforeach
				</div>

				<input type="submit" class="submit-input" value="Save changes">
			</form>

			<form method="POST" action="/{{$user->username}}/myLists/{{ $list->id }}">
				@method('DELETE')
				@csrf

				<input type="submit" class="submit-input red-button" value="Delete list">
			</form>
		</div>
	</div>
@endsection
