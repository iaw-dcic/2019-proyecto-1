<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Agregar Receta</h4>
              
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
              
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form id="miForm" role="form" method="post" action="{{route('agregarReceta',['id_autor' =>$perfil->id ])}}">
                {{ csrf_field() }}
                     <div class="form-group">
                        <label  id="selectLista" for="inputName">Lista</label>
                        
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
                   <hr>
                    
                      
                    </div>
                    <br><br>

                  
         <button type="submit" class="float-right btn " data-backdrop="static"  >  Guardar </button>

                </form>
               
            
            </div>
            
           
        </div>
    </div>
     


</div>

 

<!-- MODAL SIGUIENTE PASO AGREGAR INGREDIENTES -->
<div class="modal fade" id="modalIngredientes" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Agregar Ingredientes</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
              
            </div>

            <div class="modal-body">
            <h2> {{ Session::get('status') }} </h2>
            
            <p class="statusMsg"></p>
                <form id="formIngredientes" role="form" method="post" action="{{route('agregarIngrediente',['nombreReceta' =>  Session::get('status') ])}}" >
                {{ csrf_field() }}
                 <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                        <label for="inputMessage">Ingrediente:</label>
                        <select name="ingrediente" class="form-control">
                            @foreach($ingredientes as $ingrediente)
                            <option value="{{$ingrediente->id}}">{{$ingrediente->nombre}} </option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-3">
                    <div class="form-group">
                        <label for="inputMessage">Medida:</label>
                        <select name="medida" class="form-control">
                            @foreach($medidas as $medida)
                            <option value="{{$medida->id}}">{{$medida->nombre}} </option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-3">
                    <div class="form-group">
                        <label for="inputMessage">Cantidad:</label>
                        <input name="cantidad" type="number" class="form-control" placeholder="Cantidad"/>
                    </div>
                    </div>
                   <hr>
                   </div>
                      
                    </div>
                    <br><br>

                  
         <button type="submit" class="float-right btn " data-backdrop="static"  >  Guardar </button>

                </form>
               
            
            </div>
            
           
        </div>
    </div>
     


</div>
