@extends('main')
@section('title')
	{{$usr}} | añadir Libro
@endsection

@section('content')

<div class="container">
@if(count($errors)>0)
	<ul>	
	@foreach($errors->all() as $error)
	 <li>
		<div class="alert alert-danger" role="alert">
 	 		 {{$error}}		
 	 	</div>
 	 </li>	
	@endforeach
	</ul>
@endif

{!! Form:: open(['route'=>['libros.store',$lista], 'method'=>'POST'])!!}


	<div class="form-group">
		{!! Form ::label('nombre','Nombre') !!}
		{!! Form :: text('nombre', null, ['class' => 'form-control', 'required', 'placeholder'=>"Nombre del nuevo libro .."]) !!}
	</div>	
	<div class="form-group">
		{!! Form ::label('autor','Autor') !!}
		{!! Form :: text('autor', null, ['class' => 'form-control', 'required', 'placeholder'=>"Nombre del Autor del libro"]) !!}
	</div>	
	<div class="form-group">
		{!! Form ::label('genero','Genero') !!}
		{!! Form :: text('genero', null, ['class' => 'form-control', 'required', 'placeholder'=>"Ingrese algun genero"]) !!}
	</div>	
	<div class="form-group">
		{!! Form ::submit('Agregar',['class'=>"btn btn-primary"]) !!}
	</div>		
</div>

{!! Form::close()!!}
@endsection