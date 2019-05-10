@extends('main')
@section('title')
	{{$usr}} | Editar Perfil
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

{!! Form::open(['route'=>'profiles.update', 'method'=>'PUT','files' => true])!!}
	<div class="form-group">
		{!! Form ::label('nombre','Nombre') !!}
		{!! Form :: text('nombre',$usr, ['class' => 'form-control', 'required']) !!}
	</div>	

	<div class="form-group">
		{!! Form ::label('acerca_de','Sobre ti:') !!}
		{!! Form :: text('acerca_de',$profile->acerca_de , ['class' => 'form-control', 'required']) !!}
	</div>	
	<div class="form-group">
		{!! Form ::label('imagen','Agregue una imagen de perfil') !!}
		{!! Form ::file('imagen') !!}
	</div>
	<div class="form-group">
		{!! Form ::submit('Editar',['class'=>"btn btn-primary"]) !!}
	</div>		
</div>

{!! Form::close()!!}
@endsection