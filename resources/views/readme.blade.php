@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Read Me</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Alumno</th>
                                    <th>LU</th>
                                    <th>Materia</th>
                                    <th>Profesor</th>
                                    <th>Asistente</th>
                                    <th>Año</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jonathan Alberto Fritz</td>
                                    <td>99761</td>
                                    <td>Ingeniería de Aplicaciones Web</td>
                                    <td>Diego Martinez</td>
                                    <td>Mariano Tucat</td>
                                    <td>2019</td>
                                </tr>
                            </tbody>                     
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection