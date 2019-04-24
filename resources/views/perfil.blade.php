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
           
               
         <!-- Lado derecho, las listas del usuario -->  
            <div class="col-md-8">
                <div class="list-group">
                     
                  <?php  $count=0 ?>
          
                     @foreach($listas as $lista)
                      
                     <a href="#" class="list-group-item list-group-item-action active"> {{$lista->nombre}}</a>
                        <div class="list-group-item">
                       
                            @foreach($recetas as $receta)
                               @if($receta->listaId->nombre == $lista->nombre)
                              <a href="{{route('receta',['nombre'=>$receta->nombre])}}">  <h4 id="nombreReceta" class="list-group-item-heading">   
                                   {{$receta->nombre}}</h4>
                                </a>
                                <?php $count++ ?>
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
                    @endforeach     
                    
                   
                       
                    </div> 
                    <a href="#" class="list-group-item list-group-item-action active justify-content-between">Total <span class="badge badge-light badge-pill">{{$count }}</span></a>
                    <button class="float-right btn " type="button" data-toggle="modal" data-target="#modalLista" > 
                        Agregar lista </button>
               
                </div>
              
            </div>
        </div>
    </div>
</div>
</div>
</div>

</body>
<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Agregar Receta</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
              
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" method="post" action="{{route('agregarReceta',['id_autor' =>$perfil->id ])}}">
                {{ csrf_field() }}
                     <div class="form-group">
                        <label   for="inputName">Lista</label>
                        <select class="form-control" id="selectLista" name="lista" disabled >
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Nombre</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre de la receta"/>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Categoria:</label>
                        <select name="categoria" class="form-control">
                            <option value="1">Dulce </option>
                            <option value="0">Salado </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Decripción:</label>
                        <textarea name="descr" class="form-control"  placeholder="Descripcion de la receta"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Pasos:</label>
                        <textarea name="pasos" class="form-control"   placeholder="Pasos de la receta"></textarea>
                    </div>
                    <div class="row">
                      <div class="col-6">
                            <div class="form-group">  
                             <label for="inputMessage">Ingrediente:</label>
                             <select name="ingrediente"class="form-control">
                              @foreach($ingredientes as $ingrediente)
                                <option value="{{$ingrediente->id}}">{{$ingrediente->nombre}} </option>
                               @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                              <div class="col-6">
                                 <div class="form-group">  
                                     <label for="inputMessage">Cantidad:</label>
                                    <input name="cantidad" type="text" class="form-control" placeholder="">
                                  </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">  
                                     <label for="inputMessage">Medida:</label>
                                     <select name="medida"class="form-control">
                                        @foreach($medidas as $medida)
                                          <option value="{{$medida->id}}">{{$medida->nombre}} </option>
                                         @endforeach
                                      </select>
                                  </div>
                              </div>
                        </div></div>

                    </div>
                    <button id="botonAgregar" class="btn btn-primary" >Agregar</button></div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!--
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
-->
<script src="{{ asset('/js/editarPerfil.js') }}"></script>
@stop