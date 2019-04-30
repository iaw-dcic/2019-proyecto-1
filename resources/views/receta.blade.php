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
                <h5>   <small> por: <a href="{{route('verPerfil',['id'=>$receta[0]->autorId])}}"> {{$receta[0]->autorId->nombre}} </a> </small> </h5>
                @if(Auth::user()==$receta[0]->autorId)
                <div class="float-right">
                  <a href="{{route('editarReceta',['nombre'=>$receta[0]->nombre])}}"> Editar </a>
                </div><br>
                @endif
                <hr>
      	</div>
			<div class="row">
				<div class="col-md-4" id="divIngredientes">
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
                   
					<img id="imgreceta" alt="{{$receta[0]->nombre}}" src="{{asset($receta[0]->imagen)}}" />
                    <div class="row">
                        <h3> Pasos de la receta: </h3>
                        <hr>
                    </div>
                    
                    <div class="row">
                    
                     <p>
				          	 {{$receta[0]->pasos}}
                    </p>
                    </div>
                 
				</div>
			</div>
		</div>
	</div>
</div>
@stop