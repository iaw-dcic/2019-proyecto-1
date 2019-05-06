@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="/css/profile.css">
<link rel="shortcut icon" type="image/png" href="\images\logo 150.png" sizes="64x64">

<ul id='left-panel'>
	<li><a href="/profile">Mi Perfil</a></li>
	<li><a class="active">Mis Listas</a></li>
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

					<input type="button" value="Crear lista" class="btn-primary" id="btnCreate" 
					onClick="document.location.href='createList'" style="margin-bottom:15; font-size:25"/>

					<table>
						<tr>
							<th>Nombre</th>
							<th style="text-align:center">Privacidad</th>
							<th> </th>
							<th> </th>
						</tr>

						@foreach ($listas as $lista)

						<tr>
							<td> <a href='/myList/{{ $lista->id }}/show' id='listas'> {{ $lista->name }} </a> </td>
							@if($lista->public)
							<td style="text-align:center; color:#00ff40">✔</td>
							@else
							<td style="color:red; text-align:center"><b>ꭗ</b></td>
							@endif
							<td><a href='myList/{{ $lista->id }}/edit'> Editar</a></td>
							<td>
								<form method="POST" action="myList/{{ $lista->id }}">
									@method('DELETE')
									@csrf
									<button id='delete' type='submit'> Eliminar </button>
								</form>
							</td>
						</tr>
						@endforeach

					</table>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection