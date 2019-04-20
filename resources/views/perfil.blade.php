@extends('layout')
 
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

                <div class="col-md-6"style="background-color: lightgray">
                <dl>
                    <dt>
                       Nombre: 
                    </dt>
                   
                         <dd id="perfil.nombre">
                        {{$perfil->nombre}}
                           </dd>
                           
                    @if($perfil->apellido !=null)
                     <dt>
                        Apellido
                    </dt>
                    <dd id="perfil.apellido">
                       {{$perfil->apellido}}
                    </dd>
                     @endif

                    <dt>
                    Email
                    </dt>
                    <dd id="perfil.email">
                    {{$perfil->email}}
                    </dd>
                    <dt>
                       Descripcion (opcional):
                    </dt>
                    <dd id="descripcion">
                    
                    </dd>
                    
                    <dt>
                       Se unio:
                    </dt>
                    <dd>
                    {{$perfil->created_at}}
                    </dd>
                </dl> 
                 <div id="lugarBoton">
                <button id="button" type="button" class="btn btn-success" onclick="editarUsuario({{$perfil}})">
                    Editar
                </button>
                 </div>
                 </div>
              
            
                
            </div>    
            </div> 
               
         <!-- Lado derecho, las listas del usuario -->  
            <div class="col-md-8">
                <div class="list-group">
                     
                  <?php  $count=0 ?>
          
                     @foreach($listas as $lista)
                      
                     <a href="#" class="list-group-item list-group-item-action active"> {{$lista->nombre}}</a>
                        <div class="list-group-item">
                        <h4 class="list-group-item-heading">
                            @foreach($recetas as $receta)
                               @if($receta->listaId->nombre == $lista->nombre)
                                   {{$receta->nombre}}
                              @endif
                           @endforeach
                        </h4>
                        <?php $count++ ?>
                        </div>
                       
                    @endforeach     
                    
                    <div class="list-group-item justify-content-between">
                        Total: <span class="badge badge-secondary badge-pill">{{$count}}</span>

                    </div>
                    <br>
                       
                    </div> <a href="#" class="list-group-item list-group-item-action active justify-content-between">Total <span class="badge badge-light badge-pill">{{$count }}</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{ asset('/js/editarPerfil.js') }}"></script>
</body>
