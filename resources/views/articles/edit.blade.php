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
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="integer" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{$article->price}}" required>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"> {{ __('Update Car') }} </button>
                                </form>
                                <form method="POST" action="/articles/{{$article->id}}">    
                                    @csrf
                                    @method('DELETE')                           
                                    <button type="submit" class="btn btn-secondary "> {{ __('Delete Car') }} </button>
                                </form>                                
                            </div>
                        </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
