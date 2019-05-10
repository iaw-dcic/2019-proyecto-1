@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Cancion</div>

                <div class="card-body">
                    <form  method="POST" action="{{ route('updateSong') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$song->id}}">                       
                        <div class="element-wrapper">
                            <div class="clone">


                            <div class="form-group row">
                                <label for="song" class="col-md-4 col-form-label text-md-right">cancion</label>
                                <div class="col-md-6">
                                    <input class="form-control cloneName" id="song" value="{{$song->song_name}}"  name="song" required>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="song" class="col-md-4 col-form-label text-md-right">Link</label>
                                <div class="col-md-6">
                                    <input class="form-control cloneLink" id="link" value="{{$song->link}}"  name="link" required>
                                </div>
                            </div>


                        </div>

                    </div>
                    




        
                        <br>
                        <br>

                        <button type="submit" class="btn btn-primary">
                                    Guardar Cambios
                                </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection