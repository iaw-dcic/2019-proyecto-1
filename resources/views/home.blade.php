@extends('layout')

@section('head')
	@parent
	<link href="{{asset('css/searchstyle.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="d-flex justify-content-center h-100">
		  <div class="card">
			  <div class="card-header">
				  <h3>Filtrar busqueda por</h3>
				  <div class="d-flex justify-content-end social_icon">
					  <span><i class="fas fa-search"></i></span>
				  </div>
			  </div>
			  <div class="card-body">
				  <form>
			    	  <div class="form-group">
                <select class="form-control">
                          <option>Todo</option>
                          <option>Nombre lista</option>
                          <option>Tipo elemento</option>
                          <option>Usuario</option>
                    </select>
                </div>
				        <div class="input-group form-group">
						      <div class="input-group-prepend">
							      <span class="input-group-text">
                      <i class="fas fa-pencil-alt"></i>
                    </span>
						      </div>
						      <input type="password" class="form-control" placeholder="">
					      </div>
					      <div class="form-group">
						      <input type="button" value="Buscar" class="btn float-right login_btn">
					      </div>
				    </form>
			    </div>
        </div>
        </div>
      </div> 
@endsection