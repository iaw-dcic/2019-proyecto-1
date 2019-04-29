@extends('secondTemplate')

@section('content')
	<div class="container pt-2">
		<p class="h3">{{$user->name}}</p>
		<p class="h5" style="color: grey;">{{$user->email}}</p>
		<p class="h6" style="color: grey;">{{$user->description}}</p>
	</div>


	@if (count($listas)>0)
		<div class="list-group px-5 pt-2">
			<li class="list-group-item active">{{$user->name}}'s public lists</li>
		@foreach ($listas as $lista)
			<a href="/search/{{$user->id}}/{{$lista->id}}" class="list-group-item">{{$lista->title}}</a>
		@endforeach
		</div>
	@else
		<div class="container pt-5">
			<p class="h5 darkgrey text-center">No public lists by this user</p>
		</div>
	@endif
@endsection