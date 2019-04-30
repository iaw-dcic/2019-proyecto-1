@extends('layouts.app')

<head>
	<link rel="stylesheet" type="text/css" href="/css/profile.css">
	<link rel="shortcut icon" type="image/png" href="\images\logo 150.png" sizes="64x64">
</head>

<body>

	<ul id='left-panel'>
		<li><a href="/profile">Mi Perfil</a></li>
		<li><a href="/myLists">Mis Listas</a></li>
		<li><a href="/createList">Crear Lista</a></li>
		<li><a class="active">Configuración</a></li>
	</ul>


	@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<form method="POST" action="/settings">
							@method('PATCH')
							@csrf
							Cambiar nombre de usuario: <input type="text" name="name" id="editname" placeholder="  {{Auth::user()->name }}" autofocus>
							<button type="submit" id="btn-edit-name"> editar ✎ </button>


							<div class="card-body">
								@if (session('status'))
								<div class="alert alert-success" role="alert">
									{{ session('status') }}
								</div>
								@endif

								<table>
									<tr>
										<th></th>
										<th></th>
									</tr>
									<tr>
										<th id="botones-cambiar-editar"> <img src="{{ $user->avatar }}" alt="Avatar" class="avatar"> </th>
										<th> <textarea id="areaDescription" placeholder="Algo de ti..." name="description"> {{ $user->description }}</textarea></th>

									</tr>
									<tr>
										<th id="botones-cambiar-editar"><input type="file" id="btn-select-file" name="myAvatar" accept="image/png, image/jpeg, image/jpg"><p><button class="btn" style="margin:10">Cambiar</button></p></th>
										<th id="botones-cambiar-editar"><button class="btn">Editar</button></th>
									</tr>
								</table>
								@if ($errors->any())
								<p></p>
								<div class="alert  alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
										<li> {{$error}} </li>
										@endforeach
									</ul>
								</div>
								@endif
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
</body>