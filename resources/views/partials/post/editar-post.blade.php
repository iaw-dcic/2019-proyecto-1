 <!-- Modal -->
<div class="modal fade" id="editar-post-modal" tabindex="-1" role="dialog" aria-labelledby="editar-post-label" aria-hidden="true" style="z-index: 1050;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editar-post-label">Editar post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="posts/{{$post->id}}" id="form-crear-post" autocomplete="off">
            @csrf
            <input type="hidden" value="PUT" name="_method">
            <div class="modal-body">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Descripción del post" maxlength="240" id="descripcion" name="descripcion" value="{{$post->description}}" required>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="public" id="publico" <?php if($post->public) echo 'checked' ?>>
                        <label class="form-check-label" for="hacer-publico">Hacer público</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Editar post</button>
            </div>
        </form>
      </div>
    </div>
  </div>
