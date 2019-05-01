@extends('layout')

@section('title', "Ingresar pelicula")

@section('content')
     <h1> Agregar peli </h1>
	 
	<div class="container">
    <div class="row clearfix">
	
		<div class="col-md-12 column">
		<form method="POST" action="{{ url("/listas/{$usermovie->id}") }}">
		 
		@csrf

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
							Año
						</th>
						
					</tr>
					

				</thead>
				<tbody>
					<tr id='addr0'>
						<td>
						1
						</td>
						<td>
						<input type="text" name='titulo'  placeholder='Título' class="form-control"/>
						</td>
						<td>
						<input type="text" name='director' placeholder='Director' class="form-control"/>
						</td>
						<td>
						<input type="text" name='año' placeholder='Año' class="form-control"/>
						</td>
						
					</tr>
                    <tr id='addr1'></tr>
					
				</tbody>
				
			</table>
			 
			
		</div>
	</div>			
	
 <!--	<H1 align="CENTER">
		<a id="add_row" class="btn btn-primary" href='#' > + Pelicula </a>
		 
		 
	
	  <td class="text-center"><a id="delete_row"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> - Pelicula</a></td>
	</H1>
	 -->
	<H1 align="CENTER">
	    <button type="submit" class="btn btn-primary">Agregar peli</button>
			</H1>
			</form>
</div>

 <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
 <script type="text/javascript" src="{{ asset('js/create.js') }}"></script> 


@endsection