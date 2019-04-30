@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card material-light">
                <div class="card-header material-dark">Add Movie</div>

                <div class="card-body material-regular">

                  <form  action="{{route('movie.store',['list'=>$id_lista])}}" method="POST">
                    @csrf
                    @method('POST')


                    <div class="form-group col-sm-4">
                      <label for="">Title</label>
                      <input type="text" name="title" value="" class="form-control">
                      @if ($errors->has('title'))
                        <div class="validation-failed">
                            {{ $errors->first('title') }}
                        </div>

                      @endif
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="">Genre</label>
                      <input type="text" name="genre" value="" class="form-control">
                      @if ($errors->has('genre'))
                        <div class="validation-failed">
                            {{ $errors->first('genre') }}
                        </div>

                      @endif
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="">Rating</label>
                      <input type="number" min="0" max="10" name="rating" value="" class="form-control">
                      @if ($errors->has('rating'))
                        <div class="validation-failed">
                            {{ $errors->first('rating') }}
                        </div>
                      @endif
                    </div>

                    <hr>


                    <input type="hidden" name="id_lista" value="{{$id_lista}}">
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-secondary material-dark"><i class="far fa-save"></i> Save</button>
                    </div>
                  </form>


                </div>

            </div>
          </div>
      </div>
  </div>
@endsection
