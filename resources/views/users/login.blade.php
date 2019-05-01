@extends('layout')

@section('title', "Crear usuario")

@section('content')
   
	  <div class="card">
	
	  <h4 class="card-header">Iniciar sesión</h4>
        <div class="card-body">
	
	 <form method="POST" action="{{ url('usuarios') }}">
	 
	  <div class="form-group">
	  	<label for="inputEmail">E-Mail</label>
		<input type="email" id="inputEmail" class="form-control" placeholder="filmik@example" required autofocus>
	</div>
	
	<div class="form-group">
		<label for="inputPassword">Contraseña</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="contraseña" required>	
	  </div>

	  <div class="checkbox mb-3">
		<label>
		  <input type="checkbox" value="remember-me"> Recuérdame
		</label>
	  </div>
	  
	  <center>
	  <button class="btn btn-primary" type="submit">Iniciar sesión</button>
	  </center>
	  
	
   </form>
	</div>
 
@endsection