@extends('main')
@section('title')
	{{$usr}} | Crear Perfil
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

{!! Form:: open(['route'=>'profiles.store', 'method'=>'POST','files' => true])!!}


	<div class="form-group">
		{!! Form ::label('acerca_de','Sobre ti:') !!}
		{!! Form :: text('acerca_de', null, ['class' => 'form-control', 'required', 'placeholder'=>"Escribe algo acerca de ti"]) !!}
	</div>	
	<div class="form-group">
		{!! Form ::label('imagen','Agregue una imagen de perfil') !!}
		{!! Form ::file('imagen') !!}
	</div>
	<div class="form-group">
		{!! Form ::submit('Agregar',['class'=>"btn btn-primary"]) !!}
	</div>		
</div>

{!! Form::close()!!}
@endsection