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
								<td> <input type='text' name='name' placeholder="Nombre de nueva lista..." required> </td>
								<td> <label class="switch">
										<input type="checkbox" name='public' checked value=1>
										<span class="slider round"></span>
									</label>
								</td>
								<td> <button class='btn-primary' type='submit'> Crear </button>
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
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection