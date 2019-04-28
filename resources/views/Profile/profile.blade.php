@extends('layouts.app')

<head>
	<link rel="stylesheet" type="text/css" href="/css/profile.css">
</head>

<body>

	<ul id='left-panel'>
		<li><a class="active">Mi Perfil</a></li>
		<li><a href="/myLists">Mis Listas</a></li>
		<li><a href="/createList">Crear Lista</a></li>
		<li><a href="/settings">Configuración</a></li>
	</ul>


	@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ Auth::user()->name }}</div>

					<div class="card-body">
						@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
						@endif

					
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection
</body>