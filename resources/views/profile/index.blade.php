@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mi Perfil</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>E-mail</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                        </tr>
                        <tr>
                            <td>{{ $userData->name }}</td>
                            <td>{{ $userData->surname }}</td>
                            <td>{{ $userData->username }}</td>
                            <td>{{ $userData->email }}</td>
                            <td>{{ $userData->telephone}}</td>
                            <td>{{ $userData->address}}</td>
                        </tr>                        
                    </table>
                    <td><center><a class="btn btn-primary btn-md" href="{{ route('profile.edit') }}">Editar</a></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection