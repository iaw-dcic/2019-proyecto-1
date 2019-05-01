@extends('layouts.app')

@section('content')
    <div class="container" id="container">
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

        <h2 class="text-center">Lista: {{ $list_name }}</h2>
        <a href="{{ route('crear-libro', ['id' => $list_id]) }}" class="btn btn-md btn-success my-3 my-sm-3">
            <span class="fas fa-plus mr-1"></span>
            Nuevo libro
        </a>
        <a href="{{ route('editar-lista', $list_id) }}" class="btn btn-md btn-primary my-3 my-sm-3 ">
            <span class="fas fa-edit mr-1"></span>
            {{-- <span class="d-none d-lg-inline">Editar lista</span> --}}
            Editar lista
        </a>
        <div class="table-responsive" id="table_resp">
            <table class="table" id="table_id" >
                <thead class="thead-light">
                    <tr>
                        <th scope="col" id="col_nombre">Nombre</th>
                        <th scope="col" id="col_autor">Autor</th>
                        <th scope="col" id="col_año">Año</th>
                        <th scope="col" id="col_acciones">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>
                        {{ $book['name'] }}
                    </td>

                    <td>
                        {{ $book['author'] }}
                    </td>

                    <td>
                        {{ $book['year'] }}
                    </td>

                    <td>
                        <a href="{{ route('editar-libro', [$list_id, $book['id']]) }}" class="btn btn-sm btn-primary my-1 my-sm-0">
                            <span class="fas fa-edit mr-1"></span>
                            <span class="d-none d-lg-inline">Editar</span>
                        </a>

                        <button onclick="setId({{$book['id']}});" type="button" data-toggle="modal" data-target="#confirmModal" class="btn btn-sm btn-danger my-1 my-sm-0">
                            <span class="fas fa-trash mr-1"></span>
                            <span class="d-none d-lg-inline">Eliminar</span>
                        </button>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <a href="{{ route('mis-listas') }}" class="btn btn-md btn-secondary my-3 my-sm-3 text-center">
            <span class="fas fa-arrow-left mr-1"></span>
            Volver
        </a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Por favor confirme que quiere eliminar.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form action="/usuario/mis-listas/{{ $list_id }}/eliminar-libro" method="POST" id="eliminarForm">
                    @csrf
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection
