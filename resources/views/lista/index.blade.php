@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista: {{$name}} - {{($is_public ==0) ? 'Lista no Pública' : 'Lista Pública' }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID Libro</th>
                            <th>Nombre</th>
                            <th>Autor</th>
                            <th>ISBN</th>
                        </tr>
                        @foreach($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->isbn }}</td>
                        </tr>
                        @endforeach
                        

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection