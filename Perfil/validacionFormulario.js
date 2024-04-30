let formulario = document.getElementById('formulario');
/* 
    Creamos un evento que cuando se cargue el DOM si el usuario pulsa el botón de 
    enviar el formulario se active la función validarFormulario
*/
document.addEventListener("DOMContentLoaded", function () {
    formulario.addEventListener('submit', validarFormulario);
});
function validarFormulario(evento) {
    let validado=false;
    //Variables para los inputs
    const nombre = document.getElementById('input-nombre');
    const apellido = document.getElementById('input-apellido');
    const nacimiento = document.getElementById('input-nacimiento');
    const curso =document.getElementById('curso');
    const definicion =document.querySelectorAll('#input-definicion');

    //Variables para las etiquetas <p> con los errores
    const errorNombre = document.getElementById('error-nombre');
    const errorApellido = document.getElementById('error-apellido');
    const errorFecha = document.getElementById('error-date');
    const errorDefinicon = document.getElementById('error-definicion');
    errorNombre.innerHTML="";
    errorApellido.innerHTML="";
    errorFecha.innerHTML="";
    errorDefinicon.innerHTML="";
}