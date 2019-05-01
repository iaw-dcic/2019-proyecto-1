@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 850px" id="container">
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

        <h2 class="text-center">{{ $list_name }}</h2>
        <a href="{{ route('crear-libro', ['id' => $list_id]) }}" class="btn btn-md btn-success my-3 my-sm-3">
            <span class="fas fa-plus mr-1"></span>
            Nuevo libro
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

                        <form action="{{ route('eliminar-libro', [$list_id, $book['id']]) }}" method="GET" style="display: inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger my-1 my-sm-0">
                                <span class="fas fa-trash mr-1"></span>
                                <span class="d-none d-lg-inline">Eliminar</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
