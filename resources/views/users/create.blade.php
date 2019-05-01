@extends('layout')

@section('title', "Crear usuario")

@section('content')
   
	  <div class="card">
	
	  <h4 class="card-header">Crear usuario</h4>
        <div class="card-body">
	
	 <form method="POST" action="{{ url('usuarios') }}">
	  {{ csrf_field() }}
	  
	 <div class="form-group">
	  	<label for="name">Nombre y apellido</label>
		<input type="text" name="nombre" id="name" class="form-control" placeholder="Micaela Melo" required autofocus>
	</div>
	 
    <div class="form-group">
	  	<label for="email">E-Mail</label>
		<input type="email" name="correo" id="email" class="form-control" placeholder="filmik@example" required autofocus>
	</div>
	
	<div class="form-group">
		<label for="password">Contraseña</label>
		<input type="password" name="clave" id="password" class="form-control" placeholder="contraseña" required>	
	  </div>

	  <div class="checkbox mb-3">
		<label>
		  <input type="checkbox" value="remember-me"> Recuérdame
		</label>
	  </div>
	  
	  <center>
	  <button class="btn btn-primary" type="submit">Registrarse</button>
	  </center>
	  
	  
   </form>
	</div>
 
@endsection