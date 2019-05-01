@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 850px" id="container">
        <h2 class="text-center pb-4">{{ $list_name }}</h2>
        @if ($books->isEmpty())
            <p>Lista vacía</p>
        @else
        <div class="table-responsive" id="table_resp">
            <table class="table" id="table_id" >
                <thead class="thead-light">
                    <tr>
                        <th scope="col" id="col_nombre">Nombre</th>
                        <th scope="col" id="col_autor">Autor</th>
                        <th scope="col" id="col_año">Año</th>
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

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif


        <a href="{{ route('welcome') }}" class="btn btn-md btn-secondary my-3 my-sm-3 text-center">
            <span class="fas fa-arrow-left mr-1"></span>
            Volver
        </a>
    </div>

@endsection

