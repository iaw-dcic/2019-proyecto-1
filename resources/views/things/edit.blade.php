@extends('index.layout')

@section('content')

	<h1> <p class="font-weight-bolder">Mis Listas </p></h1>

	<form method = "POST" action = "/things/{{$thing -> id}}">
		{{method_field('PATCH')}}
		{{csrf_field()}}   
	
		<div class="list-group">
		<!--Material textarea-->
			<div class="md-form mb-4 pink-textarea active-pink-textarea">
				<label for="form18">Titulo Actual: {{$thing ->title}} </label>	
				<textarea name = "title"  id="form18" class="md-textarea form-control" rows="2">
				</textarea>
			</div>
  		</div>
		  <button type="submit" class="btn btn-outline-success">Cargar</button>
	</form>


	<form method = "POST" action = "/things/{{$thing -> id}}">
		{{method_field('DELETE')}}
		{{csrf_field()}}   
	
		<button type="delete" class="btn btn-outline-success">Delete</button>
	</form>

	<div>
			<ul>
				@foreach($errors->all() as $error)
					<br>
					<li>{{$error}}</li>
				@endforeach	
			</ul>
	</div>
@endsection