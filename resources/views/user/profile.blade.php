@extends('main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-sm-10"><h1>Mi Perfil</h1></div>
            <div class="col-sm-2">
                <a href="/users" class="pull-right">
                    <img title="logo app"
                         class="img-circle logo text-center img-responsive"
                         src="{{ asset('images/logo.png') }}">
                </a>
            </div>
        </div>

        <hr class="half-rule"/>

        <div class="row">
            <div class="col-md-4">

                <div class="text-center">
                    @if($user->avatar_img != null)
                        @if($user->provider_id != null)
                            <img src="{{ $user->avatar_img }}" class="avatar img-circle img-thumbnail"
                                 alt="avatar">
                        @else
                            <img src="{{ asset('images/users/'.$user->avatar_img) }}" class="avatar img-circle img-thumbnail"
                                 alt="avatar">
                        @endif
                    @else
                        <img src="{{ asset('images/users/user-default.png') }}" class="avatar img-circle img-thumbnail"
                             alt="avatar">
                    @endif

                    <br>
                    <br>
                    @if($user->provider_id == null)

                        <div class="text-center">
                            <label class="input-group-btn">
                                <span class="btn btn-primary text-center">
                                    Cambiar foto de perfil <input id="inputFile" type="file" style="display: none;" multiple>
                                </span>
                            </label>
                        </div>

                    @endif

                </div>

                </hr>
                <br>
                <ul class="list-group p-4">
                    <li class="list-group-item text-center">Actividad</li>
                    <li class="list-group-item text-left"><span class="pull-left"><strong>Playslist</strong>
                        </span> : {{ count($playlists) }}
                    </li>
                    <li class="list-group-item text-left"><span class="pull-left"><strong>Canciones</strong>
                        </span> : {{ count($songs) }}
                    </li>
                </ul>

            </div><!--/col-3-->

            <div class="col-md-8">

                <div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="name"><h4>Nombre</h4></label>
                            <input type="text" class="form-control" name="name" id="name"
                                   value="{{$user->name}}" @if($user->provider_id!=null) {{ 'readonly' }} @endif>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="username"><h4>Username</h4></label>
                            <input type="text" class="form-control" name="username" id="username"
                                   value="{{$user->username}}" @if($user->provider_id!=null) {{ 'readonly' }} @endif>
                        </div>
                    </div>
                    @if($user->provider_id == null)

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="birthday"><h4>Fecha de Nacimiento</h4></label>
                                <input type="date" class="form-control" name="birthday" id="birthday"
                                       value="{{$user->birthday}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="gender"><h4>Sexo</h4></label>
                                <select class="form-control" id="inputGender" required >
                                    <option selected >{{$user->gender}}</option>
                                    @if($user->gender == 'Hombre')
                                        <option>Mujer</option>
                                        <option>No Definido</option>
                                    @endif
                                    @if($user->gender == 'Mujer')
                                        <option>Hombre</option>
                                        <option>No Definido</option>
                                    @endif
                                    @if($user->gender == 'No Definido')
                                        <option>Hombre</option>
                                        <option>Mujer</option>
                                    @endif


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="prefered_genre"><h4>Género Musical Preferido</h4></label>
                                <input type="text" class="form-control" name="prefered_genres" id="prefered_genres"
                                       value="{{$user->prefered_genre}}">
                            </div>
                        </div>

                    @endif

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="email"><h4>Correo Electronico</h4></label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}"
                            @if($user->provider_id!=null) {{ 'readonly' }} @endif>
                        </div>
                    </div>

                    @if($user->provider_id == null)
                        <div class="text-center">
                            <button onclick="update()" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    @endif
                </div>

                <hr>

                @if(count($playlists) > 0 )

                    <div class="col-xs-6 p-4">
                        <label for="recent-activity-title"><h4>Actividad Reciente</h4></label>
                    </div>

                    <div id="recent-activity">
                        <table class="table table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Escuchar en Spotify</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($playlists as $playlist)
                                <tr class="align-middle" >
                                    <td ><div class="text-center"><img src="{{asset('images/playlists/'.$playlist->image)}}"></div></td>
                                    <td class="align-middle" >{{$playlist->name}}</td>
                                    @if($playlist->spotify_url != null)
                                        <td class="align-middle text-center" ><a href="{{ url($playlist->spotify_url) }}" style="color: #000; text-decoration: none;" ><i class="fab fa-spotify fa-2x"></i></a></td>
                                    @else
                                        <td class="align-middle text-center" >No se encontro enlace</td>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

            </div><!--/col-9-->
            @endif
        </div><!--/row-->

        @endsection

        @section('scripts')
            <script src="{{ asset('js/file-utils.js') }}"></script>
            <script src="{{ asset('js/register.js') }}"></script>
@endsection
