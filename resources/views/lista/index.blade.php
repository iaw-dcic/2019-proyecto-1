@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mis listas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive-md">
                        <table class="table">
                        <tr>
                            <th>ID Lista</th>
                            <th>Nombre</th>
                            <th>Creada en</th>
                            <th>¿Es Pública?</th>
                        </tr>
                        @foreach($listas as $lista)
                        <tr>
                            <td>{{ $lista->id }}</td>
                            <td>{{ $lista->name }}</td>
                            <td>{{ $lista->created_at }}</td>
                            <td>{{($lista->public_list ==0) ? 'No' : 'Si'}}</td>
                            <td>
                            <form action="{{ route('list.destroy',$lista->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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
        <div class="col-md-12">
            <div class="card-body">
                <center><a class="btn btn-primary btn-md" href="{{ route('list.create') }}">Agregar Lista</a></center>
            </div>
        </div>
</div>
@endsection