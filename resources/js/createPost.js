async function ajaxCrearPost(url, parametros, callback){
    return await $.ajax({
        type: 'POST',
        url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: parametros,
        contentType: false,
        processData: false,
        success: (response) => callback(response)
    });
}

function readFile(input) {
    for(let i = 0; i < input.files.length; i++) {
        let reader = new FileReader();
        reader.onload = (event) => {
            let filePreview = document.createElement('img');
            filePreview = `<a href="#" id="file-preview-${i}"><img src="${event.target.result}" class="col img-fluid"><i class="fas fa-ban"></i></a>`
            $('#file-preview-zone').append(filePreview);
            $(`#file-preview-${i}`).on('click', (event) => {
                $(`#file-preview-${i}`).remove();
            });
        };
        reader.readAsDataURL(input.files[i]);
    }
}

function addPost(username, post){
    $('#contenido-actividad').prepend(`
        <article class="col-12 col-md-5 col-lg-2 posts" data-target="#modal-post" data-post="${post}">
            <figure data-toggle="modal">
                <img class="img-fluid img-thumbnail" src="/storage/photos/${post.photo_url}">
                <figcaption>
                    <h2>&#64${username}</h2>
                    <i class="far fa-heart"></i>
                    <i class="far fa-comment"></i>
                    <p>${post.descripcion}</p>
                </figcaption>
            </figure>
        </article>
    `);
}

$('#fotos').on('change', (event) => {
    readFile(event.target);
});

$('#form-crear-post').on('submit', function (event) {
    event.preventDefault();
    let parametros = new FormData($(this)[0]);
    let url = $(event.target).data('url');
    ajaxCrearPost(url, parametros, (request) => {
        let username = request.username;
        let post = request.post;
        $('#btn-cerrar-crear-post').click();
        addPost(username,post);
    });
});
