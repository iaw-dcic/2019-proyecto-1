@extends('layouts.app') 
@section('title',' | Juegos') 
@section('content')


<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/1.jpg')}} ">
	<div class="page-info">
		<h2>{{strtoupper($data['game']->title)}}</h2>
		<div class="site-breadcrumb">
			<a href="/">Inicio</a> /
			<a href="{{ url('games') }}">Juegos</a> /
			<span>{{ucfirst($data['game']->title)}}</span>
		</div>
	</div>


</section>
<!-- Page top end-->


<section class="games-single-page">
	<div class="container">
		<div class="game-single-preview">
			<div class="row">
				<div class="col-xl-5 col-lg-5 col-md-5 game-single-content">
					<h2 class="gs-title">{{ucfirst($data['game']->title)}}</h2>

					<div class="col-lg-7 col-md-6">

						<div class="game-item">
						<a href="/games/{{$data['game']->id}}"> <img class="img-thumbnail img-fluid"
							src="{{asset('storage/cover_images/thumbnail').'/'.$data['game']->cover_image}}" alt="Cover"></a>
						</div>
					</div>
						 
				</div>

				<div class="col-xl-5 col-lg-5 col-md-5 game-single-content">
					<div id="stickySidebar">
						<div class="widget-item">
							<div class="rating-widget">
								<h4 class="widget-title">Información</h4>
								<ul>
									<li>Nombre<span style="color:white">{{ucfirst($data['game']->title)}}</span></li>
									<li>Consola preferida<span style="color:white">{{ucfirst($data['game']->console)}}</span></li>
									<li>Valoración<span style="color:white">{{ucfirst($data['game']->rating)}}</span></li>
									<li>Género<span style="color:white">{{ucfirst($data['game']->genre)}}</span></li>
									<li>Modo de juego<span style="color:white">{{ucfirst($data['game']->mode)}}</span></li>
									<li>Listas<span style="color:white">{{ucfirst($data['listings'])}}</span></li>
								</ul>

							</div>
						</div>

					</div>

				</div>


				@auth
					<div class="col-xl-2 col-lg-2 col-md-2 sidebar game-page-sideber">
						<a href="{{route('games.edit', ['game' => $data['game']->id])}}" class="site-btn">Editar juego</a>
						<br><br><br>

						<form class="read-more" action="{{ route('games.destroy', $data['game']->id) }}" method="post">
							{{ method_field('DELETE') }} @csrf
							<!-- {{ csrf_field() }} -->
							<button type="submit" class="site-btn">Eliminar juego</button>
						</form>
					</div>
				@endauth
			</div>
		</div>

	</div>
</section>




<!--<section class="game-author-section">
		<div class="container">
			<div class="game-author-pic set-bg" data-setbg="{{asset('/img/author.jpg')}}"></div>
			<div class="game-author-info">
				<h4>Written by: Michael Williams</h4>
				<p>Vivamus volutpat nibh ac sollicitudin imperdiet. Donec scelerisque lorem sodales odio ultricies, nec rhoncus ex lobortis. Vivamus tincid-unt sit amet sem id varius. Donec elementum aliquet tortor. Curabitur justo mi, efficitur sed eros alique.</p>
			</div>
		</div>
	</section>-->
@endsection