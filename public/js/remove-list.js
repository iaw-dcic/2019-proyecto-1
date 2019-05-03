$('button#deleteButton').on('click', function(e){
    var name = $(this).data('id');
    e.preventDefault();
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Se eliminará la lista definitivamente",
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminarla!'
      }).then((result) => {
        if (result.value) {
          $(this).closest("form").submit();
        }
      })
}
)