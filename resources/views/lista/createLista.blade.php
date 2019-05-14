@extends('main')
@section('title')
	{{$usr}} | Crear Lista
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

{!! Form:: open(['route'=>['listas.store',$usr], 'method'=>'POST'])!!}


	<div class="form-group">
		{!! Form ::label('nombre','Nombre') !!}
		{!! Form :: text('nombre', null, ['class' => 'form-control', 'required', 'placeholder'=>"Nombre de la nueva lista"]) !!}
	</div>	
	<div class="form-group">
		{!! Form ::label('visibilidad','seleccione visibilidad') !!}
		{!! Form :: select('visibilidad', ['TRUE'=>'publica','FALSE' =>'privada'], ['class' => 'form-control', 'required']) !!}
	</div>
	<div class="form-group">
		{!! Form ::submit('Agregar',['class'=>"btn btn-primary"]) !!}
	</div>		
</div>

{!! Form::close()!!}
@endsection