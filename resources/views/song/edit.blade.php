@extends('secondTemplate')

@section('content')

	<h1 class="text-center font-weight-light mt-1 my-3">Edit song</h1>

	<div class="container">
		<form method="POST" action="/songs/{{$song->id}}">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
			<div class="form-group">
				<label>Title</label>
				<input type="text" class="form-control" name="title" value="{{$song->title}}">
			</div>
			<div class="form-group">
				<label>Album</label>
				<input type="text" class="form-control" name="album" value="{{$song->album}}">
			</div>
			<div class="form-group">
				<label>Artist</label>
				<input type="text" class="form-control" name="band" value="{{$song->band}}">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
		</form>
		<form method="POST" action="/songs/{{$song->id}}">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
			<div class="form-group">
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
		</form>
	</div>

@endsection