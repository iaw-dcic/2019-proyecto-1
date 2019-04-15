<!--  NAVBAR -->
  
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark ">
         <a class="navbar-brand" href="/"><img src="/img/recetario.png" alt="logo" width=60 heigh=30 ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                       <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
			        	</li>
				        <li class="nav-item active">
                      <a class="nav-link" href="#">Cocineros  </a>
			          	</li>
				        <li class="nav-item active dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"   data-toggle="dropdown">Recetas</a>
       			         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         				        <a class="dropdown-item" href="#">Dulces</a>
         				       <a class="dropdown-item" href="#">Saladas</a>
                    </div>
                 </li>
         
             </ul>
<!-- FORMULARIO LOGIN -->
<ul class="nav navbar-nav ml-auto">
	<li class="dropdown">
         @if(Auth::guest())

          <a href="#" class="dropdown-toggle" id="textoLogin" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
			     
            <ul id="login-dp" class="dropdown-menu">
					  	<a class="dropdown-item" href="{{route('login')}}">Ingrese</a>
							<a class="dropdown-item" href="#">Crea tu cuenta</a>									 
             </ul>	
          @endif
          @if($user = Auth::user())
             
            <a href="#" class="dropdown-toggle" id="textoLogin" data-toggle="dropdown"> {{$user->nombre}} <span class="caret"></span></a>
			     
           <ul id="login-dp" class="dropdown-menu">
             <a class="dropdown-item" href="#">Mi Perfil</a>
             <a class="dropdown-item" href="#">Cerrar Sesion</a>									 
            </ul>	
            @endif
    </li>
  </ul>
</nav>
  