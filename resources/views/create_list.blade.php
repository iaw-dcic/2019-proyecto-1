@extends('layouts.app')
@section('js_extra')
<script src="{{asset('js/create_list.js')}}"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card material-light">
                <div class="card-header material-dark">Add List</div>

                <div class="card-body material-regular">

                  <form  action="{{route('list.create')}}" method="post">
                    @csrf
                    @method('GET')
                    <input type="hidden" name="id_user" value="{{$id_user}}">
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
                      <label for="">Tags</label>
                      <input type="text" name="tags" value="" class="form-control">
                      @if ($errors->has('tags'))
                        <div class="validation-failed">
                            {{ $errors->first('tags') }}
                        </div>

                      @endif
                    </div>
                    <div class="form-group col-sm-4">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="privacy_switch">
                        <label class="custom-control-label" for="privacy_switch">Public</label>
                        <input type="hidden" name="privacy" value=0 id="privacy">
                      </div>
                    </div>
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
