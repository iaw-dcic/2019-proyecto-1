$('#favConsoleModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) 
    var favConsole= button.data('favconsole');
 
    var modal = $(this)
    modal.find('.modal-body #favourite_console').val(favConsole);
  })