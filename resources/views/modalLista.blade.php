<div class="modal fade" id="modalLista" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Agregar Lista</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
              
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form" method="post" action="{{route('agregarLista',['id_autor' =>$perfil->id ])}}">
                {{ csrf_field() }}
                     
                    <div class="form-group">
                        <label for="inputName">Nombre</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre de la receta"/>
                    </div>
                    
                     
                    <br><br>

                    <button id="botonAgregar" class="btn btn-primary float-right"   >Agregar</button></div>
                </form>
            </div>
            
           
        </div>
    </div>
</div>
