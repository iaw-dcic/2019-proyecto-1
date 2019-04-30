function register() {

    var data = new FormData();

    data.append('name', $('#inputName').val() );
    data.append('username', $('#inputUsername').val() );
    data.append('birthday', $('#inputBirthday').val() );
    data.append('prefered_genre', $('#inputGeneroPreferido').val() );
    data.append('gender', $('.form-check-input:checked').val());
    data.append('email', $('#inputEmail').val() );
    data.append('password', $('#inputPassword').val());

    jQuery.ajax({
        url: '/user/register',
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
            alert('Usuario registrado con exito.');
        }
    });

}

function update() {

    var data = new FormData();

    data.append('name', $('#name').val() );
    data.append('username', $('#username').val() );
    data.append('birthday', $('#birthday').val() );
    data.append('prefered_genre', $('#prefered_genres').val() );
    data.append('gender', $('#inputGender').val());
    data.append('email', $('#email').val() );

    jQuery.each(jQuery('#inputFile')[0].files, function(i, file) {
        data.append('imagen-'+i, file);
    });

    $.post({
        url: '/user/update',
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
            alert('Usuario actualizado con exito.');
        }
    });

}



