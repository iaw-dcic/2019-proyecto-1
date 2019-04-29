@extends('layout')
@section('title', "Editar lista")
@section('content')
     <h1> Editar lista </h1>
	 
	<div class="container">
    <div class="row clearfix">
		<div class="col-md-12 column">
		
		 <form method="POST" action="{{ url("/listas/{$usermovie->id}") }}">
					  {{ method_field('PUT') }}
			 
			  {{ csrf_field() }}
		
		<div class="form-group">
	  	<label for="inputList"></label> 

		<input type="Nombre de lista" name="nombre" id="inputList" class="form-control" value="{{ old('nombre', $usermovie->nombre) }}"required autofocus>
		</div>
		
		</div>
	</div>
	
	<div class="form-check-inline">
	<label class="labeltext">Lista pública?  </label><br>
		<label class="customradio"><span class="radiotextsty">Si</span>
		  <input type="radio" checked="checked" name="radio">
		  <span class="checkmark"></span>
		</label>        
		<label class="customradio"><span class="radiotextsty">No</span>
		  <input type="radio" name="radio">
		  <span class="checkmark"></span>
	</label>
	</div>				
	
	
	
	<H1 align="CENTER">
	    <button type="submit" class="btn btn-primary">Editar lista</button>
			</H1>
			</form>
</div>

 <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
 <script type="text/javascript" src="{{ asset('js/create.js') }}"></script> 


@endsection