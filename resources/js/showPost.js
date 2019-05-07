const Swal = require('sweetalert2');

//evento AJAX y consulta GET al servidor para obtener la vista para el model
async function getView(url, callback){
    await $.ajax({
        url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (response) => callback(response)
    });
}

function mostrarAlerta(){
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'No podrás recuperarlo una vez eliminado',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Borrar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.value) {
            Swal.fire('Eliminado!', 'El post ha sido eliminado.', 'success');
            $('#form-borrar-post').submit();
        }else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire('Cancelado','El post no ha sido eliminado','error');
        }
        });
}

let eventoComentarios = (event) => {
    event.preventDefault();
    var comments = require('./comments');
    comments.agregarComentario(event.srcElement);
};

//Una vez que obtiene la vista, la muestra
async function showPost(post){
    await getView(`/posts/${post.id}`, (response) => {
        $('#ver-post').append(response);
        $('#modal-post').modal();

        var form_agregar_comentario = document.getElementById('form-agregar-comentario');
        form_agregar_comentario.addEventListener('submit', eventoComentarios);

        $('#modal-post').on('hidden.bs.modal', (event) => {
            var btn = document.getElementById('form-agregar-comentario');
            btn.removeEventListener('submit', eventoComentarios);
            $('#ver-post').empty();
        });

        $('#btn-borrar-post').on('click', (event) => {
            event.preventDefault();
            mostrarAlerta(event);
        });
    });
}

//Asigna el evento onClick a todos los elementos .posts
$('.posts').each((index, element) => {
    $(element).on('click', async () => {
        let post = $(element).data('post');
        await showPost(post);
    });
});
