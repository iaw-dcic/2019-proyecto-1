@extends('layout')
@section('content')
<br>
<div class="container-fluid">
    <br>
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>
                    {{$receta[0]->nombre}} 
                   <br>
                 </h1>
                <h5>   <small> por: <a href=""> {{$receta[0]->autorId->nombre}} </a> </small> </h5>
               
                <hr>
                <h3 class="estilo-nombre-chefs" itemprop="author">
            
                   
			</div>
			<div class="row">
				<div class="col-md-4">
					<ul>
                        <h3> Ingredientes: </h3>
                        <hr>
                        @foreach($ingredientes as $ingrediente)
                         @if($ingrediente->receta_nombre == $receta[0]->nombre)
						    <li class="list-item">
                              <p>  {{$ingrediente->ingredienteId->nombre}}
                                  {{$ingrediente->cantidad}}
                                {{$ingrediente->medidaId->nombre}} </p>
						    </li>
                        @endif
                        @endforeach
					</ul>
				</div>
				<div class="col-md-8">
                   
					<img alt="{{$receta[0]->nombre}}" src="{{asset('img/huevosrevueltos.jpg')}}" />
                    <div class="row">
                        <h3> Pasos de la receta: </h3>
                        <hr>
                    </div>
                    <div class="row">
                    
                     <p>
					 {{$receta[0]->descripcion}}
                    </p>
                    </div>
                 
				</div>
			</div>
		</div>
	</div>
</div>
@stop