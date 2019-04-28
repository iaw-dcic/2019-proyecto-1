@extends('layouts.app')

@section('sectioncontent')
<section id="hero">
    <div class="hero-container">
        <div class="col-md-8">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <img width="100px" height="100px" class="rounded-circle" src="{{ (substr_compare($user['avatar'], 'https://', 0, 8)==0) ? $user['avatar'] : asset('uploads/avatars/'.$user['avatar']) }}">
                        <h4 class="text-white">{{ $user['username'] }}</h4>
                    </div>
                    <div class="col-md-4">
                        <textarea class="scrollbar-primary mt-4" style="border-radius:15px; background-color: black;color:#fff;" rows="4" cols="50" id="description" readonly disabled>{{ $user['description'] }}</textarea>
                    </div>
                </div>
                <h2 class="text-white">Editar Perfil</h2>
                <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right text-white">{{ __('Nombre de usuario') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" autofocus>

                            @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="avatar" class="col-md-4 col-form-label text-md-right text-white">{{ __('Avatar') }}</label>

                        <div class="col-md-6">
                            <input id="avatar" type="file" class="form-control text-white" name="avatar">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right text-white" for="description">Descripcion</label>
                        <div class="col-md-6">
                            <textarea class="form-control scrollbar-primary" rows="4" id="description" name="description{{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
                            @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Actualizar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- #hero -->
@endsection