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
                    <form id="form-editar-perfil" enctype="multipart/form-data" accept-charset="UTF-8" role="form" method="POST" action="{{route('actualizar',['id'=>$perfil->id])}}"  >
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
                     <div class="row" id="botonImagen">

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
            @if(Auth::user()==$perfil)
                @include('listasUsuario')
            @elseif(Auth::user()!=$perfil)
                 @include('listasOtro')
            @endif
           
          
            

</div>
</div>
 
</body>
<!-- Modal -->
@include('modalRecetas')


@if(Session::has('status'))        
<script>
$(function() {
    $('#modalIngredientes').modal('show');
    });
</script>
@endif

<!--
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
-->

<link defer rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
@stop