@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Perfil</h1>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">

          <div class="form-group row">
            <h4>{{ auth()->user()->name }} </h4>
          </div>
          <div class="form-group row">
            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

            <div class="col-md-6">
              <input id="bio" type="text" class="form-control" name="bio">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection