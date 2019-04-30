@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Libros</div>

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
                        </tr>
                        @endforeach
                        

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection