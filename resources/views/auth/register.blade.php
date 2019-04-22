@extends('layouts.app')

@section('content')
<div class="container div-center">
    <div class="row">
      <div class="col-sm-8 col-md-6 mx-auto">
        <div class="background-color card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign up</h5>
            <form enctype="multipart/form-data" autocomplete="off" method="POST" action="{{ route('register') }}" class="form-signup">
              @csrf

              <div id='avatar-content' class="col">
                <img id='avatarImage' src="{{ asset('images/default.png') }}" alt="avatar" width="100" height="100">
                <input id='fileAvatar' name='avatar' type="file" accept="image/*">
              </div>

              <div class="form-row">
                <div class="col-md-7">
                  <div class="form-label-group">
                    <input type="text" id="inputName" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    <label for="inputName">Name</label>
                  </div>
                </div>
                <div class="col">
                  <select name='situation' id="inputSituation" class="form-control" required autofocus>
                    <option disabled selected>Sentimental situation</option>
                    @foreach($situations as $situation)
                      <option value="{{$situation->id}}">{{$situation->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <input type='text' data-provide="datepicker" id="birthdate" class="form-control date" name="birthdate" placeholder="Birthdate yy-mm-dd" required>
                </div>
                <div class="col">
                  <select name='country' id="inputCountry" class="form-control" required autofocus>
                    <option disabled selected>Country</option>
                    @foreach($countries as $country)
                      <option value="{{$country->country_id}}">{{$country->country_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-8">
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <label for="inputEmail">E-Mail Address</label>
                  </div>
                </div>
                <div class="col">
                  <select name='genre' id="inputGenre" class="form-control" required autofocus>
                    <option disabled selected>Genre</option>
                    @foreach($genres as $genre)
                      <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <label for="inputPassword">Password</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPasswordConfirmation" class="form-control" name="password_confirmation" placeholder="Password" required>
                <label for="inputPasswordConfirmation">Password</label>
              </div>

              <button class="btn btn-primary btn-block text-uppercase" type="submit">{{ __('Register') }}</button>
              <hr class="my-4">
              <a class="btn btn-success btn-block text-uppercase" href="{{ route('login') }}">Sign in</a>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
