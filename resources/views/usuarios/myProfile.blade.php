@extends('secondTemplate')

@section('content')
	<div class="container mt-5 py-5 bg-light border border-primary">
		<p class="h1 text-center font-weight-light mt-1 my-3">{{$user->name}}</p>
		<p class="h3 text-center font-weight-light mt-1 my-3" style="color: grey;">{{$user->email}}</p>
		<p class="h5 text-center font-weight-light mt-1 my-3" style="color: grey;">{{$user->description}}</p>
	</div>
@endsection