@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card material-light">
                <div class="card-header material-dark">Remove list</div>

                <div class="card-body material-regular">

                  <form  action="{{route('list.destroy',['list'=>$data->id_lista])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="col">
                      <h4>Are you sure you want to remove the list?</h4>
                    </div>
                    <div class="col-sm-6">
                          <div class="card material-primary">
                            <div class="card-header material-dark">
                              {{$data->titulo}}
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col">
                                  <div class="">
                                    <label for="">Tags:</label>
                                    <span>{{$data->tags}}</span>
                                  </div>
                                  <div class="">
                                    <label for="">Privacy: </label>
                                    <span>@if($data->publica == 0) Private @else Public @endif</span>
                                  </div>
                                </div>
                              </div>
                              </div>

                          </div>
                    </div>

                    <input type="hidden" name="id_lista" value="{{$data->id_lista}}">
                    <br>
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-secondary material-dark"><i class="far fa-trash-alt"></i>Remove</button>
                    </div>
                  </form>

                </div>

            </div>
          </div>
      </div>
  </div>
@endsection
