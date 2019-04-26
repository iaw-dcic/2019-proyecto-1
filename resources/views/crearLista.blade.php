@extends('layouts.app')

@section('titulo')
    Creemos una Lista
@endsection

@section('content')
    <h1> Crea una nueva lista aquí! </h1>


    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('llena los datos de tu lista aquí!') }}</div>

                <div class="card-body">
                    <form method="POST" action="/profile">
                        @csrf
                        <div>
                            <span class="input-group-addon" id="basic-addon1">{{__('Name')}}</span>
                            <input type="text" class="form-control" placeholder="Nombre Lista" aria-describedby="basic-addon1">
                        </div>
                        <div>
                            <span class="input-group-addon" id="basic-addon2">{{__('Descripción')}}</span>
                            <input type="text" class="form-control" placeholder="Descripción Lista" aria-describedby="basic-addon2">
                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" aria-label="...">
                            <span class="input-group-addon" id="basic-addon3">{{__('Lista Publica?'}}</span>
                        </div><!-- /.col-lg-6 -->
                        <div>
                            {{Auth::user()->id}}
                        </div>
                        <div>
                            <button type="submit" >Crear Lista </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection