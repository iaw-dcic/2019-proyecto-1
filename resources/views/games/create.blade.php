@extends('layouts.app') 
@section('title',' | Login') 
@section('content')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/4.jpg')}}">
    <div class="page-info">
        <h2>Agregar juego</h2>
        <div class="site-breadcrumb">
            <a href="./">Inicio</a> /
            <span>Agregar juego</span>
        </div>
    </div>  
</section>
<!-- Page top end-->


<!-- Contact page -->
<section class="contact-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Agregar juego') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('games/store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del juego') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                        required autofocus> @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span> @endif
                                </div>
                            </div>     

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                                    {{ __('Agregar juego') }}
                                                </button>
                                </div>
                            </div>                
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact page end-->
@endsection