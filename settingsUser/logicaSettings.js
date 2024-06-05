
console.log(urlImagen);
let mostrar = document.getElementById('mostrarPassword');
let fotoPerfil = document.getElementById('fotoPerfil');
fotoPerfil.src = urlImagen;
mostrar.addEventListener('click', mostrarPassword);

function mostrarPassword() {
    let password = document.getElementById('password');
    if (password.type === "password") {
        password.type = "text";
        mostrar.src = "../img/eye-close.png";
    } else {
        password.type = "password";
        mostrar.src = "../img/eye-open.png";
    }
}
//---------------------------------------------------------------------------
//Parte de la lógica para el formulario delete
let formDelete = document.getElementById('formDelete');
let containerContenido=document.getElementById('containerFormDelete');
let condiciónCumplida = false;
window.addEventListener('load', imprimirBtnDelete);
formDelete.addEventListener('submit', function (event) {
    // Prevenir el evento submit
    event.preventDefault();
});
function imprimirBtnDelete() {
    containerContenido.innerHTML = "";
    let contenido = "";
    contenido += "<div class='input-group' id='btnDeleteContainer'>"
        + "<h2 class='tituloPeligro'>Area de peligro</h2>"
        + "<label for= 'name'> Eliminar usuario </label >"
        + "<div id='btnEliminarPrevio' class='btnEliminarPrevio' onclick='mostrarConfirmacion()'></div>"
        + "</div > ";
    $.get('../elementos/btnEliminar.php', function (data) {
        $('.btnEliminarPrevio').html(data);
    });
    containerContenido.innerHTML = contenido;
}
function mostrarConfirmacion() {
    containerContenido.innerHTML = "";
    let contenido = "";
    contenido +="<h2 class='tituloPeligro'>Area de peligro</h2>"
        + "<div class='containerConfirmacion'>"

        + "</div > ";
    $.get('../elementos/confirmacionEliminar.php', function (data) {
        $('.containerConfirmacion').html(data);
    });
    containerContenido.innerHTML = contenido;
}
function permitirSubmit() {
    formDelete.submit();
}