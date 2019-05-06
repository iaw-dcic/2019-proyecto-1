@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="/css/profile.css">
<link rel="shortcut icon" type="image/png" href="\images\logo 150.png" sizes="64x64">

<ul id='left-panel'>
	<li><a href="/profile">Mi Perfil</a></li>
	<li><a href="/myLists">Mis Listas</a></li>
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
						Cambiar nombre de usuario: <input type="text" name="name" id="editname" placeholder=" {{Auth::user()->name }}" autofocus>
						<button type="submit" id="btn-edit-name"> editar ✎ </button>

						<p></p>

						<div>
							<textarea id="areaDescription" placeholder="Algo de ti..." name="description"> {{ $user->description }}</textarea>
							<p id="botones-cambiar-editar"><button type="submit" class="btn">Editar</button></p>
						</div>
					</form>

					<div class="card-body">
						@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
						@endif

						<div>
							@if(substr_compare($user->avatar,'https://',0,8 )==0)
							<img src="{{ $user->avatar }}" alt="Avatar" class="avatar"> </th>
							@else
							<img src="/images/Users/{{ $user->avatar }}" alt="Avatar" class="avatar"> </th>
							@endif
							<form enctype="multipart/form-data" action="/settings" method="POST">
								@method('POST')
								@csrf
								<p><input type="file" id="btn-select-file" name="myAvatar" accept="image/png, image/jpeg, image/jpg"></p>
								<p><button type="submit" class="btn" style="margin:10">Cambiar</button></p>
							</form>
						</div>

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
				</div>
			</div>
		</div>
	</div>
</div>
@endsection