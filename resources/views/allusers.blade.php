@extends('layout')

@section('head')
	@parent
	<link href="{{asset('css/tablelists.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="d-flex justify-content-center h-100">
        <div class="card text-center">
            <div class="card-header">
                <h3>Lista usuarios</h3>
                <div class="d-flex justify-content-end table_icon">
					  <span><i class="fas fa-users"></i></span>
				</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-head">
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Correo electrónico</th>
                        <th>Ver perfil</th>
                    </thead>
                    <tbody class="table-body">
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id}}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td><a href="{{ url('/'.$user->id) }}" class="btn btn-primary">Ir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {!! $users->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection