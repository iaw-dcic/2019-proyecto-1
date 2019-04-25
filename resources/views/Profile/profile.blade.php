@extends('layouts.app')

<head>
	<link rel="stylesheet" type="text/css" href="/css/profile.css">
</head>

<body>

	<ul id='left-panel'>
		<li><a class="active" href="/profile">Mi Perfil</a></li>
		<li><a href="/myLists">Mis Listas</a></li>
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

						<div style="padding:20px;margin-top:30px;height:1500px;">
							<h1>Goals</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection
</body>