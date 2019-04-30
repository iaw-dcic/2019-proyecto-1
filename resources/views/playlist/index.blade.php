@extends('main')

@section('container')

    <div class="album py-5 ">
        <div class="container">
            <div class="row">

                @foreach ($playlists as $playlist)
                    <div class="col-md-4" id="playlist-item-{{$playlist->id}}">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{asset('images/playlists/'.$playlist->image)}}" alt="playlist-cover" style="height: 225px; width: 100%; display: block;" data-holder-rendered="true">
                            <div class="card-body">
                                <p class="card-text text-center">{{$playlist->name}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('playlist.details', $playlist->id) }}" class="btn btn-sm btn-outline-secondary">Detalles</a>
                                        <a id="eliminarPlaylist{{$playlist->id}}" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#modal-eliminar-{{ $playlist->id }}">Eliminar</a>
                                    </div>
                                    <a href="" style="color: #000; text-decoration: none;" ><i class="fab fa-spotify fa-3x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Eliminar -->
                    <div class="modal fade " id="modal-eliminar-{{ $playlist->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Aviso importante!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Esta seguro de eliminar la playlist ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" data-dismiss="modal" onclick="deletePlaylist({{ $playlist->id }})" class="btn btn-primary">Si</button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{ asset('js/playlist.js') }}"></script>
@endsection



