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
             <div class="panel-heading text-center"> <h4 class="titulo">Colecciones</h4> </div>
             <div class="panel-body">
                <form>
                    <div class="checkbox">
                        <label class="opciones"><input type="checkbox" value="" checked>Públicas</label>
                    </div>
                    <div class="checkbox">
                        <label class="opciones"><input type="checkbox" value="" checked>Privadas</label>
                    </div>
                </form>
            </div>
            </div>

        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-8 well">
                <div class="text-center titulo tituloBlanco wellColeccion"><h2>Colecciones</h2></div><br>
                   <div class="flex-container">
                     @foreach ($colecciones as $colecion)
                        <div class="gallery">
                            <a href="/{{ Auth::user()->id }}/{{ $colecion->id }}/insertarItem">
                                <img src="#" alt="{{ $colecion->name }}" width="400" height="250">
                            </a>
                            <div class="desc">
                                <h6 class="tituloCard">{{ $colecion->name }}</h6>
                                <p>{{ $colecion->description }}</p>
                                <p><span class="negrita">Estado: </span>
                                    @if (($colecion->estado) === 0)
                                        Privada
                                    @else
                                        Pública
                                    @endif
                                </p>
                            </div>
                        </div>
                       @endforeach 
                     
                   </div>
               
                </div>
                 
        </div>
    </div>
    
</div>


@endsection
