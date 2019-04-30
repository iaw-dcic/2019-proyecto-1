




$('#inputSearch').typeahead({

    source:  function (term , process) {
        return $.get('/search/playlist', {term: term}, function (data) {

            $('#carousel-results').hide();
            $('#ajax').html(data.html);
            $('#ajax').show();
        });
    }
})

/*

$('#inputSearch').typeahead({
    source:  function (term , process) {
        return $.get('/autocomplete/playlist', { term: term } , function (data) {
            return process(data);
        });
    }
});

*/

$('#inputNombre').typeahead({
    source:  function (term , process) {
        return $.get('/autocomplete/songName', { term: term } , function (data) {
            return process(data);
        });
    }
});

$('#inputArtista').typeahead({
    source:  function (term , process) {
        return $.get('/autocomplete/artist', { term: term } , function (data) {
            return process(data);
        });
    }
});

$('#inputAlbum').typeahead({
    source:  function (term , process) {
        return $.get('/autocomplete/album', { term: term } , function (data) {
            return process(data);
        });
    }
});

