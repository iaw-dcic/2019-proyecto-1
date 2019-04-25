@extends('layout')
@section('content')
<body>
 
<div class="container-fluid">
<div class="row">
    <div class="col-md-12" id="perfil">
        <h3>
           Perfil
        </h3>
        <div class="perfil">
        <div class="row">
            <div class="col-md-4"style="background-color: lightgray">
                <div class="row">
                <div class="col-md-6"style="background-color: lightgray">
                @if($perfil->avatar != null)
                <img alt="{{$perfil->nombre}}"  src="{{asset($perfil->avatar)}}" class="rounded-circle">
                @endif
                @if($perfil->avatar == null)
                <img alt="{{$perfil->nombre}}"  src="{{asset('img/usuario.png')}}" class="rounded-circle">
                @endif
                </div>
                
                <div id="datos" class="col-md-6"style="background-color: lightgray">
                    <form id="form-editar-perfil" accept-charset="UTF-8" role="form" method="POST" action="{{route('actualizar',['id'=>$perfil->id])}}"  >
                    {{ csrf_field() }}
                     <div class="form-group" id="perfil.nombre">
                        <label class=" "> Nombre: <br>
                         {{$perfil->nombre}} </label> 
                     </div>
               
                
                    <div class="form-group" id="perfil.apellido">
                    @if($perfil->apellido !=null)
                        <label class=" "> Apellido: <br>
                         {{$perfil->apellido}} </label> 
                         @endif
                     </div>
                    
                     
                     <div class="form-group" id="perfil.email">
                        <label class=" "> Email:<br>
                         {{$perfil->email}} </label> 
                     </div>
                    
                    <div class="form-group" id="perfil.descr">
                        <label class=" "> Descripcion (opcional): <br>
                        @if($perfil->descr !=null)
                         {{$perfil->descr}} 
                        @endif
                         </label> 
                     </div>
                    
                     <div class="form-group">
                        <label class=" "> Se unio:
                        <br> {{$perfil->created_at}} </label> 
                     </div>

                     <button id="botonGuardar" class="btn btn-primary" >Guardar</button></div>
                     </form>
               
               @if(Auth::user() == $perfil)
                 <div id="lugarBoton">
                <button id="button" type="button" class="btn btn-success" onclick="editarUsuario({{$perfil}})">
                    Editar
                </button>
             
                 </div>
                 @endif
                 </div>
              
            
                
            </div>    
            <?php  $count=0 ?>
               
         <!-- Lado derecho, las listas del usuario -->  
            <div class="col-md-8">
            @foreach($listas as $lista)
                <div class="list-group">
            
                     <?php  $count=0 ?>
                     <div class="row">
                    <div class="col-11">
                     <a href="#" class="list-group-item list-group-item-action active"> {{$lista->nombre}}</a>
                    </div>
                     <div class="col-1">
                             @if(Auth::user() == $perfil)
                            <a id="tachoTitulo" href="{{route('borrarLista',['id'=>$lista->id])}}"> 
                                <i class="fas fa-trash-alt fa-lg"></i> 
                            </a>
                            @endif
                        </div>
                        </div>
                        <div class="list-group-item">
                       
                            @foreach($recetas as $receta)
                               @if($receta->listaId->nombre == $lista->nombre)
                            <div class="row">
                            <div class="col-11">
                              <a href="{{route('receta',['nombre'=>$receta->nombre])}}">  <h4 id="nombreReceta" class="list-group-item-heading">   
                                   {{$receta->nombre}}</h4>
                                </a>
                                <?php $count++ ?>
                                </div> 
                            <div class="col-1">
                             @if(Auth::user() == $perfil)
                            <a  id="tacho" href="{{route('borrarReceta',['nombre'=>$receta->nombre])}}"> 
                                <i class="fas fa-trash-alt fa-lg"></i> 
                            </a>
                            @endif
                            </div>  
                            </div> 
                            <hr>
                              @endif
                           @endforeach
                        
                       
                        </div>
                        <div class="list-group-item justify-content-between">
                        Total: <span class="badge badge-secondary badge-pill">{{$count}}</span>
                        @if(Auth::user() == $perfil) 
                             <button class="float-right btn " type="button" data-toggle="modal" data-target="#modalForm"  onClick="cargarModal({{$lista}})"> 
                                 Agregar receta a la lista </button>
                         @endif
                        </div>
                    <br> 
                     
                    
                   
                       
                </div> 
                <br>
                @endforeach   
                    <a href="#" class="list-group-item list-group-item-action active justify-content-between">Total <span class="badge badge-light badge-pill">{{$count }}</span></a>
                    @if(Auth::user() == $perfil) 
                    <button class="float-right btn " type="button" data-toggle="modal" data-target="#modalLista" > 
                        Agregar lista </button>
                      @endif
                </div>
              
            </div>
        </div>
    </div>
</div>
</div>
</div>

</body>
<!-- Modal -->
@include('modalRecetas')
@include('modalLista')


<!--
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
-->
<script src="{{ asset('/js/editarPerfil.js') }}"></script>
<link defer rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
@stop