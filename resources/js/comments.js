async function envioAjax(url, content, username, callback){
    return await $.ajax({
        method: 'POST',
        url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            name: 'service',
            content,
            username
        },
        success: (response) => callback(response)
    });
}

export async function agregarComentario(form){
    var content = $(form.content).val();
    var username = $(form.username).val();
    var url = $(form).data('url');
    envioAjax(url, content, username, (response) => {
        $('.comentarios').append(
            `<p class="col-12 comentario">
                <a href="/user/${response.comment.user_id}">${response.username}</a>
                ${response.comment.content}
            </p><br>`);
        let contador = parseInt($('#contador-comentarios span').text(), 10);
        $('#contador-comentarios span').text(`${contador+1}`);
        $(form.content).val('');
    });
}
