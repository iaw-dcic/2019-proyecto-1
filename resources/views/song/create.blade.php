@extends('main')

@section('container')

<div>
    <h1>Crear nueva cancion</h1>
    <hr class="half-rule"/>
</div>

<div class="container p-5" id="input-playlist-container">
    <div class="row justify-content-md-center">
        <div class="col-md-4 form-group">
            <label for="inputNombre">Nombre de la cancion</label>
            <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" required >
        </div>

        <div class="col-md-4 form-group">
            <label for="inputGenero">Genero</label>
            <select class="form-control" id="inputGenero" required >
                <option selected >Rock</option>
                <option>Pop</option>
                <option>Indie</option>
                <option>Rap</option>
                <option>Country</option>
                <option>Soul</option>
                <option>Dance</option>
                <option>Folk</option>
                <option>Tango</option>
                <option>Blues</option>
                <option>Jazz</option>
                <option>Reggae</option>
            </select>
        </div>

        <div class="col-md-8 form-group">
            <label for="inputArtista">Artista</label>
            <input type="text" class="form-control" id="inputArtista" placeholder="Artista" required >
        </div>

        <div class="col-md-8 form-group">
            <label for="inputAlbum">Album</label>
            <input type="text" class="form-control" id="inputAlbum" placeholder="Album" required >
        </div>

        <div class="col-md-8 form-group">
            <label for="inputYear">Año</label>
            <input type="number" class="form-control" id="inputYear" placeholder="Año" required >
        </div>

        <div class="col-md-8 from-group">
            <label for="inputFile">Imagen del Album</label>
            <div class="input-group">
                <input type="text" class="form-control" >
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Seleccionar <input id="inputFile" type="file" style="display: none;" multiple>
                    </span>
                </label>
            </div>
        </div>

    </div>

    <div class="text-center p-5">
        <button onclick="storeSong({{ $playlist->id }})" class="btn btn-primary col-md-3">Guardar</button>
    </div>

</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/song.js') }}"></script>
    <script src="{{ asset('js/file-utils.js') }}"></script>
@endsection



