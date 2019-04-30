@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card material-light">
                <div class="card-header material-dark">{{$lista->titulo}}</div>

                <div class="card-body material-regular">
                  <div class="row justify-content-between">
                    <div class="col">
                        <label for="">Tags:</label>
                        <span>{{$lista->tags}}</span>
                    </div>
                      <div class="col">
                        <label for="">Privacy: </label>
                        <span>@if($lista->publica == 0) Private @else Public @endif</span>
                      </div>
                      <div class="col-sm-2">
                        <form class="" action="{{url('add_movie')}}" method="post">
                          @csrf
                          <input type="hidden" name="id_lista" value="{{$lista->id_lista}}">
                          <button type="submit"  title="Add movie" class="btn btn-secondary material-dark"><i class="far fa-plus-square"></i></button>
                        </form>
                      </div>
                  </div>
                  <hr>
                  <div class="row justify-content-between">
                  @foreach($peliculas as $pelicula)
                  <div class="col-sm-6">
                    <div class="card material-primary">
                      <div class="card-header material-dark">
                        {{$pelicula->titulo}}
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <div class="">
                              <label for="">Genre:</label>
                              <span>{{$pelicula->genero}}</span>
                            </div>
                            <div class="">
                              <label for="">Rating: </label>
                              <span>{{$pelicula->rating}}</span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="">
                              <label for="">Review:</label>
                              {{$pelicula->review}}
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-2">
                            <form class="" action="#" method="post">
                              @csrf
                              <input type="hidden" name="id_pelicula" value="{{$pelicula->id_pelicula}}">
                              <button type="submit"  title="Edit movie" class="btn btn-secondary material-dark"><i class="far fa-edit"></i></button>
                            </form>
                          </div>
                            <div class="col-sm-2">
                              <form class="" action="#" method="post">
                                @csrf
                                <input type="hidden" name="id_pelicula" value="{{$pelicula->id_pelicula}}">
                                <button type="submit"  title="Remove movie" class="btn btn-secondary material-dark"><i class="far fa-trash-alt"></i></button>
                              </form>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  </div>

                </div>

            </div>
          </div>
      </div>
  </div>

@endsection
