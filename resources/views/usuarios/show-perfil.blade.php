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
                    <h4 class="mb-0">Perfil</h4>
                </div>
                <div class="card-body">
                    {{-- <form class="form" role="form" method="POST" action="{{ route('perfil') }}"> --}}
                        {{-- @csrf --}}

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                            <div class="col-lg-9">
                                {{-- <label class="col-form-label form-control-label">{{ $user->name }}</label> --}}
                                <input class="form-control" type="email" value="{{ $user->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Apellido</label>
                            <div class="col-lg-9">
                                {{-- <label class="col-form-label form-control-label">{{ $user->surname }}</label> --}}
                                <input class="form-control" type="email" value="{{ $user->surname }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" value="{{ $user->email }}" disabled>
                                {{-- <label class="col-form-label form-control-label">{{ $user->email }}</label> --}}
                            </div>
                        </div>
                    {{-- </form> --}}
                    <!-- /form user info -->
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-md btn-secondary my-3 my-sm-3 text-center">
                <span class="fas fa-arrow-left mr-1"></span>
                Volver
            </a>
        </div>
    </div>

@endsection


