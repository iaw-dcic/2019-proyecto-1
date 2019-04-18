@extends('layouts.app') 
@section('title',' | Juegos') 
@section('content')


<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/1.jpg')}} ">
	<div class="page-info">
		<h2>{{strtoupper($game->title)}}</h2>
		<div class="site-breadcrumb">
			<a href="/">Inicio</a> /
			<a href="{{ url('games') }}">Juegos</a> /
			<span>{{ucfirst($game->title)}}</span>
		</div>
	</div>


</section>
<!-- Page top end-->


<!-- Games section -->
<section class="games-single-page">
	<div class="container">
		<!--<a href="/games" class="site-btn-back">Volver a mis juegos <img src="{{asset('img/icons/double-arrow.png')}}"></a> -->
		<div class="game-single-preview">
			<img src="{{asset('img/games/big.jpg')}}">
		</div>
		<div class="row">
			<div class="col-xl-9 col-lg-8 col-md-7 game-single-content">
				<!--<div class="gs-meta">11.11.18  /  in <a href="">Games</a></div>-->
				<h2 class="gs-title">{{ucfirst($game->title)}}</h2>
				<h3 class="gs-title">{{ucfirst($game->rating)}}</h3>
				<h4 class="gs-title">{{ucfirst($game->platform)}}</h4>
				<!--<h4>Gameplay</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquamet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vestibulum posuere porttitor justo id pellentesque. Proin id lacus feugiat, posuere erat sit amet, commodo ipsum. Donec pellentesque vestibulum metus.</p>
					<h4>Conclusion</h4>
					<p>Nulla ut maximus mauris. Sed malesuada at sapien sed euismod. Vestibulum pharetra in sem id laoreet. Cras metus ex, placerat nec justo quis, luctus posuere ex. Vivamus volutpat nibh ac sollicitudin imperdiet. Donec scelerisque lorem sodales odio ultricies, nec rhoncus ex lobortis. Vivamus tincidunt sit amet sem id varius. Donec ele-mentum aliquet tortor. Curabitur justo mi, efficitur sed eros aliquet, dictum molestie eros. Nullam scelerisque convallis gravida. Morbi id lorem accumsan, scelerisque enim laoreet, sollicitudin neque. Vivamus volutpat nibh ac sollicitudin imperdiet. Donec scelerisque lorem sodales odio ultricies, nec rhoncus ex lobortis. Vivamus tincidunt sit amet sem id varius. Donec ele-mentum aliquet tortor. Curabitur justo mi, efficitur sed eros aliqueDonec vitae tellus sodales, congue augue at, biben-dum justo. Pellentesque non dolor et magna volutpat pharetra eget vel ligula. Maecenas facilisis vestibulum mattis. Sed sagittis gravida urna. Cras nec mi risus.
					</p>
					<div class="geme-social-share pt-5 d-flex">
						<p>Share:</p>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-5 sidebar game-page-sideber">
					<div id="stickySidebar">
						<div class="widget-item">
							<div class="rating-widget">
								<h4 class="widget-title">Ratings</h4>
								<ul>
									<li>Price<span>3.5/5</span></li>
									<li>Graphics<span>4.5/5</span></li>
									<li>Levels<span>3.5/5</span></li>
									<li>Levels<span>4.5/5</span></li>
									<li>Dificulty<span>4.5/5</span></li>
								</ul>
								<div class="rating">
									<h5><i>Rating</i><span>4.5</span> / 5</h5>
								</div>
							</div>
						</div>
						<div class="widget-item">
							<div class="testimonials-widget">
								<h4 class="widget-title">Testimonials</h4>
								<div class="testim-text">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolo re magna aliqua. Quis ipsum suspend isse ultrices.</p>
									<h6><span>James Smith,</span>Gamer</h6>
								</div>
							</div>
						</div>
					</div> -->
				@if(Auth::user()->id == $game->user_id)
					<div class="justify-content-center text-left">
						<div class="container">
							<a href="{{route('games.edit', ['game' => $game->id])}}" class="site-btn">Editar juego<img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
						</div>
					</div>

					<div class="justify-content-center text-right">
						<div class="container">
							<form action="{{ route('games.destroy', $game->id) }}" method="post">
								{{ method_field('DELETE') }} @csrf
								<!-- {{ csrf_field() }} -->
								<input type="submit" value="Eliminar juego">
							</form>
						</div>
					</div>
				@endif



			</div>
		</div>
	</div>
</section>
<!-- Games end-->





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