@extends('layout')

@section('body')
    <form method='POST' action='/myLists'>
        @csrf
	<input type="text" name="list_name" placeholder="list name" value="{{ old('list_name')}}"><br>
        <button type="submit">Create list</button>
	</form>

	@include('errors')
@endsection
