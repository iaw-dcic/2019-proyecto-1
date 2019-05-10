@extends('main')
@section('title')
	{{$usr}} | Editar Lista {{$lista->nombre}}
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
{!! Form:: open(['route'=>['listas.update',$lista->id], 'method'=>'PUT'])!!}


	<div class="form-group">
		{!! Form ::label('nombre','Nombre') !!}
		{!! Form :: text('nombre', $lista->nombre, ['class' => 'form-control', 'required']) !!}
	</div>	
	<div class="form-group">
		{!! Form ::label('visibilidad','seleccione visibilidad') !!}
		{!! Form :: select('visibilidad', ['TRUE'=>'publica','FALSE' =>'privada'], ['class' => 'form-control', 'required']) !!}
	</div>
	<div class="form-group">
		{!! Form ::submit('Editar',['class'=>"btn btn-primary"]) !!}
	
	</div>		

{!! Form::close()!!}
</div>
@endsection