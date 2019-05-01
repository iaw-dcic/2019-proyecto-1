@extends('index.layout')


@section('content')


<div class = "container">

	<form method = "POST" action="/items/{{$item -> id}}/update">
        @method('PATCH')
		@csrf
		<div class = "container">
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label" >¿Dónde viajas?</label>
			
				<div class="col-10">
					<input class="form-control" type="text" id="example-text-input" name = "title" value = "{{$item -> title}}" >
				</div>
			</div>
			<div class="form-group row">
				<label for="example-date-input" class="col-2 col-form-label">¿Qué día llegas?</label>
				<div class="col-10">
					<input class="form-control" type="date" value="{{$item -> fecha}}" id="example-date-input" name="fecha">
				</div>
			</div>
			<div class="form-group row">
				<label for="example-number-input" class="col-2 col-form-label">¿Cuantós días te quedas?</label>
				<div class="col-10">
					<input class="form-control" type="number" id="example-number-input" name = "cantDias" value = "{{$item -> cantDias}}">
				</div>
			</div>
		</div>
		<div>
			<button type="submit" class="btn btn-primary">Agregar</button>
		</div>
		<div>
			<ul>
			@foreach($errors->all() as $error)
			<br>
			<li>{{$error}}</li>
			@endforeach	
			</ul>
		</div>
		
	</form>
</div>
	
@endsection