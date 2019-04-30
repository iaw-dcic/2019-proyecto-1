@extends('index.layout')
@section('content')

	<div> 
    <h1 class = "title"> Mis Viajes </h1>
    </div>

    @if($misListas->count())
    <div>
        
        @foreach($misListas as $thing)
        <a href="/things/{{$thing ->id}}/addItems" class="btn btn-light">
             <h2>{{$thing -> title}} </h2>
            </a> 
       @endforeach
       
    </div>
    @endif


    <form method = "POST" action="/things">
		{{csrf_field()}}
		
        <div class= "container">
            <div class="container">
                <label for="example-text-input" class="col-2 col-form-label">¿Qué país vas a visitar?</label>
            </div>
            <div class="col-10">
                <input class="form-control" type="text" id="example-text-input" name = "title">
            </div>
            <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="compartir" id="remember" >

                                    <label class="form-check-label" for="remember">
                                       Compartir mis viajes a otros
                                    </label>
                                </div>
            <div class = "container">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
            
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <br>
                        <li>{{$error}}</li>
                    @endforeach	
                </ul>
            </div>
        </div>
	</form>

@endsection