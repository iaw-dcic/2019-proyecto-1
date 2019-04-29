@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit a Car') }}</div>

                <div class="card-body">
                    <form method="POST" action="/articles/{{$article->id}}">
                        @method('PATCH')
                        @csrf 

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Car Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"  value="{{$article->title}}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fabricationYear" class="col-md-4 col-form-label text-md-right">{{ __('Fabrication Year') }}</label>

                            <div class="col-md-6">
                                <input id="fabricationYear" type="integer" class="form-control{{ $errors->has('fabricationYear') ? ' is-invalid' : '' }}" name="fabricationYear"  value="{{$article->fabricationYear}}" required>

                                @if ($errors->has('fabricationYear'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fabricationYear') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="oldstatus" class="col-md-4 col-form-label text-md-right">{{ __('Car Old Status') }}</label>

                            <div class="col-md-6">
                                <input id="oldstatus" type="text" class="form-control{{ $errors->has('oldstatus') ? ' is-invalid' : '' }}" name="oldstatus"  value="{{$article->estado}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">Car New Status</label>
                            
                            <div class="col-md-6">
                                <input type="radio" name="estado" value="Original" checked> Original<br>
                                <input type="radio" name="estado" value="Restored"> Restored<br>
                                <input type="radio" name="estado" value="Modified"> Modified<br>
                                <input type="radio" name="estado" value="Boosted"> Boosted <br>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success"> {{ __('Update Car') }} </button>
                                </form>                       
                            </div>
                        </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
