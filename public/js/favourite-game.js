$('#favGameModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) 
    var favGame= button.data('favgame');
 
    var modal = $(this)
    modal.find('.modal-body #favourite_game').val(favGame);
  })