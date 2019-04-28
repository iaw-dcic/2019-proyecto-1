<!--  NAVBAR -->
  
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark ">
         <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('img/recetario.png') }}" alt="logo" width=60 heigh=30 ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                       <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
			        	</li>
				        <li class="nav-item active">
                      <a class="nav-link" href="{{route('cocineros')}}">Cocineros  </a>
			          	</li>
				        <li class="nav-item active dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"   data-toggle="dropdown">Recetas</a>
       			         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         				        <a class="dropdown-item" href="{{route('recetaCategoria',['categoria'=>1])}}">Dulces</a>
                        <a class="dropdown-item" href="{{route('recetaCategoria',['categoria'=>0])}}">Saladas</a>
                        <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{route('recetas')}}">Todas</a>
                    </div>
                 </li>
                 <li class="nav-item active">
                      <a class="nav-link" href="{{route('listas')}}">Listas  </a>
			          	</li>
             </ul>
<!-- FORMULARIO LOGIN -->
<ul class="nav navbar-nav ml-auto">
	<li class="dropdown">
         @if(Auth::guest())
        
          <a href="#" class="dropdown-toggle" id="textoLogin" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
			     
            <ul id="login-dp" class="dropdown-menu">
					  	<a class="dropdown-item" href="{{route('login')}}">Ingrese</a>
							<a class="dropdown-item" href="{{route('crea')}}">Crea tu cuenta</a>									 
             </ul>	
          @endif
          @if($user = Auth::user())
          
            <a href="#" class="dropdown-toggle" id="textoLogin" data-toggle="dropdown"> {{$user->nombre}} <span class="caret"></span></a>
            @if($user->avatar !=null)
            <a class="navbar-brand" href="/"><img src="{{asset($user->avatar)}}" alt="logo" width=60 heigh=30 ></a>
            @endif
           <ul id="login-dp " class="dropdown-menu">
             <a class="dropdown-item" href="{{route('verPerfil',['id'=>$user->id])}}">Mi Perfil</a>
             <a class="dropdown-item" href="{{route('logout')}}">Cerrar Sesion</a>									 
            </ul>	
            @endif
    </li>
  </ul>
</nav>