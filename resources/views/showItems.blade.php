@extends('layouts.app')

@section('content')

<div class="content container">
<div class="row justify-content-center">
        <div class="col-sm-3 sidenav  well well-lg">
            <div class="panel panel-primary text-center justify-content-center">
                <div class="panel-heading"><h4 class="text-uppercase text-center titulo">{{ $datos[2]->name }} {{ $datos[2]->lastName }}</h4></div>
                <div class="panel-body">
                    <img src="/img/avatar.png" class="img-thumbnail fPerfil" alt="Foto de Perfil">
                    <div class="opciones pad">{{ $datos[2]->email }}</div>
                </div>
            </div>
            
</div>           
        <div class="col-sm-1"></div>
        <div class="col-sm-8 well">
            <div class="text-center titulo tituloBlanco wellColeccion"><h2>{{ $datos[0]->name }}</h2></div><br>
                   <div class="flex-container">
                     @foreach ($datos[1] as $item)
                        <div class="gallery">
                            <a href="#" target="_self">
                                <img src="#" alt="{{ $item->name }}" width="400" height="250">
                            </a>
                            <div class="desc">
                                <h4 class="tituloCard">{{ $item->name }}</h4>
                                <p>{{ $item->description }}</p>
                                <p><span class="negrita">Año de edición:</span> {{ $item->edicion }}</p>
                                <p><span class="negrita">Nro de Páginas:</span> {{ $item->nroPaginas }}</p>
                                </div>
                        </div>
                       @endforeach 
                     
                   </div>
               
                </div>
</div>
</div>

@endsection