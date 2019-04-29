@extends('layout')

@section('head')
	@parent
	<link href="{{asset('css/tablelists.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="d-flex justify-content-center h-100">
        <div class="card text-center" style="width: 30rem; height:30rem">
            <div class="card-header">
                <h3>Mis listas</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Nombre lista</th>
                        <th>Editar</th>
                        <th>Eliminar</th>  
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                            <tr>
                                <td>{{ $list->name}}</td>
                                <td><a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                                <td><a href="" class="btn btn-primary"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection