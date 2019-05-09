async function ajaxEditarPerfil(method, url, parametros, callback){
    return await $.ajax({
        type: method,
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

function mostrarAlerta(){
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'No podrás recuperar la cuenta una vez eliminada',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Borrar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.value) {
            Swal.fire('Eliminada!', 'La cuenta ha sido eliminada.', 'success');
            $('#form-borrar-perfil').submit();
        }else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire('Cancelado','La cuenta no ha sido eliminada','error');
        }
        });
}

function readFile(input){
    let reader = new FileReader();
    reader.onload = (event) => {
        let src_image = event.target.result;
        $('#foto-perfil-grande').attr("src",src_image);
    };
    reader.readAsDataURL(input.files[0]);
}

$('#nueva_foto_perfil').on('change', (event) => {
    readFile(event.target);
});

$('#btn-borrar-perfil').on('click', (event) => {
    mostrarAlerta();
})

$('#form_cambiar_foto_perfil').on('submit', function (event) {
    event.preventDefault();
    let parametros = new FormData($(this)[0]);
    let url = $(event.target).data('url');
    let method = 'POST';

    ajaxEditarPerfil(method, url, parametros, (request) => {
        let imagen_perfil = request;
        $('#btn-cerrar-foto-perfil').click();

        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];

        $('#foto_perfil_usuario').attr("src", baseUrl+"storage/users/"+imagen_perfil);
        $('#foto_perfil_navbar').attr("src", baseUrl+"storage/users/"+imagen_perfil);
    });
});

$('#form_editar_perfil').on('submit', function(event) {
    event.preventDefault();
    let parametros = new FormData($(this)[0]);
    let url = $(event.target).data('url');
    let method = 'POST';

    ajaxEditarPerfil(method, url, parametros, (request) => {
        $('#btn-cerrar-editar-perfil').click();
        $('.info-perfil p.name').text(request.name);
        $('.info-perfil p.username').text('@'+request.username);
        $('.info-perfil p.biography').text(request.biography);
    });
});
