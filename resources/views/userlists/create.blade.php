@extends('layouts.app')

@section('body')
    <form method='POST' action='/{{$user->id}}/myLists'>
        @csrf
		<input type="text" name="list_name" placeholder="list name" value="{{ old('list_name')}}"><br>
        <button type="submit">Create list</button>
	</form>

	@include('errors')
@endsection
