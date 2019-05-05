@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-3 sidenav  well well-lg">
            <div class="panel panel-primary text-center justify-content-center">
                <div class="panel-heading"><h4 class="text-uppercase text-center titulo">{{ Auth::user()->name }} {{ Auth::user()->lastName }}</h4></div>
                <div class="panel-body">
                    <img src="/img/avatar.png" class="img-thumbnail fPerfil" alt="Foto de Perfil">
                </div>
            </div>
          
            <div class="panel panel-primary">
             <div class="panel-heading text-center"> <h4 class="titulo">Información</h4> </div>
             <div class="panel-body">
                <p class="opciones">Contacto: {{ Auth::user()->email }}</p>
                <p class="opciones">Cantidad de Colecciones: {{ sizeof($colecciones) }} </p>
     
             <!--
                <form action="/home" method="get">
                    <div class="checkbox">
                        <label class="opciones"><input type="checkbox" name="publica" value="" checked onChange="this.form.submit()">Públicas</label>
                    </div>
                    <div class="checkbox" for="estado">
                        <label class="opciones"><input type="checkbox" name="privada" value="" checked onChange="this.form.submit()">Privadas</label>
                    </div>
                </form>
-->
            </div>
            </div>

        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-8 well">
                <div class="text-center titulo tituloBlanco wellColeccion"><h2>Colecciones</h2></div><br>
                   <div class="flex-container">
                     @foreach ($colecciones as $colecion)
                        <div class="gallery">
                            <a href="/{{ Auth::user()->id }}/{{ $colecion->id }}/insertarItem" class="linkCard">
                                <img src="#" alt="{{ $colecion->name }}" width="400" height="250">
                            
                            <div class="desc">
                                <h6 class="tituloCard">{{ $colecion->name }}</h6>
                                <p class="colorP">{{ $colecion->description }}</p>
                                <p class="colorP"><span class="negrita">Estado: </span>
                                    @if (($colecion->estado) === 0)
                                        Privada
                                    @else
                                        Pública
                                    @endif
                                </p>
                            </div>
                            </a>
                        </div>
                       @endforeach 
                     
                   </div>
               
                </div>
                 
        </div>
    </div>
    
</div>


@endsection
