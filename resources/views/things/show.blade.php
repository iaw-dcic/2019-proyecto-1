@extends('index.layout')
@section('content')

    <div class="sticky-top">
    <h1 class = "title"> <p class="font-weight-bolder">Mis Viajes </p></h1>
    </div>

    @if($misListas->count())
    <div class ="container">
        <ul class="list-group">
               
        @foreach($misListas as $thing)
            <li class="list-group-item"> 
                    <a href="/things/{{$thing ->id}}/addItems" ><h6>{{$thing -> title}} </h6>
                    </a>
            </li> 
         @endforeach
       
        </ul>
    </div>
    @endif


    <form method = "POST" action="/things">
		{{csrf_field()}}
		
        <div class= "container">
            <label for="example-text-input" class="col-2 col-form-label">¿Qué país vas a visitar?</label>
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