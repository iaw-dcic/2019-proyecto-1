@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="/css/profile.css">
<link rel="shortcut icon" type="image/png" href="\images\logo 150.png" sizes="64x64">

<ul id='left-panel'>
	<li></li>
	<li><a href="/">
			<< Regresar </a> </li> <li>
	</li>
</ul>

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h1>{{$user->name }}</h1>
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
								@if(substr_compare($user->avatar,'https://',0,8 )==0)
								<th> <img src="{{ $user->avatar }}" alt="Avatar" class="avatar"> </th>
								@else
								<th> <img src="/images/Users/{{ $user->avatar }}" alt="Avatar" class="avatar"> </th>
								@endif
								@if($user->description != null)
								<th> <textarea readonly disabled>{{ $user->description }}</textarea></th>
								@else
								<th> <textarea style="color: rgba(255, 255, 255, 0.5); font-style: italic;" readonly disabled> Sin descripción... </textarea></th>
								@endif
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection