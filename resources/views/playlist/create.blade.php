@extends('main')

@section('container')

    <div>
        @if($playlist)
            <h1>Editar Playlist</h1>
        @else
            <h1>Crear nueva Playlist</h1>
        @endif
        <hr class="half-rule"/>
    </div>

    <div class="container p-5" id="input-playlist-container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 form-group">
                <label for="inputNombre">Nombre de la lista</label>
                <input type="text" class="form-control" id="inputNombre" value="@if($playlist) {{$playlist->name }} @endif" placeholder="Nombre"  required >
            </div>
            <div class="col-md-4 form-group">
                <label for="inputVisibilidad">Visibilidad de la lista</label>
                <select class="form-control" id="inputVisibilidad" required >
                    @if($playlist)
                        <option selected >{{$playlist->visibility}}</option>
                        @if($playlist->visibility == 'Publica')
                            <option>Privada</option>
                        @else
                            <option>Privada</option>
                        @endif
                    @else
                    <option>Publica</option>
                    <option>Privada</option>
                    @endif
                </select>
            </div>
            <div class="col-md-8 form-group">
                <label for="inputSpotifyURL">Playlist Spotify URL </label>
                <input type="text" class="form-control" id="inputSpotifyURL" value="@if($playlist) {{$playlist->spotify_url }} @endif" placeholder="URL" required >
            </div>

            @if($playlist)
                <div class="col-md-6 text-center p-4" id="playlist-thumbnail">
                    <img src="{{ asset('images/playlists/'.$playlist->image) }}" class="img-circle img-thumbnail"
                         alt="playlist-cover">
                </div>
            @endif

            <div class="col-md-8 from-group">
                <label for="inputFile">Seleccione archivo de Imagen</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Caratula de playlist" >
                    <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Seleccionar <input id="inputFile" type="file" style="display: none;" multiple>
                    </span>
                    </label>
                </div>
            </div>

        </div>

        <?php $playlistId = -1;?>

        @if($playlist)
            <?php $playlistId = $playlist->id;?>
        @endif

        <div class="text-center p-5">
            <button onclick="storePlaylist(<?php echo $playlistId ?>)" class="btn btn-primary col-md-3">Guardar</button>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/playlist.js?1500') }}"></script>
    <script src="{{ asset('js/file-utils.js') }}"></script>
@endsection



