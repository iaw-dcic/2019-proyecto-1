function readFile(input) {
    for(let i = 0; i < input.files.length; i++) {
        let reader = new FileReader();
        reader.onload = (event) => {
            let filePreview = document.createElement('img');
            filePreview = `<img src="${event.target.result}" class="col img-fluid">`
            $('#file-preview-zone').append(filePreview);
            $(`#file-preview-${i}`).on('click', (event) => {
                $(`#file-preview-${i}`).remove();
            });
        };
        reader.readAsDataURL(input.files[i]);
    }
}

$('#fotos').on('change', (event) => {
    readFile(event.target);
});
