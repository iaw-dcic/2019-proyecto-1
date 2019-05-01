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

        var btn = document.getElementById('form-agregar-comentario');
        btn.addEventListener('submit', eventoComentarios);

        $('#modal-post').on('hidden.bs.modal', (event) => {
            var btn = document.getElementById('form-agregar-comentario');
            btn.removeEventListener('submit', eventoComentarios);
            $('#ver-post').empty();
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
