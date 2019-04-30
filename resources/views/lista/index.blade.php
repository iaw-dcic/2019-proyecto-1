@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de listas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID Lista</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Creada en</th>
                        </tr>
                        @foreach($listas as $lista)
                        <tr>
                            <td>{{ $lista->id }}</td>
                            <td>{{ $lista->name }}</td>
                            <td>{{ $lista->user_id }}</td>
                            <td>{{ $lista->created_at }}</td>
                            <td>
                            <form action="{{ route('list.destroy',$lista->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                       <td><a class="btn btn-primary btn-sm" href="{{url('list/'.$lista->id)}}">Ver</a></td>
                       <td><a class="btn btn-primary btn-sm" href="{{ route('list.edit',$lista->id) }}">Editar</a></td>

                        </tr>
                        @endforeach
                        

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection