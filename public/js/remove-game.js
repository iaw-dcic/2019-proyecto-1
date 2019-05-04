$('button#deleteGameButton').on('click', function(e){
    e.preventDefault();
    Swal.fire({
        title: '¿Estás seguro?',
        text: "El juego se eliminará",
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminarlo!'
      }).then((result) => {
        if (result.value) {
          $(this).closest("form").submit();
        }
      })
}
)