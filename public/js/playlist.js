

function onVisibilityChange(id) {

    var data = new FormData();

    data.append('visibility', $('#inputVisibilidad').val());
    data.append('id', id);

    jQuery.ajax({
        url: '/playlist/visibility',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(data){

        }
    });


}

function storePlaylist() {

    var data = new FormData();

    data.append('nombre', $('#inputNombre').val() );
    data.append('visibilidad', $('#inputVisibilidad').val() );
    data.append('spotify_url', $('#inputSpotifyURL').val());

    jQuery.each(jQuery('#inputFile')[0].files, function(i, file) {
        data.append('imagen-'+i, file);
    });

    jQuery.ajax({
        url: '/playlist/store',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(data){
            alert('Playlist Creada Exitosamente.');
        }
    });

}

function deletePlaylist(id) {
    var item = $('#playlist-item-'+id);

    $.get('playlist/delete/'+id, function (data) {
        item.empty();
        $('#modal-eliminar-'+id).modal('dispose');
    })
}

