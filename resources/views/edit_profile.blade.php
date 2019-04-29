@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card material-light">
                <div class="card-header material-dark">Edit Profile</div>

                <div class="card-body material-regular">

                  <form  action="{{route('profile.update',$perfil->id_user)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-sm-4">
                      <label for="">Age</label>
                      <input type="text" name="age" value="{{$perfil->edad}}" class="form-control">
                      @if ($errors->has('age'))
                        <div class="validation-failed">
                            {{ $errors->first('age') }}
                        </div>

                      @endif
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="">City</label>
                      <input type="text" name="city" value="{{$perfil->ciudad}}" class="form-control">
                      @if ($errors->has('city'))
                        <div class="validation-failed">
                            {{ $errors->first('city') }}
                        </div>

                      @endif
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
