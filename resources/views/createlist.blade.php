@extends('layouts.app')

@section('headcontent')
    <script src="{{ asset('/js/crearlista.js') }}"></script>
@endsection

@section('sectioncontent')
<section id="hero">
    <div class="hero-container">

        <div class="col-md-8">
            <div>
                <div class="card-body">
                    <form method="POST" action="{{ route('create-list') }}">
                    @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="text-white" for="listname">Nombre de la Lista</label>
                                <input type="text" class="form-control" id="listname" name="listname" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="genero" class="text-white">{{ __('Genero') }}</label>
                                <select class="form-control" name="genre">
                                    @foreach($generos as $genero)
                                    <option>{{$genero->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-row ml-4">
                                    <label class="text-white" for="visibility">Lista Pública</label>
                                </div>
                                <div class="form-row ml-4">
                                    <label class="switch ">
                                        <input type="checkbox" class="primary" id="visibility" name="visibility">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-white" for="description">Descripcion (Opcional)</label>
                            <textarea class="form-control" rows="2" id="description" name="description"></textarea>
                        </div>

                        <div class="additemsdiv scrollbar-primary">
                            <div class="mr-2">
                                <div id="songscontainer">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="text-white" for="songname">Nombre de Cancion</label>
                                            <input type="text" class="form-control" id="songname" name="songnames[]" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="text-white" for="artist">Artista</label>
                                            <input type="text" class="form-control" id="artist" name="artists[]"required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="text-white" for="album">Album</label>
                                            <input type="text" class="form-control" id="album" name="albums[]" required>
                                        </div>
                                    </div>

                                    <div id="divsong1">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="text-white" for="songname">Nombre de Cancion</label>
                                                <input type="text" class="form-control" id="songname" name="songnames[]" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="text-white" for="artist">Artista</label>
                                                <input type="text" class="form-control" id="artist" name="artists[]" required>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="text-white" for="album">Album</label>
                                                <input type="text" class="form-control" id="album" name="albums[]" required>
                                            </div>

                                            <div class="form-group col-md-2 align-self-end">
                                                <button class="btn btn-danger" type="button" id="song1" onclick="quitarCancion(this.id)">Quitar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="button" onclick="agregarCancion()">Agregar Cancion</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Crear Lista</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection