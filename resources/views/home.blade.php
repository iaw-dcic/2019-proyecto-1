@extends('layout')


@section('content')
 
<div class="bd-example">
  <div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        
      <a href="#">  <img src="{{ asset('img/spaghetti.jpg') }}" class="d-block w-100" alt="spaghetti"></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>Spaghetti</h5>
          <p>Riquisimos spaghetti con salsa y atún</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/tiramisu.jpg') }}" class="d-block w-100" alt="tiramisu">
        <div class="carousel-caption d-none d-md-block">
          <h5>Tiramisú</h5>
          <p>Verdadera receta del clásico postre italiano.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/cupcakes.jpg') }}" class="d-block w-100" alt="cupcakes">
        <div class="carousel-caption d-none d-md-block">
          <h5>Cupcakes</h5>
          <p>Espectaculares cupcakes de naranja con crema</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
  <!--  Seccion del buscador -->

<section class="buscador">
<form action="#" method="GET" role="search" > {{csrf_field() }}   <!--  protege busqueda-->

<div class="input-group mb-3">
<label class="sr-only" for="inlineFormInput">busqueda</label>
  <input type="text" name="query" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary " type="button" id="button-addon2">Buscar</button>
  </div>
</div>
</form>

</section>

<!--  LOS TRES ICONOS CON LOS USUARIOS MAS CONOCIDOS
  =====ESTA PUESTO EN UNA SECCION APARTE -->
  <section class="iconos">
  <div class="container marketing">
  <h3> Los usuarios más valorados </h3>
    <!-- TRES COLUMNAS ABAJO DEL CAROUSEL -->
    <div class="row">
    <?php  $count=0 ?>
     @foreach($usuarios as $usuario)
      @if($count < 3)
    <div class="col-lg-4">
    
           @if($usuario->avatar != null)
                <img alt="{{$usuario->nombre}}"  src="{{asset($usuario->avatar)}}" class="rounded-circle">
          @endif
          @if($usuario->avatar ==null)
                <img alt="{{$usuario->nombre}}"  src="{{asset('img/usuario.png')}}" class="rounded-circle">
                @endif
          
                <h2>{{$usuario->nombre}}
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
    <h1 class="text-center"> Recetas más populares </h1>
			<div class="row">
				<div class="col-md-6">
        <h3> Mejores recetas Saladas: </h3>
					<div class="row">
          @foreach($recetas as $receta)
            @if($receta->categoria ==0)
						<div class="col-md-4">
							<img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" />
						</div>
						<div class="col-md-8">
							<h3>
								 {{$receta->nombre}}
              </h3>
              <p> Autor: <a href="{{route('verPerfil',['id'=>$receta->id_autor])}}"> {{$receta->autorId->nombre}}</a> </p>
            </div>
            @endif
          @endforeach
					</div>
				</div>
				<div class="col-md-6">
        <h3> Mejores recetas Dulces: </h3>
					<div class="row">
          @foreach($recetas as $receta)
            @if($receta->categoria ==1)
						<div class="col-md-4">
							<img alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg" />
						</div>
						<div class="col-md-8">
							<h3>
              {{$receta->nombre}}
              </h3>
              <p> Autor: <a href="{{route('verPerfil',['id'=>$receta->id_autor])}}"> {{$receta->autorId->nombre}}</a> </p>
             
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
