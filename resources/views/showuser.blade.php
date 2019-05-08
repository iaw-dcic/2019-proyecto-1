@extends('layout')

@section('head')
	@parent
	<link href="{{asset('css/show.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="d-flex justify-content-center h-100">
        <div class="card text-center" style="width: 50rem; height:30rem">
            <div class="card-header">
                <h3>Usuario: {{$user->name}}</h3>
                <h4>Correo electrónico: {{ $user->email}}</h4>
                <div class="d-flex justify-content-end table_icon">
					  <span><i class="fas fa-user"></i></span>
				</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                            <th>Nombre lista pública</th>
                            <th>Ver lista</th>
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                        @if($list->visible=='1')
                            <tr>
                                <td>{{ $list->name}}</td>
                                <td><a href="{{ url('/list/'.$list->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection