@extends('mainTemplate')

@section('content')
	<h1>Seccion de listas</h1>

	<form method="POST" action="/lists">
		{{ csrf_field() }}

		<div>
			<input type="text" name="title">
		</div>
		<div>
			<input type="text" name="album">
		</div>
		<div>
			<input type="text" name="band">
		</div>
		<div>
			<button type="submit">Submit song</button>
		</div>
	</form>

@endsection