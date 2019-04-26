@extends('secondTemplate')

@section('content')
	<h1 class="text-center font-weight-light mt-1 my-3">My lists</h1>

	@if (count($listas)>0)

		@foreach ($listas as $lista)
		<ul class = "list-group">
			<li class = "list-group-item"><a href="/lists/{{$lista->id}}">{{ $lista -> title }}</a></li>
		<ul class = "list-group">
		@endforeach

	@else

			<div class="container mt-5">
				<p class="h5 text-center font-weight-light mt-1 my-3" style="color: darkgrey;">Seems like this is empty</p>
			</div>

	@endif

@endsection