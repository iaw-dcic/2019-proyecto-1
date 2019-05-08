@extends('layouts.app')
@section('title',' | Perfil')
@section('content')
@include('sweetalert::alert')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg/4.webp')}}">
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
<section class="blog-section spad" style="padding-bottom:150px">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7">

                <!-- Blog item -->
                <div class="blog-item">
                    <div class="blog-text text-box text-white">

                        <div class="row">
                            <div class="col-xl-6 col-lg-5 col-md-4">
                                <h3 style="color:bisque">Información del usuario</h3>

                                <!-- Name -->
                                <div class="top-meta" style="color:wheat">Nombre: <span
                                        style="color: azure">{{$user->name}}</span></div>

                                <!-- Username -->
                                <div class="top-meta" style="color:wheat">Nombre usuario: <span
                                        style="color: azure">{{$user->username}}</span></div>
                                @auth
                                <!-- Email -->
                                <div class="top-meta" style="color:wheat">Email registrado: <span
                                        style="color: azure">{{$user->email}}</span></div>
                                @endauth

                                <!--Favourite game -->
                                <div class="top-meta" style="color:wheat">Juego favorito: <span style="color: azure">{{$user->favourite_game}}</span>
                                    @auth
                                        @if($user->id == Auth::user()->id)
                                            <button class="btn btn-sm btn-info" data-toggle="modal"
                                                data-favgame="{{$user->favourite_game}}" data-target="#favGameModal"
                                                style="margin-left: 10px">Cambiar 
                                            </button>
                                        @endif
                                    @endauth
                                </div>

                                <!-- Modal edit favourite game -->
                                <div class="modal fade" id="favGameModal" tabindex="-1" role="dialog"
                                    aria-labelledby="favGameModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <!--Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <!--Modal title -->
                                                <h5 class="modal-title" style="color:black"
                                                    id="favGameModalTitle">Juego favorito</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="color:black">
                                                <form action="{{route('update_profile')}}" method="post">                                    
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="favourite-game" class="col-form-label">¿Cuál es tu juego favorito?</label>
                                                            <input type="text" class="form-control" name="favourite_game" id="favourite_game">
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Favourite console -->
                                <div class="top-meta" style="color:wheat">Consola favorita: <span style="color: azure">{{$user->favourite_console}}</span>
                                    @auth
                                        @if($user->id == Auth::user()->id)
                                            <button class="btn btn-sm btn-info" data-toggle="modal"
                                                data-favconsole="{{$user->favourite_console}}" data-target="#favConsoleModal"
                                                style="margin-left: 10px">Cambiar 
                                            </button>
                                        @endif
                                    @endauth
                                </div>

                                 <!-- Modal edit favourite console -->
                                 <div class="modal fade" id="favConsoleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="favConsoleModalTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                     <!--Modal content-->
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <!--Modal title -->
                                             <h5 class="modal-title" style="color:black"
                                                 id="favConsoleModalTitle">Consola favorita</h5>
                                             <button type="button" class="close" data-dismiss="modal"
                                                 aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                             </button>
                                         </div>
                                         <!-- Modal body -->
                                         <div class="modal-body" style="color:black">
                                             <form action="{{route('update_profile')}}" method="post">                                    
                                                     @csrf
                                                     <div class="form-group">
                                                         <label for="favourite-console" class="col-form-label">¿Cuál es tu consola favorita?</label>
                                                         <input type="text" class="form-control" name="favourite_console" id="favourite_console">
                                                     </div>
                                                     <!-- Modal footer -->
                                                     <div class="modal-footer">
                                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                         <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                     </div>
                                             </form>
                                         </div>
                                     </div>

                                 </div>
                             </div>

        
                                <!-- Listings -->
                                <div class="top-meta" style="color:wheat">Listas:
                                    @if (count($userListings)>0)
                                        @foreach($userListings as $listing)

                                            @guest
                                                @if ($listing->visibility == 'Publica')
                                                    <a href="{{route('listings.show',$listing->id)}}"><span style="color:deepskyblue">{{$listing->title}} / </span></a>
                                                @endif
                                            @endguest

                                            @auth
                                                <a href="{{route('listings.show',$listing->id)}}"> <span style="color:deepskyblue">{{$listing->title}} / </span></a>
                                            @endauth

                                        @endforeach
                                    @else
                                        @auth
                                            <span style="color: azure">Todavía no tenes ninguna lista</span>
                                        @endauth
                                        @guest
                                            El usuario todavía no creó ninguna lista
                                        @endguest
                                    @endif

                                </div>
                            </div>

                            <!-- Avatar -->
                            <div class="col-xl-6 col-lg-7 col-md-8">
                                <img src="{{asset('/img/avatars/').'/'.$user->avatar}}"
                                    style="width:150px; height:150px; border-radius:50%; margin-right:25px; margin-bottom:8px"
                                    alt="Avatar">

                                @auth
                                    @if($user->id == Auth::user()->id)
                                        <form enctype="multipart/form-data" method="post"
                                            action="{{route('update_profile')}}">
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
                                    @endif
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