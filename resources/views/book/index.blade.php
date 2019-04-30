@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mis Libros</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Autor</th>
                            <th>ISBN</th>
                            <th>Lista ID</th>
                            <th>Fecha de creación</th>
                        </tr>
                        @foreach($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>{{ $book->list_id }}</td>
                            <td>{{ $book->created_at}}</td>
                            <td>
                                <form action="{{ route('book.destroy',$book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('book.edit',$book->id) }}">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
        <div class="col-md-12">
            <div class="card-body">
                <center><a class="btn btn-primary btn-md" href="{{ route('book.create') }}">Agregar Libro</a></center>
            </div>
        </div>
</div>
@endsection