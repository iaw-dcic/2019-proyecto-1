@extends('layout')

@section('head')
    @parent
    <link href="{{asset('css/createlist.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card h-50">
			<div class="card-header">
				<h3>Nueva lista</h3>
				<div class="d-flex justify-content-end social_icon">
                    <span><i class="fas fa-list-ul"></i></span>
				</div>
			</div>
			<div class="card-body">
                    <form method="POST" action="{{url('create_list')}}">
                        @csrf
                        <div class="input-group form-group">
						    <div class="input-group-prepend">
							    <span class="input-group-text"><i class="fas fa-italic"></i></span>
						    </div>
						    <input id="name" type="text" class="form-control" name="name" placeholder="Nombre lista" required autofocus>
                        </div>
                        <div class="row align-items-center remember">
						    <input type="checkbox" name="public" id="public">Lista pública
					    </div>

                        <div class="form-group">
						    <input type="submit" value="Crear" class="btn float-right login_btn">
					    </div>
				</form>
            </div>
            
            <div class="card-footer">
				<div class="d-flex justify-content-center">
                    Luego podrás editar su configuración
				</div>
			</div>
            </div>
	</div>
</div>
@endsection