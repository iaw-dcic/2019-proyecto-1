@extends('layouts.app')
@section('js_extra')
<script src="{{asset('js/list.js')}}"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card material-light">
                <div class="card-header material-dark">Edit list</div>

                <div class="card-body material-regular">

                  <form  action="{{route('list.update',['list'=>$data->id_lista])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">


                    <div class="form-group col-sm-4">
                      <label for="">Title</label>
                      <input type="text" name="title" value="{{$data->titulo}}" class="form-control">
                      @if ($errors->has('title'))
                        <div class="validation-failed">
                            {{ $errors->first('title') }}
                        </div>

                      @endif
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="">Tags</label>
                      <input type="text" name="tags" value="{{$data->tags}}" class="form-control">
                      @if ($errors->has('tags'))
                        <div class="validation-failed">
                            {{ $errors->first('tags') }}
                        </div>

                      @endif
                    </div>
                    <div class="form-group col-sm-4">
                      <label class="empty-label"></label>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="privacy_switch">
                        <label class="custom-control-label" for="privacy_switch">Public</label>
                        <input type="hidden" name="privacy" value="{{$data->publica}}" id="privacy">
                      </div>
                    </div>

                    <input type="hidden" name="id_lista" value="{{$data->id_lista}}">
                    <br>
                    <div class="col-sm-4">

                      <button type="submit" class="btn btn-secondary material-dark"><i class="far fa-save"></i> Save</button>
                    </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
      </div>
  </div>
@endsection
