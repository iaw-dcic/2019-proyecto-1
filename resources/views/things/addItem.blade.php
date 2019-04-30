@extends('index.layout')

@section('content')

	 <a href="/things/{{$thing ->id}}/addItems" class="btn btn-default">
	 <h1 class = "title"> {{$thing -> title}} 
	 </h1>
	 <a href="/things/{{$thing ->id}}/edit" class="btn btn-default">edit</a>  

  
    @if($thing->items->count())
    
	<div>
	<div class = "container">
<table class="table">	
 	 <thead class="thead-dark">
    <tr>
      <th scope="col">Ciudad</th>
      <th scope="col">Fecha</th>
      <th scope="col">Cantidad de Días</th>
	  <th scope="col"></th>
    </tr>
 	 </thead>
 	 <tbody>
	
	@foreach($thing-> items as $item)
			<tr>
			<td>{{$item->title}}</td>
      		<td>{{$item->fecha}}</td>
      		<td>{{$item->cantDias}}</td>
			<td>
			<form method = "POST" action = "/items/{{$item -> id}}/destroy">
				{{method_field('DELETE')}}
				{{csrf_field()}}   
			<button type="delete" class="btn btn-outline-danger">Eliminar</button>
			</form>
			<form method = "POST" action = "/items/{{$item -> id}}/edit">
				{{method_field('PATCH')}}
				{{csrf_field()}}   
				<button type="delete" class="btn btn-outline-dark">Edit</button>
			</form>
			
			</td>
			
			</tr>
	@endforeach
	
  </tbody>
</table>

		
	</div>
    </div>
    @endif
   	<div class = "container">
    <form method = "POST" action="/items/{{$thing->id}}/store">
       
		@csrf
		<div class = "container">
				<div class="form-group row">
  					<label for="example-text-input" class="col-2 col-form-label">¿Dónde viajas?</label>
 					 <div class="col-10">
    				<input class="form-control" type="text" id="example-text-input" name = "title">
  					</div>
				</div>
				<div class="form-group row">
					<label for="example-date-input" class="col-2 col-form-label">¿Qué día llegas?</label>
					<div class="col-10">
					<input class="form-control" type="date" value="aaaa-mm-dd" id="example-date-input" name="fecha">
					</div>
				</div>
				<div class="form-group row">
  					<label for="example-number-input" class="col-2 col-form-label">¿Cuantós días te quedas?</label>
  					<div class="col-10">
    				<input class="form-control" type="number" id="example-number-input" name = "cantDias">
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