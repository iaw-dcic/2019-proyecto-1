@if(Auth::user() != null && Auth::user() == $user)
<div class="modal fade" id="cambiarFotoPerfil" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title">Foto de perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--Body-->
            <form method="POST" data-url="/user/{{Auth::user()->username}}" enctype="multipart/form-data" id="form_cambiar_foto_perfil" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <img src="{{ url('storage/users/'.Auth::user()->photo) }}" class="img-fluid" id="foto-perfil-grande">
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col">
                            <div class="custom-file">
                                    <input type="file" class="custom-file-input" value="Buscar foto" id="nueva_foto_perfil" name="photo" aria-describedby="file-input" required>
                                <label class="custom-file-label" for="file-input">Cambiar foto</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cerrar-foto-perfil">Cerrar</button>
                    <button type="submit" class="btn" id="btn-cambiar-foto-perfil">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
