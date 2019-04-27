<?php  $count=0 ?>
  <!-- Lado derecho, las listas del usuario -->  
 
   
   <div class="col-md-8">
   @if ($errors->any())
    <div class="alert alert-danger">
    <h4> Corrige los errores: </h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      @foreach($listas as $lista)
         <div class="list-group">
           <?php  $count=0 ?>
              <a href="#" class="list-group-item list-group-item-action active"> {{$lista->nombre}}</a>
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
                                   
                                      <a  class="tacho" href="{{route('borrarReceta',['nombre'=>$receta->nombre])}}"
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
                         
          <a class="tachoTitulo" href="{{route('borrarLista',['id'=>$lista->id])}}"
          onclick="return confirm('¿Seguro que deseas eliminar {{$lista->nombre}}?')">
            <i class="fas fa-trash-alt fa-lg"></i> 
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