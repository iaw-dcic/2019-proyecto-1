@extends('layouts.app')
@section('title', "| $listing->title" )
@section('content')
@include('sweetalert::alert')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{ asset('img/page-top-bg/3.webp') }}">
    <div class="page-info">
        <h2>{{$listing->title}}</h2>
        <div class="site-breadcrumb">
            <a href="./">Inicio</a> / <a href="./">Listas</a> /
            <span>{{$listing->title}}</span>
        </div>
    </div>
</section>
<!-- Page top end-->

<!-- Games section -->
<section class="games-section">
    <div class="container" style="margin-bottom:100px">

        <!-- If the list has games -->
        @if($listing->games()->count() > 0)

        <div class="row">
            <div class="col-xl-7 col-lg-8 col-md-7">
                <div class="row">
                    <!--For each game in the list -->
                    @foreach($listing->games as $game)
                    <div class="col-lg-4 col-md-6">
                        <div class="game-item">
                            <!-- Cover -->
                            <a href="/games/{{$game->id}}"><img class="img-thumbnail img-fluid"
                                    src="{{asset("/img/covers/$game->cover_image")}}" alt="Cover image"></a>

                            <!--Title -->
                            <div class="game-title">
                                <h5><a href="/games/{{$game->id}}" style="color: white">{{$game->title}}</a></h5>
                            </div>

                            <!-- Info -->
                            <div class="game-info">
                                <a href="{{route('games.show', $game->id)}}" class="read-more" style="color:wheat">info
                                    del juego
                                    <img src="{{asset('img/icons/double-arrow.png')}}" />
                                </a>
                            </div>
                            <br />                         
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Add another game, edit list, delete list -->
            @if($listing->user_id == Auth::user()->id)
                <div class="col-xl-5 col-lg-4 col-md-5 sidebar game-page-sideber">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 sidebar game-page-sideber">
                            <!-- Add list -->
                            <a href="{{route('games.create')}}" class="site-btn">Agregar otro juego a la lista</a><br><br><br>
                            <!--Edit list -->
                            <a href="{{ route('listings.edit', $listing->id)}}" class="site-btn">Editar lista</a><br /><br /><br />
                            <!-- Delete list -->
                            <form class="read-more" action="{{ route('listings.destroy', array('id' => $listing->id )) }}" method="post">
                                {{ method_field("DELETE") }} @csrf
                                {{ csrf_field() }}
                                <button type="submit" id="deleteButton" class="site-btn">Eliminar lista</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @else  <!--The list doesnt have any game -->
            @if($listing->user_id == Auth::user()->id)
                <!-- Add new game -->
                <div class="row" style="margin-bottom:80px">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="text-white">
                            <h3>Todavía no tenes juegos en tu lista!</h3>
                            <br /><br />
                        </div>
                        <a href="{{ route('games.create') }}" class="site-btn">Agregar nuevo juego<img
                                src="{{ asset('img/icons/double-arrow.png') }}" alt="#" /></a>
                    </div>
                </div>
            @endif
            @guest
                <div class="text-white"><h3>Esta lista todavía no tiene juegos!</h3></div>
            @endguest
        @endif
    </div>
</section>

<!-- Games end-->
@endsection