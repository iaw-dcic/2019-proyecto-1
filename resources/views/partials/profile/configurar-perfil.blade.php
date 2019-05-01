@if(Auth::user() != null && Auth::user() == $user)
<div class="modal fade" id="configurarPerfil" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Configurar perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--action="/user/$user->id/edit"-->
            <form method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!--Body-->
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="old-password">Ingrese su contraseña anterior</label>
                        <input type="password" id="old-password" class="form-control" name="old-password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="new-password">Ingrese su nueva contraseña</label>
                        <input type="password" id="new-password" class="form-control" name="new-password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="repeat-password">Repita la nueva contraseña</label>
                        <input type="password" id="repeat-password" class="form-control" name="repeat-password">
                    </div>
                    <div class="form-group mb-3 d-flex justify-content-end">
                        <a href="#" id="btn-ocultar-perfil">Ocultar perfil</a>
                        <a href="#" id="btn-eliminar-perfil">Eliminar perfil</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn-configurar-perfil">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
