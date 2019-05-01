@if(Auth::user() != null)
<div class="modal fade" id="crearPost" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title">Crear post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--Body-->
            <form method="POST" data-url="/posts" enctype="multipart/form-data" id="form-crear-post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Descripción del post" maxlength="240" name="descripcion" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" value="Buscar fotos" id="fotos" name="fotos[]" aria-describedby="file-input" multiple="true" required>
                            <label class="custom-file-label" for="file-input">Elegir fotos</label>
                        </div>
                    </div>

                    <!--zona donde se ven las vistas previas y se pueden quitar tambien-->
                    <div class="container-fluid img-vistas-previas">
                        <div id="file-preview-zone" class="row justify-content-center justify-content-md-start">
                        </div>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="true" name="public" id="hacer-publico">
                        <label class="form-check-label" for="hacer-publico">¿Hacer público?</label>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cerrar-crear-post">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btn-publicar-post">Publicar
                        <!--Poner el button en disabled y agregar este código con JQuery
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Subiendo...
                        -->
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
