@extends('main')


@section('container-fluid')

    <div class="container-fluid p-4 row" id="playlist-header">
        <div class="container col-md-12 row">

            <div class="col-md-10 col-sm-12 text-left">
                <h1>{{$playlist->name}}</h1>
            </div>

            <div class="col-md-2 text-center">
                <select class="form-control" id="inputVisibilidad" oninput="onVisibilityChange({{$playlist->id}})" required >
                    <option selected>{{ $playlist->visibility }}</option>
                    @if($playlist->visibility == 'Publica')
                        <option>Privada</option>
                    @else
                        <option>Publica</option>
                    @endif
                </select>
            </div>

        </div>

        <div class="text-right col-md-12 p-2">
            <a href="{{ route('song.create', $playlist->id) }}" class="btn btn-lg btn-outline-secondary"><i class="fas fa-plus "></i> Agregar nuevas canciones</a>
        </div>

    </div>

    <hr class="half-rule"/>

    @if( count($songs) == 0 )
        <div class="container p-4 text-center" id="playlist-header">
            <div class="col-md-12">
                <h4>Esta playlist no tiene canciones hasta el momento...</h4>
            </div>
        </div>
    @endif

    @if( count($songs) > 0 )
        <div class="col-md-12">
            <table class="table table-dark table-responsive-lg">
                <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Artista</th>
                    <th>Album</th>
                    <th>Genero</th>
                    <th>Año</th>
                    <th class="text-center">Acciones</th>

                </tr>
                </thead>
                <tbody>

                @foreach ($songs as $song)
                    <tr class="align-middle" id="song-row-{{$song->id}}" >
                        <td ><div class="text-center"><img src="{{asset('images/songs/'.$song->image)}}"></div></td>
                        <td class="align-middle" >{{$song->name}}</td>
                        <td class="align-middle" >{{$song->artist}}</td>
                        <td class="align-middle" >{{$song->album}}</td>
                        <td class="align-middle" >{{$song->genre}}</td>
                        <td class="align-middle" >{{$song->year}}</td>
                        <th class="align-middle text-center" scope="col" >
                            <a href="{{ route('song.details', $song->id) }}" class="btn btn-secondary">Detalles
                            </a>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-eliminar-{{ $song->id }}">Eliminar
                            </button>
                        </th>
                    </tr>

                    <!-- Modal Eliminar Song -->
                    <div class="modal fade " id="modal-eliminar-{{ $song->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Aviso importante!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Esta seguro de eliminar la cancion ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" data-dismiss="modal" onclick="deleteSong({{ $song->id }})" class="btn btn-primary">Si</button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                </tbody>
            </table>
        </div>



    @endif



@endsection

@section('scripts')
    <script src="{{ asset('js/playlist.js') }}"></script>
    <script src="{{ asset('js/song.js') }}"></script>

@endsection










