@extends('layout')


@section('content')
@if( Session::has('errorReceta') )
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error</strong> No hay recetas con ese nombre !! 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif



<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('img/cupcakes.jpg')}}" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
      <h5>Cupcakes</h5>
      <p>Facilisimos cupcakes,para acompañar tus tardes<p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('img/spaghetti.jpg')}}" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
         <h5>Spaghetti</h5>
         <p> Unos riquisimos tallarines con tuco</p>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('img/tiramisu.jpg')}}" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    <h5>Tiramisu<h5>
    <p>La verdadera receta del clásico italiano</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <!--  Seccion del buscador -->

<section class="buscador">
<form action="{{route('busqueda')}}" method="GET" role="search" >   <!--  protege busqueda-->
 
<div class="input-group mb-3">
<label class="sr-only" for="inlineFormInput">busqueda</label>
  <input type="text" name="buscador" class="form-control" placeholder="Nombre receta" aria-label="Nombre receta" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary " type="submit" id="button-addon2">Buscar</button>
  </div>
</div>
</form>

</section>
 
<!--  LOS TRES ICONOS CON LOS USUARIOS MAS CONOCIDOS
  =====ESTA PUESTO EN UNA SECCION APARTE -->
  <section class="iconos">
  <div class="container marketing">
  <h3 id="usuariosMas"> Los usuarios más valorados </h3>
    <!-- TRES COLUMNAS ABAJO DEL CAROUSEL -->
    <div class="row">
    <?php  $count=0 ?>
     @foreach($usuarios as $usuario)
      @if($count < 3)
    <div class="col-lg-4">
    
           @if($usuario->avatar != null)
                <img  alt="{{$usuario->nombre}}"  src="{{asset($usuario->avatar)}}" class="rounded-circle">
          @endif
          @if($usuario->avatar ==null)
                <img   alt="{{$usuario->nombre}}"  src="{{asset('img/usuario.png')}}" class="imgusuario rounded-circle">
                @endif
          
                <h2 class="usuarioNombre">{{$usuario->nombre}}
            @if($usuario->apellido != null)
                {{$usuario->apellido}}
            @endif
        </h2>
        <p>{{$usuario->descripcion}}</p>
        <p><a class="btn btn-secondary"  role="button" href="{{route('verPerfil',['id'=>$usuario->id])}}">Ver Perfil &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <?php $count++ ?>
      @endif
    @endforeach
     
    </section>
  <!-- Seccion de las primeras 5 recetas dulces y las 5 saladas -->

    <section class="recetas">
    <!-- van las listas recetas -->
    <div class="container-fluid">
    <div class="row">
        
    <div class="col-md-12">
    <div class="row" id="recetasTitulo">
      <h1  class="text-center"> Recetas más populares </h1>
    </div>
 
			<div class="row">
				<div class="col-md-6" id="mejoresSaladas">
        <h3> Mejores recetas Saladas: </h3>
        <hr>
					<div class="row">
          @foreach($recetas as $receta)
            @if($receta->categoria ==0)
						<div class="col-md-4">
              @if($receta->imagen != null )
              <img alt="foto {{$receta->nombre}}"class="rounded-circle"  src= "{{asset( $receta->imagen)}}" width=140px heigh=120px />
              @else
              <img alt="foto {{$receta->nombre}}" src= "{{asset('img/plato.png')}}" width=140px heigh=140px />
              @endif
						</div>
						<div class="col-md-8">
							<h3 >
							<a  href="{{route('receta',['nombre'=>$receta->nombre])}}" style="color:black"> {{$receta->nombre}} </a>
              </h3> 
              <p> Autor: <a href="{{route('verPerfil',['id'=>$receta->id_autor])}}"style="color:black"> {{$receta->autorId->nombre}}</a> </p>        
                </div>
            @endif
          @endforeach
					</div>
				</div>
				<div class="col-md-6"  id="mejoresDulces">
        <h3> Mejores recetas Dulces: </h3>
        <hr>
					<div class="row">
          @foreach($recetas as $receta)
            @if($receta->categoria ==1)
						<div class="col-md-4">
            @if($receta->imagen != null )
              <img class="rounded-circle" alt="foto {{$receta->nombre}}"src= "{{asset( $receta->imagen)}}" width=140px heigh=120px />
              @else
              <img alt="foto {{$receta->nombre}}" src= "{{asset('img/plato.png')}}" width=140px heigh=140px />
              @endif
						</div>
						<div class="col-md-8">
							<h3>
             <a  href="{{route('receta',['nombre'=>$receta->nombre])}}" style="color:black"> {{$receta->nombre}} </a>
              </h3>
              <p> Autor: <a href="{{route('verPerfil',['id'=>$receta->id_autor])}}"style="color:black"> {{$receta->autorId->nombre}}</a> </p>
             
            </div>
            @endif
          @endforeach
					</div>
				</div>
			</div>
		</div>
  
  </div>
  </div>
  </section>
    <!-- /END THE FEATURETTES -->
    </div>

@endsection
  