async function checkData(input, url, callback){
    await $.ajax({
        method: 'POST',
        url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            name: 'service',
            val_input: $(input).val()
        },
        success: (response) => callback(response, input)
    });
}

function checkText(input){
    let nombre = $(input).val();
    if(nombre.length > 0)
        $(input).addClass('is-valid').removeClass('is-invalid');
    else
        $(input).addClass('is-invalid').removeClass('is-valid');
}

function checkPassword(input){
    let password = $(input).val();
    if(password.length >= 6 && password.length <= 24){
        $(input).addClass('is-valid').removeClass('is-invalid');
    }else{
        $(input).addClass('is-invalid').removeClass('is-valid');
    }
}

function checkUsername(response, input){
    let nombre = $(input).val()
    if(nombre.length <= 3 || response.exists == true)
        $(input).addClass('is-invalid').removeClass('is-valid');
    else
        $(input).addClass('is-valid').removeClass('is-invalid');

}

function checkEmail(response, input){
    let email = $(input).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    if(email.length == 0 || !caract.test(email) || response.exists == true)
        $(input).addClass('is-invalid').removeClass('is-valid');
    else
        $(input).addClass('is-valid').removeClass('is-invalid');
}

var password = '#validationPassword';
var name = '#validationFirstName';
var username = '#validationServerUsername';
var email = '#validationServerEmail';

function corregirDatos(){

}

function checkRegister(){
    checkData(username, '/register/verifyUsername', checkUsername);
    checkData(email, '/register/verifyEmail', checkEmail);
    checkPassword(password);
    checkText(name);
}

function validateRegister(inputs){
    for(let i=0; i<inputs.length; i++)
        if(!$(inputs[i]).hasClass('is-valid'))
            return false;
    return true;
}

function initListeners(){
    $(password).keyup(e => checkPassword(password));
    $(name).keyup(e => checkText(name));
    $(username).keyup(e => {
        checkData(username, '/register/verifyUsername', checkUsername);
    });
    $(email).keyup(e => {
        checkData(email, '/register/verifyEmail', checkEmail);
    });

    $('#btn_signup').click((event) => {
        checkRegister();
        if(validateRegister([password, name, email, username]))
            corregirDatos();
        else
            event.preventDefault();
    });
}

initListeners();
