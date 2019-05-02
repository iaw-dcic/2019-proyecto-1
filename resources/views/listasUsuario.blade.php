<?php  $count=0 ?>
  <!-- Lado derecho, las listas del usuario -->  
  
   
   <div class="col-md-8" style="background:lightblue">
   @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show">
    <h4> Corrige los errores: </h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
    </div>
@endif
      @foreach($listas as $lista)
      {{Session::put('lista', $lista)}}
         <div class="list-group">
           <?php  $count=0 ?>
              <a href="#" class="list-group-item list-group-item-action active" data-toggle="modal" data-target="#cambiarPrivacidad"  onClick="editarPrivacidad({{$lista}})"> {{$lista->nombre}}</a>
                  <div class="list-group-item">
                      @foreach($recetas as $receta)
                         @if($receta->listaId->nombre == $lista->nombre)
                            <div class="row">
                                <div class="col-11">
                                    <a class="nombreReceta" href="{{route('receta',['nombre'=>$receta->nombre])}}">  <h4 class="list-group-item-heading">   
                                         {{$receta->nombre}}</h4>
                                      </a>
                                      <?php $count++ ?>
                                      </div> 
                                  <div class="col-1">
                                   
                                      <a aria-label="borrar {{$receta->nombre}}"   href="{{route('borrarReceta',['nombre'=>$receta->nombre])}}"
                                       onclick="return confirm('¿Seguro que deseas eliminar {{$receta->nombre}}?')">
                                         <i class="fas fa-trash-alt fa-lg"></i> 
                                    
                                        </a>
                                    
                                  </div>  
                                </div> 
                                  <hr>
                            @endif
                        @endforeach
                    </div>
              <div class="list-group-item justify-content-between">
                 Total: <span class="badge badge-secondary badge-pill">{{$count}}</span>
                 <button class="float-right btn " type="button" data-toggle="modal" data-target="#modalForm"  onClick="cargarModal({{$lista}})"> 
                      Agregar receta a la lista </button>
                </div>
              <br> 
          </div> 
             <br>
             <div class="row">
                         
          <a class="float-right btn " id="eliminarLista" type="button" href="{{route('borrarLista',['id'=>$lista->id])}}"
          onclick="return confirm('¿Seguro que deseas eliminar {{$lista->nombre}}?')">
           Eliminar lista
          </a>  
         
            
        </div>
 <hr>
                      @endforeach  
                        @if($count > 0) 
                          <a href="#" class="list-group-item list-group-item-action active justify-content-between">Total <span class="badge badge-light badge-pill">{{$count }}</span></a>
                        @endif
                        

                      
                          <button class="float-right btn "  data-toggle="modal" data-target="#modalLista" > 
                              Agregar lista </button>
                           
                      </div>
                    
                  </div>
              </div>
          
          </div>
          </div>
          
          
          
 @include('modalLista')         
 <div class="modal fade" id="cambiarPrivacidad" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Cambiar Privacidad</h4>
            
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
              
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body" id="formulario">
                <p class="statusMsg"></p>
                @if(Session::get('lista')!=null)
                <form id="formulario" role="form" method="post" action="{{route('cambiarPrivacidad')}}">
                {{ csrf_field() }}
                     
                <div class="form-group">
                        <label id="idlista" for="inputName">Id</label>
                         
                 </div>
                    <div class="form-group">
                        <label for="inputName" id="nombreLis">Nombre</label>
                       
                    </div>
                    <div class="form-group">
                    <label for="inputMessage">Privacidad de la lista:</label>
                        <select name="privacidad" class="form-control">
                            <option value="0">Privada </option>
                            <option value="1">Publica </option>
                        </select>
                    </div>
                    
                     
                    <br><br>

                    <button id="botonAgregar" class="btn btn-primary float-right"   >Cambiar</button></div>
                </form>
                @endif
            </div>
            
           
        </div>
    </div>
</div>
