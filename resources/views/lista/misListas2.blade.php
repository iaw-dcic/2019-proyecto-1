@extends('main')
@section('title')
	{{$usr}} | Listas
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	function esconderLista(idlista) {

    // procura o elemento com o ID passado para a função e coloca o estado para o contrario do estado actual
    $("#"+1).toggle();
}
</script>	
@section('content')
<div class="container">
<table class="table table-striped">
<thead class="thead-dark">
	<th>nombre</th>
	<th>visibilidad</th>
	<th> Acción </th>
</thead>
<tbody>	
@foreach ($listas as $lista)
	<tr>
		<td>
			<button onClick=$("#"+1).toggle();>
				{{$lista->nombre}}
			</button>
		</td>
		<td>
			@if($lista->lista_publica == '1')
				<span class="badge badge-pill badge-primary">Publica</span>
  			@else
  				<span class="badge badge-pill badge-danger">Privada</span>
			@endif
		</td>
		<td> 
			<a href="{{ route('listas.edit',$lista->id) }}" role="button" class="btn btn-warning" aria-pressed="true">Editar</a>
			<a href="{{ route('listas.destroy',$lista->id) }}" role="button" class="btn btn-danger" aria-pressed="true">Eliminar</a>
		</td>
	</tr>

	<tr id= '$lista->id' style="display: none">
      <td></td>
      <td colspan="2">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Autor</th>
              <th>Genero</th>
            </tr>
          </thead>
          <tbody>
    		@foreach ($lista->libros as $libro)
    			<td>
					{{$libro->nombre}}
				</td>
				<td>
					{{$libro->autor}}
				</td>
				<td>
					{{$libro->genero}}
				</td>
    		@endforeach
          </tbody>
        </table>
      </td>
    </tr>
@endforeach
</tbody>
</table>
<a href="{{route('listas.create')}}" role="button" class="btn btn-primary btn-lg btn-block" aria-pressed="true">Agregar</a>
</div>

	
@endsection
