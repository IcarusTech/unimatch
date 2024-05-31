//declaramos variables y constantes
let resultadosPerfiles = document.getElementById('resultadosPerfiles');
let fichaPerfil = document.getElementById('fichaPerfil');
document.getElementById("fichaPerfil").style.display = "none";
let perfilContainer = document.getElementById('perfilContainer');
console.log("ESta es mi lista de favoritos: " + stringFavoritos);
let arrayFavoritos = stringFavoritos.split(",");
console.log(arrayFavoritos);
//----------------------------------------------------------------------------

console.log(idUsuario);
console.log(nombre);
//----------------------------------------------------------------------------
//Le decimos al sistema que al cargar ejecute automáticamente la funcion de abajo
window.addEventListener('load', recogerDatosPerfiles);

//Esta funcion se encarga de llamar por fetch a un archivo en la carpeta datosRegistros
//para pasarlos tratarlos y llamar a la funcion buscarDatosPerfiles()
function recogerDatosPerfiles() {
    fetch("datosRegistros/datos.json")
        .then(res => res.json())
        .then(res => {
            console.log(res);
            console.log("Mostrar datos fetch");
            buscarDatosPerfiles(res);
        })
        .catch(error => {
            console.error('Error al cargar los datos JSON:', error);
        });
}

//Esta funcion se encarga de recorrer el json obtenido en la aterior funcion
// y hacer un fetch de la url de cada perfil dentro para obtener todos los campos de cada perfil
function buscarDatosPerfiles(array) {
    //Creamos un array de "promesas",cada promesa es un fech de cada objeto dentro del array
    const promesas = array.map(obj => fetch("unimatch/" + obj.url)
        //Hacemos fetch de la url para obtener los datos requeridos
        .then(res => res.json())
        .then(res => {
            return res;
        })
        .catch(error => {
            console.error(`Error al cargar datos de ${obj.url}:`, error);
        }));
    //Mediante promise.all() esperamos a que todas las promesas esten resueltas (completadas)
    Promise.all(promesas)
        //Cundo han cargado todos los datos le pasamos el array de promesas con todos los datos
        .then(resultados => {
            //Mostramos los resultados por consola en la variable resultados (antes llamada promises)
            console.log('Todos los datos cargados:', resultados);
            generarPerfiles(resultados);
        })
        .catch(error => {
            console.error('Error al cargar todos los datos:', error);
        });
}
function generarPerfiles(resultados) {
    let textoRes = "";
    for (let i = 0; i < resultados.length; i++) {
        if (resultados[i].id_usuario_relacionado != idUsuario /* && !arrayFavoritos.includes(resultados[i].id_usuario_relacionado) */) {


            let curso = resultados[i].curso.replaceAll("-", " ");
            let amistad = resultados[i].tipo_de_amistad_buscada.replaceAll("-", " ");

            console.log(resultados[i].ruta_img);
            textoRes += ""
                + "<div class='persona'>"
                + "<div class='imagen'><img src='" + resultados[i].ruta_img + "' alt='" + resultados[i].nombre + "'></div>"
                + "<div class ='datos' id='cajaDatos'>"
                + "<ul>"
                + "<li>Nombre: <div class='valor'>" + resultados[i].nombre + "</div></li>"
                + "<li>Curso: <div class='valor'>" + curso + "</div></li>"
                + "<li>Amistad buscada: <div class='valor'>" + amistad + "</div></li>"
                + "</ul>"
                + "</div>"
                + "<div class='botones'>"
                + "<div class='perfil'><button class='btnPerfil' onclick='mostrarPerfil(" + JSON.stringify(resultados[i]) + ")' >Ver perfil</button></div>"
                + "<div id='btnFavoritoContainer" + i + "' class='btnFavorito' onclick='obtenerId(" + resultados[i].id_usuario_relacionado + "," + i + ")'></div>"
                + "</div>"
                + "</div>";

            // Cargar contenido del archivo PHP en el contenedor
            $.get('./elementos/btnFavorito.php', function (data) {
                $('.btnFavorito').html(data);
            });
        }
    }

    resultadosPerfiles.innerHTML += textoRes;


}
/* function recogerIdFavorito(id_usuarioFavorito) {
    console.log("El id del usuario seleccionado es:"+id_usuarioFavorito);
    window.location.href = "perfil/agregarFavorito.php?idFavorito=" + id_usuarioFavorito;
} */

function obtenerId(idCogido, idDiv) {
    console.log(idCogido);
    let divCorazon = document.getElementById('btnFavoritoContainer' + idDiv);
    let heartContainer = divCorazon.querySelector('.heart-container');
    // Obtener el input dentro del div por su clase
    let inputFavorito = heartContainer.querySelector('.checkbox');
    /*  heartContainer.forEach((button => {
     })); */
    console.log(inputFavorito)
    if (inputFavorito && inputFavorito.checked) {
        $.ajax({  //Hacemos una petición ajax para enviar la id
            //Especificamos la url a la que queremos enviar la variable
            url: "favoritos/agregarFavorito.php",
            //Definimos el método por el que queremos enviarla
            type: "POST",
            //Especificamos en data las variable que queremos pasar por POST y cual es su valor
            data: {
                idFavorito: idCogido,
                idPropio: idUsuario
            },
            success: function (response) {
                // Aquí puedes manejar la respuesta del servidor
                console.log(response);
            },
            error: function (xhr, status, error) {
                // Aquí puedes manejar los errores de la solicitud AJAX
                console.error(error);
            }
        });
    }
    else {
        $.ajax({  //Hacemos una petición ajax para enviar la id
            //Especificamos la url a la que queremos enviar la variable
            url: "favoritos/eliminarFavorito.php",
            //Definimos el método por el que queremos enviarla
            type: "POST",
            //Especificamos en data las variable que queremos pasar por POST y cual es su valor
            data: {
                idFavorito: idCogido,
                idPropio: idUsuario
            },
            success: function (response) {
                // Aquí puedes manejar la respuesta del servidor
                console.log(response);
            },
            error: function (xhr, status, error) {
                // Aquí puedes manejar los errores de la solicitud AJAX
                console.error(error);
            }
        });
    }
}
function mostrarPerfil(datosPerfil) {
    let datos = "";
    console.log(datosPerfil);
    datos += "<div id='fotoPerfil' >"
     +"<img src='" + datosPerfil.ruta_img + "' alt='" + datosPerfil.nombre + "'></div>"
        +"<div id='textoA'><ul>"
        + "<li>Nombre: " + datosPerfil.nombre + "</li>"
        + "<li>Apellido: " + datosPerfil.apellido + "</li>"
        + "<li>Fecha de nacimiento: " + datosPerfil.fecha_de_nacimiento + "</li>"
        + "<li>Curso: " + datosPerfil.curso + "</li>"
        + "<li>Genero: " + datosPerfil.genero + "</li>"
        + "<li>Fumador: " + datosPerfil.fumador + "</li>"
        + "<li>Instagram: " + datosPerfil.instagram + "</li>"
        + "</ul></div>"
        + "<div id='textoB'><ul>"
        + "<li>Personalidad: " + datosPerfil.nombre + "</li>"
        + "<li>Amistad buscada: " + datosPerfil.apellido + "</li>"
        + "<li>Planes: " + datosPerfil.fecha_de_nacimiento + "</li>"
        + "<li>Hobbie: " + datosPerfil.curso + "</li>"
        + "<li>Definición: " + datosPerfil.genero + "</li>"
        + "<li>Estilo de musica: " + datosPerfil.estilo_de_musica + "</li>"
        + "</ul></div>"
        + "";
        datos += "</li></ul><button id='cerrarVentana' onclick='cerrarFicha()'>Cerrar ventana</button>";
    fichaPerfil.innerHTML = datos;
    //fondoEstadisticas es una section en el html donde se pondra el div con la tabla y demás
    fichaPerfil.style.display = "flex";
    perfilContainer.style.display = "flex";
    perfilContainer.style.backdropFilter = "blur(5px)";
}
function cerrarFicha(){
    fichaPerfil.style.display = "none";
    perfilContainer.style.display = "none";
    perfilContainer.style.backdropFilter = "none";

}
