// variable del formulario
let formulario = document.getElementById('formRegistrar');

/*
	Creamos un evento que cuando se cargue el DOM si el usuario pulsa el
	botón de enviar el formulario se active la función validarFormulario
*/
document.addEventListener("DOMContentLoaded", function() {
    formulario.addEventListener('submit', validarFormulario);
});

// Definimos la función de evento validarFormulario
function validarFormulario(evento) {

    // evitamos que se envíe todavía el formulario
    evento.preventDefault();

    // Definir variables
    let email = document.getElementById('correo');
    let password = document.getElementById('password');
    let aceptar = document.getElementById('aceptar');
    let error_correo = document.getElementById('error1');
    let error_password = document.getElementById('error2');
    let error_terminos = document.getElementById('error3');
    let validar = true;
    let correoCorrecto = false;
    let passwordCorrecto = false;
    let aceptado = false;

    // validación email: formato de correo electrónico válido
    if (email.value.trim() === "" || !/^[A-Za-z0-9._-]+\@alumnos.nebrija.es/.test(email.value)) {
        error_correo.innerHTML = 'Introduzca una dirección de correo válida';
        email.style.border = "2px solid red";
        validar = false;
    } else{
        error_correo.innerHTML = '';
        email.style.border = "2px solid #F0FAF1";
        correoCorrecto = true;
    }

    // validación contraseña: formato de contraseña válido
    if (password.value.trim() === "" || !/[A-Z]/.test(password.value) || !/[a-z]/.test(password.value) || !/[0-9]/.test(password.value) || !/[._-]/.test(password.value)) {
        error_password.innerHTML = 'La contraseña debe tener al menos una letra mayúscula, un número y un caracter especial';
        password.style.border = "2px solid red";
        validar = false;
    } else{
        error_password.innerHTML = '';
        password.style.border = "2px solid #F0FAF1";
        passwordCorrecto = true;
    }

    // validación checkbox: que esté seleccionado el botón del checkbox
    if (!aceptar.checked) {
        error_terminos.innerHTML = 'Debe aceptar los términos y condiciones';
        validar = false;
    } else{
        error_terminos.innerHTML = '';
        aceptado = true;
    }

    if(correoCorrecto && passwordCorrecto && aceptado){
        validar = true;
    }

    // si se cumplen todas las validaciones validar=true se envíe el formulario
    if(validar){
        formulario.submit();
    }



}
