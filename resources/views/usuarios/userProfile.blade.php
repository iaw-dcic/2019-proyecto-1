@extends('secondTemplate')

@section('content')
	<div class="container" style="padding-top: 20px;">
		<p class="h3">{{$user->name}}</p>
		<p class="h5" style="color: grey;">{{$user->email}}</p>
	</div>


	@if (count($listas)>0)
		<div class="list-group" style="padding-left: 10%; padding-right: 10%; padding-top: 50px;">
			<li class="list-group-item active">Listas públicas del usuario</li>
		@foreach ($listas as $lista)
			<a href="/search/{{$user->id}}/{{$lista->id}}" class="list-group-item">{{$lista->title}}</a>
		@endforeach
		</div>
	@else
		<div class="container" style="text-align: center; padding-top: 50px;">
			<p class="h5" style="color: darkgrey;">El usuario no tiene listas públicas</p>
		</div>
	@endif
@endsection