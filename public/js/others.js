$( document ).ready(function() {
    $('#birthdate').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
    });

    $('#avatarImage').on('click', function(){
        $('#fileAvatar').trigger('click');
    });

    $("#fileAvatar").change(function(){
        readURL(this);
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#avatarImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}