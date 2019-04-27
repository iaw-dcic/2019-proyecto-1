
<!doctype html>

<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	 <link rel="icon" href="favicon.ico">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>@yield('title') - IAW</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
    <!-- Custom styles for this template -->
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  </head>
  
  
  <body class="d-flex flex-column h-100">
	<header>
		  <!-- Fixed navbar -->
		  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

			<a class="navbar-brand" href="#">FilMik</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			
				<div class="collapse navbar-collapse" id="navbarCollapse">
					 <!-- Left Side Of Navbar -->
						  <ul class="navbar-nav mr-auto">
								<a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
					  
								<li class="nav-item">
								  <a class="nav-link" href="{{ asset('/usuarios') }}" >Usuarios</a> <span class="sr-only">(current)</span></a>
								</li>
						  </ul>
						  
						 <!--<form class="mt-2 mt-md-0"> 
						 <!-- Right Side Of Navbar -->
						 
							<ul class="navbar-nav navbar-right" >
								<!-- Authentication Links -->
									@guest
											<a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>                       
										@if (Route::has('register'))  
											<a class="nav-link" href="{{ url('/usuarios/nuevo') }}">{{ __('Registrarse') }}</a> <span class="sr-only">(current)</span></a>                          
										@endif
									@else
									
										<a href="{{ asset('/listas/nuevo') }}"  class="btn icon-btn btn-success">+ Lista</a>

										<a class="nav-link" href="">{{ __('Mis listas') }}</a>
														
										<li class="nav-item dropdown">
											<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
												{{ Auth::user()->name }} <span class="caret"></span>
											</a>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
												<a class="dropdown-item"  href="">
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
		  
		  
	</header>


		  
				

		<!-- Begin page content -->
		<main role="main" class="container">
			<div class="row mt-5">
				<div class="col-8">
					@yield('content')
				</div>        
			</div>
		</main>

		<footer class="footer">
			<div class="container">
				<span class="text-muted">Micaela Melo</span>
			</div>
		</footer>



		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
 
	</body>
</html>
