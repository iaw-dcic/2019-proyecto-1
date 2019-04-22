
@extends('layout')


@section('title', "Crear lista")

@section('content')
     <h1> Crear lista </h1>
	 
	<div class="container">
    <div class="row clearfix">
	


		<div class="col-md-12 column">
		
		<div class="form-group">
	  	<label for="inputList"></label>
		<input type="Nombre de lista" id="inputList" class="form-control" placeholder="Nombre de la lista" required autofocus>
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
						
					</tr>
					

				</thead>
				<tbody>
					<tr id='addr0'>
						<td>
						1
						</td>
						<td>
						<input type="text" name='Título'  placeholder='Título' class="form-control"/>
						</td>
						<td>
						<input type="text" name='Director' placeholder='Director' class="form-control"/>
						</td>
						
					</tr>
					
                    <tr id='addr1'></tr>
					
				</tbody>
				
			</table>
			
			
		</div>
	</div>


	<H1 align="CENTER">
		<a id="add_row" class="btn btn-primary" href='#' > + Pelicula </a>
		 
		 
	
	  <td class="text-center"><a id="delete_row"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> - Pelicula</a></td>
	</H1>
	
	<H1 align="CENTER">
	    <a class="btn icon-btn btn-success" href="#"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>¡Crear!</a>
			</H1>
</div>

 <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
 <script type="text/javascript" src="{{ asset('js/create.js') }}"></script> 


@endsection