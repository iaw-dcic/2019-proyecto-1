@extends('layouts.app') 
@section('title',' | Perfil') 
@section('content')
    @include('sweetalert::alert')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg/4.jpg')}}">
    <div class="page-info">
        <h2>Perfil</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <span>{{$user->name}}</span>
        </div>
    </div>
</section>
<!-- Page top end-->
</section>
<!-- Page top end-->

<!-- Blog section -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7">

                <!-- Blog item -->
                <div class="blog-item">
                    <div class="blog-text text-box text-white">
                       
                        <div class="row">
                            <div class="col-xl-6 col-lg-5 col-md-4">
                                    <h3 style="color:bisque">Información del usuario</h3>

                                <div class="top-meta" style="color:wheat">Nombre: <span style="color: azure">{{$user->name}}</span></div>
                                <div class="top-meta" style="color:wheat">Nombre usuario: <span style="color: azure">{{$user->username}}</span></div>
                                <div class="top-meta" style="color:wheat">Listas:
                                    @if (count($userListings)>0) 
                                        @foreach($userListings as $listing) 

                                            @guest
                                                @if ($listing->visibility == 'Publica')
                                                    <a href="{{route('listings.show',$listing->id)}}" ><span style="color:deepskyblue">{{$listing->title}} / </span> </a> 
                                                @endif
                                            @endguest

                                            @auth
                                                <a href="{{route('listings.show',$listing->id)}}" > <span style="color: azure">{{$listing->title}} </span></a>
                                            @endauth

                                        @endforeach
                                    @else 
                                        @auth
                                            <span style="color: azure">Todavía no tenes ninguna lista</span>
                                        @endauth
                                        @guest
                                            El usuario todavía no creo ninguna lista
                                        @endguest
                                    @endif
                                  
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-7 col-md-8">
                                    <img src="{{asset('/img/avatars/').'/'.$user->avatar}}" style="width:150px; height:150px; border-radius:50%; margin-right:25px; margin-bottom:8px"
                                    alt="">

                                    @auth
                                    <form enctype="multipart/form-data" method="post" action="{{route('update_avatar', Auth::user()->name) }}}">
                                        @csrf
                                        <div class="input-group" style="width:50%">
                                            <label class="input-group-btn">
                                                        <span class="btn btn-info">
                                                            Cambiar&hellip; <input type="file" name="avatar" style="display: none;">
                                                        </span>
                                                    </label>
                                            <input type="text" class="form-control" readonly>
                                            <br><br>
                                        </div>
                                        <input class="btn btn-primary" type="submit" value="OK">
                                    </form>
            
                                    @endauth
                            </div>
                        </div>

                    </div>
                    <div class="blog-thumb">

                    </div>
                </div>


            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 sidebar">
                <div id="stickySidebar">

                    <div class="widget-item">
                        <div class="categories-widget">
                            <h4 class="widget-title">Secciones</h4>
                            <ul>
                                <li><a href="/">Inicio</a></li>
                                <li><a href="{{ route('listings.index')}}">Listas de juegos</a></li>
                                @auth
                                    <li><a href="{{ route('games.create')}}">Agregar juego</a></li>
                                    <li><a href="{{url('searchlisting')}}">Buscar listas</a></li>
                                @endauth
                                <li><a href="{{url('about')}}">Preguntas frecuentes</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog section end -->
@endsection