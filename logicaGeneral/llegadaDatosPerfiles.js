//declaramos variables y constantes
let resultadosPerfiles = document.getElementById('resultadosPerfiles');
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
            + "<div class='perfil'><button class='btnPerfil' onclick='' >Ver perfil</button></div>"
            + "<div id='btnFavoritoContainer' class='btnFavorito' onclick='obtenerId(" + resultados[i].id_usuario_relacionado + ")'></div>"
            + "</div>"
            + "</div>";

        // Cargar contenido del archivo PHP en el contenedor
        $.get('./elementos/btnFavorito.php', function (data) {
            $('.btnFavorito').html(data);

        });
        //+ "<li><button id='ficha' onclick='mostrarFicha(" + allPokemons[i].id + ")'>Ver ficha</button></li></ul></div>";
    }

    resultadosPerfiles.innerHTML += textoRes;


}
// function recogerIdFavorito(id_usuarioFavorito) {
//     console.log("El id del usuario seleccionado es:"+id_usuarioFavorito);
//     window.location.href = "perfil/agregarFavorito.php?idFavorito=" + id_usuarioFavorito;
// }

function obtenerId(idCogido) {
    console.log(idCogido);
    //window.location.href = "perfil/agregarFavorito.php?idFavorito=" + idCogido;

    $.ajax({  //Hacemos una petición ajax para enviar la id
        //Especificamos la url a la que queremos enviar la variable
        url: "perfil/agregarFavorito.php",
        //Definimos el método por el que queremos enviarla
        type: "POST",
        //Especificamos en data las variable que queremos pasar por POST y cual es su valor
        data: {
            idFavorito: idCogido,
            idPropio : idUsuario
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
