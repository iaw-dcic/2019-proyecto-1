@extends('layouts.app')

<head>
	<link rel="stylesheet" type="text/css" href="/css/profile.css">
</head>

<body>

	<ul id='left-panel'>
		<li><a href="/profile">Mi Perfil</a></li>
		<li><a class="active" href="/myLists">Mis Listas</a></li>
		<li><a href="/settings">Configuración</a></li>
	</ul>


	@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Mis listas</div>

					<div class="card-body">
						@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
						@endif

						<div style="padding:20px;margin-top:30px;height:1500px;">
							<h1>Mis Listas</h1>

							<table>
								<tr>
									<th>Nombre</th>
								</tr>
								
								@foreach ($listas as $lista)
								
								<tr>
									<td>{{ $lista->name }}</td>
								</tr>
								@endforeach

							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection
</body>