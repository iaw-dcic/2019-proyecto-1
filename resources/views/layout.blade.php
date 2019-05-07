
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <title>@yield('title') - IAW</title>

   <!--  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/"> -->

	

    <!-- Bootstrap core CSS -->
   <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	 <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
  <!-- Custom styles for this template -->
  @yield('stylesheets')


	
  </head>
  
  
  <body>
<div id="homepagebody">
		  <!-- Fixed navbar -->
		  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			
	
	  
			<a class="navbar-brand" href="{{ url('/') }}">FilMik</a>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			
			 <div class="collapse navbar-collapse" id="navbarCollapse">
					 <!-- Left Side Of Navbar -->
						  <ul class="navbar-nav mr-auto">
						    <li class="nav-item">
								<a class="nav-link" href="{{ url('/home') }}">Home </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ asset('/usuarios') }}" >Comunidad</a> 
						</li>
						  </ul>
				
						 <!--<form class="mt-2 mt-md-0"> 
						 <!-- Right Side Of Navbar -->
						 
							<ul class="navbar-nav navbar-right" >
								<!-- Authentication Links -->
									@guest
									<form method="POST" action="{{route('search-profile')}}" class="navbar-form" role="search">
											@csrf
											<div class="input-group">
											 <input class="form-control mr-sm-2" type="search"  name="nombre" placeholder="Buscar usuarios" aria-label="Search"required>
													<button class="btn icon-btn btn-info" type="submit">Buscar</button>
													
											</div>
										</form>
										
									  <li class="nav-item">
											<a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>                       
									</li>
									@if (Route::has('register'))  
										  <li class="nav-item">
											<a class="nav-link" href="{{ url('/usuarios/nuevo') }}">{{ __('Registrarse') }}</a> <span class="sr-only">(current)</span></a>                          
										</li>
										@endif
									@else
										<li class="nav-item">
										<form method="POST" action="{{route('search-profile')}}" class="navbar-form" role="search">
											@csrf
											<div class="input-group">
											 <input class="form-control mr-sm-2" type="search"  name="nombre" placeholder="Buscar usuarios" aria-label="Search"required>
													<button class="btn icon-btn btn-info" type="submit">Buscar</button>
													
											</div>
										</form>
										</li>
										<li class="nav-item">
											<a class="nav-link" href=""></a>
										</li>
									  <li class="nav-item">
										<a href="{{ asset('/listas/nuevo') }}"  class="btn icon-btn btn-success">+ Lista</a>
									</li>
									
									<li class="nav-item">
										<a class="nav-link" href="{{ route('users.show', ['user'=>Auth::id()]) }}">{{ __('Mi perfil') }}</a>
									</li>					
										<li class="nav-item dropdown">
											<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
												{{ Auth::user()->name }} <span class="caret"></span>
											</a>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
												<a class="dropdown-item"  href="{{ route('users.edit', ['user'=>Auth::id()]) }}">
													{{ __('Editar pefil') }}
												</a>														
												<a class="dropdown-item" href="{{ route('logout') }}"
												   onclick="event.preventDefault();
																 document.getElementById('logout-form').submit();">
													{{ __('Salir') }}
												</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
												</form>
											</div>
										</li>
									@endguest
									
									
										
							</ul>
						   <!--</form>-->
					  
					
</div>
				</nav>
		</div>
	
		<!-- Begin page content -->
		<main role="main" class="container">
			<div class="row mt-5">
				<div class="col-8">
					@yield('content')
				</div>        
			</div>
		</main>

		

	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	@yield('scripts')
	</body>
</html>
