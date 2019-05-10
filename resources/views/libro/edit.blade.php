@extends('main')
@section('title')
	{{$usr}} | Editar Libro: {{$libro->nombre}}
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
{!! Form:: open(['route'=>['libros.update',$libro->id], 'method'=>'PUT'])!!}


	<div class="form-group">
		{!! Form ::label('nombre','Nombre') !!}
		{!! Form ::text('nombre', $libro->nombre, ['class' => 'form-control', 'required']) !!}
	</div>	
	<div class="form-group">
		{!! Form ::label('autor','Nombre del autor:') !!}
		{!! Form ::text('autor', $libro->autor, ['class' => 'form-control', 'required']) !!}
	</div>	<div class="form-group">
		{!! Form ::label('genero','genero:') !!}
		{!! Form ::text('genero', $libro->genero, ['class' => 'form-control', 'required']) !!}
	</div>	
	<div class="form-group">
		{!! Form ::submit('Editar',['class'=>"btn btn-primary"]) !!}
	
	</div>		

{!! Form::close()!!}
</div>
@endsection