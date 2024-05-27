let resultadosNotificaciones = document.getElementById('resultadosNotificaciones');
console.log(nombre);
console.log(id_usuario);
let inputFavo = document.getElementById('inputFavo');

inputFavo.addEventListener('click', mandarFavoritos);

function mandarFavoritos() {
    let urlFavoritos = "../favoritos/favoritos.php?id_usuario=" + id_usuario + "&nombre=" + nombre;
    // Redirige a la nueva URL
    window.location.href = urlFavoritos;
}
//----------------------------------------------------------
window.addEventListener('load', recogerDatosPerfiles);

//Esta funcion se encarga de llamar por fetch a un archivo en la carpeta datosRegistros
//para pasarlos tratarlos y llamar a la funcion buscarDatosPerfiles()
function recogerDatosPerfiles() {
    fetch("../datosRegistros/notificaciones/usuario-" + id_usuario + ".json")
        .then(res => res.json())
        .then(res => {
            console.log(res);
            console.log("Mostrar datos fetch");
            generarNotificaciones(res);
        })
        .catch(error => {
            console.error('Error al cargar los datos JSON:', error);
        });
}
function generarNotificaciones(array) {
    let textoRes = "";
    for (let i = 0; i < array.length; i++) {
        console.log(array[i]);
        if (array[i].leido == false) {
            console.log("ENTRA");
            textoRes += ""
                + "<div class='notificacionContainer'>"
                + "<div class='titulo'>"
                + "   <h2 id='titulo'>" + array[i].titulo + "</h2>"
                + "</div>"
                + "<div class='contenido'>"
                + "<p>" + array[i].contenido + "</p>"
                + "</div>"
                + "<div class='abajo'>"
                + "    <div class='fecha'>"
                + "        <p>" + array[i].fecha + "</p>"
                + "    </div>"
                + "    <div class='checkbox'>"
                + "        <label class='container' for='aceptar'>"
                + "            <input id='aceptar' type='checkbox' onclick='eliminarNotificacion(" + id_usuario + " , " + i + ")' name='leido'" + i + "'>"
                + "        </label>"
                + "        <label>Leido</label>"
                + "    </div>"
                + "</div>"
                + "</div>";
        }
    }
    resultadosNotificaciones.innerHTML += textoRes;
}
function eliminarNotificacion(id_usuario, posicionArray) {

    console.log("La posicion del array es: " + posicionArray);
    $.ajax({  //Hacemos una petición ajax para enviar la id
        //Especificamos la url a la que queremos enviar la variable
        url: "eliminarNotificacion.php",
        //Definimos el método por el que queremos enviarla
        type: "POST",
        //Especificamos en data las variable que queremos pasar por POST y cual es su valor
        data: {
            posicion: posicionArray,
            idPropio: id_usuario
        },
        success: function (response) {
            // Aquí puedes manejamos la respuesta del servidor en caso de exito
            console.log(response);
            //Forzamos la recarga de la página para mostrar los datos actualizados
            location.reload();
        },
        error: function (xhr, status, error) {
            // Aquí puedes manejar los errores de la solicitud AJAX
            console.error(error);
        }
    });
}