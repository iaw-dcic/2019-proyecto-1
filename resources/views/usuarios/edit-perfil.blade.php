@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <span class="anchor" id="formUserEdit"></span>

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- form user info -->
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h4 class="mb-0">Mi Perfil</h4>
                </div>
                <div class="card-body">
                    <form class="form" role="form" method="POST" action="{{ route('actualizar-perfil') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-lg-3 col-form-label form-control-label">Nombre</label>
                            <div class="col-lg-9">
                                <input id="name" class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-lg-3 col-form-label form-control-label">Apellido</label>
                            <div class="col-lg-9">
                                <input id="surname" class="form-control" type="text" name="surname" value="{{ Auth::user()->surname }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input id="email" class="form-control" type="text" name="email" value="{{ Auth::user()->email }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancelar">
                                <input type="submit" class="btn btn-primary" value="Guardar cambios">
                            </div>
                        </div>
                    </form>
                    <!-- /form user info -->
                </div>
            </div>
        </div>
    </div>
@endsection


