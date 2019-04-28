@extends('layouts.app')

<head>
	<link rel="stylesheet" type="text/css" href="/css/profile.css">
</head>

<body>

	<ul id='left-panel'>
		<li><a href="/profile">Mi Perfil</a></li>
		<li><a href="/myLists">Mis Listas</a></li>
		<li><a class="active">Crear Lista</a></li>
		<li><a href="/settings">Configuración</a></li>
	</ul>


	@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Crear Lista</div>

					<div class="card-body">
						@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
						@endif

						<form method="POST" action="/myLists">
						@csrf
							<table>
								<tr>
									<th>Nombre de la nueva lista</th>
									<th> Pública </th>
									<th></th>
								</tr>

								<tr>
									<td> <input type='text' name='nameList'> </td>
									<td> <label class="switch">
											<input type="checkbox" name='public' checked value=1>
											<span class="slider round"></span>
										</label>
									</td>
									<td> <button class='btn-primary' type='submit'> Crear </button>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
</body>