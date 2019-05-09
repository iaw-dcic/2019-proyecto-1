@extends('layouts.app') 
@section('search-specific-style')
    <link rel="stylesheet" href="{{ URL::asset('/css/search-table-main.css') }}">
@stop


@section('title',' | Juegos') 
@section('content')
@include('sweetalert::alert')


<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg/3.webp')}}">
    <div class="page-info">
        <h2>Búsqueda</h2>
        <div class="site-breadcrumb">
            <a href="./">Inicio</a> /
            <span>Búsqueda</span>
        </div>
    </div>
</section>
<!-- Page top end-->

<div class="limiter">
	<div class="container-table100">
		<div class="wrap-table100">
            <h3 style="color:bisque; text-align:center">Resultados de la búsqueda </h3>
				<div class="table"><br>
					<div class="my-row header no-hover">
						<div class="cell">Nombre</div>
						<div class="cell">Usuario</div>
						<div class="cell">Listas</div>
						<div class="cell">Perfil</div>
					</div>
                    @foreach($users as $user)
                        <div class="my-row">
                            <div class="cell" data-title="Nombre">{{$user->name}}</div>
                            <div class="cell" data-title="Nombre usuario">{{$user->username}}</div>
                            <div class="cell" data-title="Listas de juegos"><a href="{{ route('user_listings', $user->id)}}" >Ver listas</a></div>
                            <div class="cell" data-title="Perfil"><a href="{{ route('user_profile', $user->name)}}" >Ver perfil</a></div>
                        </div>
                    @endforeach
				</div>
		</div>
	</div>
</div>

@endsection