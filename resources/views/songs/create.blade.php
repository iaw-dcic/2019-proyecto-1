@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agregar Canciones</div>

                <div class="card-body">
                    <form  method="POST" action="{{ route('addSongs') }}">
                        @csrf
                        <input type="hidden" id="var" name="varId" value="0">
                        <input type="hidden" id="album" name="albumId" value="{{$id}}">


                        <div class="element-wrapper">
                            <div class="clone">


                            <div class="form-group row">
                                <label for="song" class="col-md-4 col-form-label text-md-right">cancion</label>
                                <div class="col-md-6">
                                    <input class="form-control cloneName" id="song"  name="song" required>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="song" class="col-md-4 col-form-label text-md-right">Link</label>
                                <div class="col-md-6">
                                    <input class="form-control cloneLink" id="link"  name="link" required>
                                </div>
                            </div>


                        </div>

                    </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                             
                                <button type="button"  class="btn btn-primary addSong">
                                    Agregar Cancion
                                </button>
                                <button type="button"  class="btn btn-primary removeSong">
                                    Eliminar Cancion
                                </button>


                            </div>
                        </div>
                        <br>
                        <br>

                        <button type="submit" class="btn btn-primary">
                                    Agregar Album 
                                </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/addSong.js')}}" ></script>



@endsection