@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Perfil Público del Usuario: {{$userData->name}} </div>
                <form method="GET" action="{{ route('profile.show', ['id' => $userData->id]) }}">

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
                            <th>Teléfono</th>
                            <th>Dirección</th>
                        </tr>
                        <tr>
                            <td>{{ $userData->name }}</td>
                            <td>{{ $userData->surname }}</td>
                            <td>{{ $userData->telephone}}</td>
                            <td>{{ $userData->address}}</td>
                        </tr>                        

                    </table>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection