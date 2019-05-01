@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Acerca de</div>

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

                <div class="card-header">Datos Obtenidos de Audit</div>

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
                                    <th>URL</th>
                                    <th>Performance</th>
                                    <th>Accesibilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>/home</td>
                                    <td>87%</td>
                                    <td>87%</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>/login</td>
                                    <td>88%</td>
                                    <td>89%</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>/book</td>
                                    <td>88%</td>
                                    <td>87%</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>/list</td>
                                    <td>89%</td>
                                    <td>87%</td>
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