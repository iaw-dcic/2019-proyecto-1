
@extends('layouts.app')

@section('content')
    <div class="container">

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Listas</th>
                <th scope="col">Acciones</th>
                <th scope="col">Estado</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <th scope="row">1</th>
                <td>
                <a href="#">
                    Some item on your list
                </a>
                </td>
                <td>
                <a href="#" class="btn btn-sm btn-primary my-1 my-sm-0">
                    <span class="fas fa-edit mr-1"></span>
                    Editar</a>
                <a href="#" class="btn btn-sm btn-danger my-1 my-sm-0">
                    <span class="fas fa-trash mr-1"></span>
                    Eliminar</a>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-success my-1 my-sm-0">
                    {{-- <span class="fas fa-edit mr-1"></span> --}}
                    Publica</a>
                </td>
            </tr>

            <tr>
                <th scope="row">2</th>
                <td>
                <a href="#">
                    Some item on your list
                </a>
                </td>
                <td>
                <a href="#" class="btn btn-sm btn-primary my-1 my-sm-0">
                    <span class="fas fa-edit mr-1"></span>
                    Editar</a>
                <a href="#" class="btn btn-sm btn-danger my-1 my-sm-0">
                    <span class="fas fa-trash mr-1"></span>
                    Eliminar</a>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-secondary my-1 my-sm-0">
                    {{-- <span class="fas fa-edit mr-1"></span> --}}
                    Privada</a>
                </td>
            </tr>

            </tbody>
        </table>

    </div>
@endsection
