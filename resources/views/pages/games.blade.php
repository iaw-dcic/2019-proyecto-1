@extends('layouts.app') 
@section('title',' | Juegos') 
@section('content')
	@include('sweetalert::alert')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg/3.jpg')}}">
	<div class="page-info">
		<h2>Juegos</h2>
		<div class="site-breadcrumb">
			<a href="./">Inicio</a> /
			<span>Juegos</span>
		</div>
	</div>
</section>
<!-- Page top end-->

<!--<section class="games-section">
	<h1> Juegos </h1>
	@if(count($games) > 0)
	@foreach($games as $game)
	<div class="well">
		<h3><a href="/games/{{$game->id}}">{{$game->title}}</h3>
	</div>
	@endforeach 
	@else
	<p> No se encontraron juegos </p>
	@endif
</section> -->

<!-- Games section -->
<section class="games-section">
	<div class="container">

		@if(count($games)>0)
			<ul class="game-filter">
				<li><a href="">A</a></li>
				<li><a href="">B</a></li>
				<li><a href="">C</a></li>
				<li><a href="">D</a></li>
				<li><a href="">E</a></li>
				<li><a href="">F</a></li>
				<li><a href="">G</a></li>
				<li><a href="">H</a></li>
				<li><a href="">I</a></li>
				<li><a href="">J</a></li>
				<li><a href="">K</a></li>
				<li><a href="">L</a></li>
				<li><a href="">M</a></li>
				<li><a href="">N</a></li>
				<li><a href="">O</a></li>
				<li><a href="">P</a></li>
				<li><a href="">Q</a></li>
				<li><a href="">R</a></li>
				<li><a href="">S</a></li>
				<li><a href="">T</a></li>
				<li><a href="">U</a></li>
				<li><a href="">V</a></li>
				<li><a href="">W</a></li>
				<li><a href="">X</a></li>
				<li><a href="">Y</a></li>
				<li><a href="">Z</a></li>
			</ul>
			<div class="row">


				<table class="table table-stripped">
					@foreach($games as $game)
					<tr>
						<td>
							<div class="well">
								<h3><a href="/games/{{$game->id}}">{{$game->title}}</h3>

							</div>
						</td>							
						<td>
							<a href="{{route('games.edit', ['game' => $game->id])}}" class="site-btn">Editar juego</a>
						</td>
						<td>
							<div class="justify-content-center text-right">
								<div class="container">
									<form class="site-btn" action="{{ route('games.destroy', $game->id) }}" method="post">
										{{ method_field('DELETE') }} @csrf
										<!-- {{ csrf_field() }} -->
										<input type="submit" value="Eliminar juego">
									</form>
								</div>

							</div>
						</td>
					</tr>
					@endforeach
				</table>

				<!--  -->
				<div class="col-xl-7 col-lg-8 col-md-7">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="game-item">
								<img src="img/games/1.jpg" alt="#">
								<h5>Zombie Appocalipse 2</h5>
								<a href="game-single.html" class="read-more">Read More   <img src="{{asset('img/icons/double-arrow.png')}}"></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="game-item">
								<img src="img/games/2.jpg" alt="#">
								<h5>Dooms Day</h5>
								<a href="game-single.html" class="read-more">Read More <img src="{{asset('img/icons/double-arrow.png')}}"> </a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="game-item">
								<img src="img/games/3.jpg" alt="#">
								<h5>The Huricane</h5>
								<a href="game-single.html" class="read-more">Read More  <img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="game-item">
								<img src="img/games/4.jpg" alt="#">
								<h5>Star Wars</h5>
								<a href="game-single.html" class="read-more">Read More  <img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="game-item">
								<img src="img/games/5.jpg" alt="#">
								<h5>Candy land</h5>
								<a href="game-single.html" class="read-more">Read More  <img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="game-item">
								<img src="img/games/6.jpg" alt="#">
								<h5>E.T.</h5>
								<a href="game-single.html" class="read-more">Read More  <img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="game-item">
								<img src="img/games/7.jpg" alt="#">
								<h5>Zombie Appocalipse 2</h5>
								<a href="game-single.html" class="read-more">Read More  <img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="game-item">
								<img src="img/games/8.jpg" alt="#">
								<h5>Dooms Day</h5>
								<a href="game-single.html" class="read-more">Read More  <img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="game-item">
								<img src="img/games/9.jpg" alt="#">
								<h5>The Huricane</h5>
								<a href="game-single.html" class="read-more">Read More  <img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
							</div>
						</div>
					</div>
					<div class="site-pagination">
						<a href="#" class="active">01.</a>
						<a href="#">02.</a>
						<a href="#">03.</a>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-5 sidebar game-page-sideber">
					<div id="stickySidebar">
						<div class="widget-item">
							<div class="categories-widget">
								<h4 class="widget-title">categories</h4>
								<ul>
									<li><a href="">Games</a></li>
									<li><a href="">Gaming Tips & Tricks</a></li>
									<li><a href="">Online Games</a></li>
									<li><a href="">Team Games</a></li>
									<li><a href="">Community</a></li>
									<li><a href="">Uncategorized</a></li>
								</ul>
							</div>
						</div>
						<div class="widget-item">
							<div class="categories-widget">
								<h4 class="widget-title">platform</h4>
								<ul>
									<li><a href="">Xbox</a></li>
									<li><a href="">X box 360</a></li>
									<li><a href="">Play Station</a></li>
									<li><a href="">Play Station VR</a></li>
									<li><a href="">Nintendo Wii</a></li>
									<li><a href="">Nintendo Wii U</a></li>
								</ul>
							</div>
						</div>
						<div class="widget-item">
							<div class="categories-widget">
								<h4 class="widget-title">Genre</h4>
								<ul>
									<li><a href="">Online</a></li>
									<li><a href="">Adventure</a></li>
									<li><a href="">S.F.</a></li>
									<li><a href="">Strategy</a></li>
									<li><a href="">Racing</a></li>
									<li><a href="">Shooter</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				</div>
		</div>

		@else

		<div class="row">
			<div class="col-md-12">
				<div class="text-white">
					<h3>Todavía no tenes juegos en tu lista!</h3>
					<br><br>
				</div>
			</div>
			<div class="col-md-12">
				<a href="{{route('games.create') }}" class="site-btn">Agregar nuevo juego<img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
			</div>
		</div>



		@endif


</section>
<!-- Games end-->
@endsection