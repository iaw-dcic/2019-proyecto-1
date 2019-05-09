@if(Auth::user() != null && Auth::user() == $user)
<div class="modal fade" id="editarPerfil" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!--action="/user/$user->id/edit"-->
            <form method="POST" data-url="/user/{{Auth::user()->username}}" autocomplete="off" id="form_editar_perfil">
            {{ csrf_field() }}
            <!--Body-->
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" value="{{$user->username}}" name="username" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Nombre" value="{{$user->name}}" name="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" placeholder="E-mail" value="{{$user->email}}" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="tel" class="form-control" placeholder="Teléfono" value="{{$user->phone}}" name="phone">
                    </div>
                    <div class="form-group mb-3">
                        <label for="biography-textarea"></label>
                        <textarea class="form-control" name="biography" placeholder="Biografía" id="biography-textarea" value="{{$user->biography}}" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-danger" id="btn-borrar-perfil">Borrar perfil</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cerrar-editar-perfil">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btn-editar-perfil">Guardar cambios</button>
                </div>
            </form>

            <form method="POST" action="/user/{{Auth::user()->id}}" id="form-borrar-perfil">
                @csrf
                <input type="hidden" value="DELETE" name="_method">
            </form>
        </div>
    </div>
</div>
@endif
