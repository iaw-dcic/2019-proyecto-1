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
                    <form method="POST" action="{{ route('mylists.update') }}">
                        @csrf
                        <input type="hidden" name="list_id" value="{{$lista->id}}" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="text-white" for="listname">Nombre de la Lista</label>
                                <input type="text" class="form-control {{ $errors->has('listname') ? ' is-invalid' : '' }}" id="listname" name="listname" value="{{ $errors->has('listname') ? old('listname') : ($lista->listname) }}" required>
                                @if ($errors->has('listname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('listname') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="genero" class="text-white">{{ __('Genero') }}</label>
                                <input type="text" class="form-control" value="{{ $lista->genre }}" readonly disabled>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-row ml-4">
                                    <label class="text-white" for="visibility">Lista Pública</label>
                                </div>
                                <div class="form-row ml-4">
                                    <label class="switch ">
                                        <input type="checkbox" class="primary" id="visibility" name="visibility" {{ ($lista->visibility) ? 'checked' : ''}}>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-white" for="description">Descripcion (Opcional)</label>
                            <textarea class="form-control" rows="2" id="description" name="description{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ $errors->has('description') ? old('description') : ($lista->description) }}"></textarea>
                            @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="additemsdiv scrollbar-primary">
                            <div class="mr-2">
                                <div id="songscontainer">
                                    <div class="form-row {{ $errors->has('song0') ? ' is-danger' : '' }}">
                                        @foreach($items as $item)
                                        <div class="form-group col-md-4">
                                            <label class="text-white" for="songname">Nombre de Cancion</label>
                                            <input type="text" class="form-control" value="{{ $item->songname }}" readonly disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="text-white" for="artist">Artista</label>
                                            <input type="text" class="form-control" value="{{ $item->artist }}" readonly disabled>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="text-white" for="album">Album</label>
                                            <input type="text" class="form-control" value="{{ $item->album }}" readonly disabled>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="button" onclick="agregarCancion()">Agregar Cancion</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Actualizar Lista</button>
                        </div>
                    </form>
                    @if ($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
@endsection