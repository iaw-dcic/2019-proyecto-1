@extends('secondTemplate')

@section('content')
	<div class="container mt-5 py-5 bg-light border border-primary">
		<p class="h1 text-center font-weight-light mt-1 my-3">{{$user->name}}</p>
		<p class="h3 text-center font-weight-light mt-1 my-3 darkgrey">{{$user->email}}</p>
		<p class="h5 text-center font-weight-light mt-1 my-3 darkgrey">{{$user->description}}</p>
		<p class="h5 text-center font-weight-light mt-1 my-3 darkgrey">Preference: {{$user->preference}}</p>
	</div>
@endsection