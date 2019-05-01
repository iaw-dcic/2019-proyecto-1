async function checkEmailAndPassword(user, pass, url, callback){
    await $.ajax({
        method: 'POST',
        url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            name: 'service',
            email,
            pass
        },
        success: (response) => callback(response)
    });
}

//LOGIN
var email = '#validationEmailLogin';
var pass = '#validationPasswordLogin';

function corregirDatos(){

}

function checkLogin(){
    checkEmailAndPassword($(email).val(), $(pass).val(), '/login/verifyEmailAndPassword', (response) => {
        if(!response.exists){
            $(email).addClass('is-invalid');
            $(pass).addClass('is-invalid');
            $('#invalid-email-pass').show().removeClass('hide');
        }else{
            $('#invalid-email-pass').hide().addClass('hide');
        }
    });
}

function validateLogin(inputs){
    for(let i=0; i<inputs.length; i++)
        if(!$(inputs[i]).hasClass('is-invalid'))
            return false;
    return true;
}

function initListeners(){
    $('#btn_login').click((event) => {
        checkLogin();
        if(validateLogin([email, pass])){
            corregirDatos();
        }else
            event.preventDefault();
    });
}

//initListeners();
