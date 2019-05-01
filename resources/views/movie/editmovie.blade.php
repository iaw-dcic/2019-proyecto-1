@extends('layout')

@section('title', "Editar pelicula")

@section('content')
     <h1> Editar peli </h1>
	 
	<div class="container">
    <div class="row clearfix">
	
		<div class="col-md-12 column">
		<form method="POST" action="{{ url("/listas/{$usermovie->id}/{$movie->id}") }}">
		 
			  {{ method_field('PUT') }}
			 
			  {{ csrf_field() }}

		<div class="form-group">
	  	<label for="inputList"></label> 

		</div>
			
			<table class="table table-bordered table-hover" id="tab_logic">
				<thead>
					<tr >
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Película
						</th>
						<th class="text-center">
							Director
						</th>
						<th class="text-center">
							año
						</th>
					</tr>
					

				</thead>
				<tbody>
					<tr id='addr0'>
						<td>
						
						</td>
						<td>
						<input type="text" name='titulo'  placeholder='Título' class="form-control" value="{{ old('titulo', $movie->titulo) }}"/>
						</td>
						<td>
						<input type="text" name='director' placeholder='Director' class="form-control" value="{{ old('director', $movie->director) }}"/>
						</td>
						<td>
						<input type="text" name='año' placeholder='Año' class="form-control" value="{{ old('año', $movie->año) }}"/>
						</td>
						
					</tr>
                    <tr id='addr1'></tr>
					
				</tbody>
				
			</table>
			 
			
		</div>
	</div>			
	
	<H1 align="CENTER">
	    <button type="submit" class="btn btn-primary">Editar peli</button>
			</H1>
			</form>
</div>

 <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
 <script type="text/javascript" src="{{ asset('js/create.js') }}"></script> 


@endsection