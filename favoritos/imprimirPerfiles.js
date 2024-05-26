console.log("ESta es mi lista de favoritos: " + stringFavoritos);
let arrayFavoritos = stringFavoritos.split(",");
console.log(arrayFavoritos);
//-----------------------------------------------------------
window.addEventListener('load', recogerDatosPerfiles);
let resultadosPerfiles = document.getElementById('resultadosPerfiles');
//Esta funcion se encarga de llamar por fetch a un archivo en la carpeta datosRegistros
//para pasarlos tratarlos y llamar a la funcion buscarDatosPerfiles()
function recogerDatosPerfiles() {
    fetch("../datosRegistros/datos.json")
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
function buscarDatosPerfiles(array) {
    //Creamos un array de "promesas",cada promesa es un fech de cada objeto dentro del array
    const promesas = array.map(obj => fetch(obj.url)
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
        if (arrayFavoritos.includes(resultados[i].id_usuario_relacionado)) {

            let curso = resultados[i].curso.replaceAll("-", " ");
            let amistad = resultados[i].tipo_de_amistad_buscada.replaceAll("-", " ");

            console.log(resultados[i].ruta_img);
            textoRes += ""
                + "<div class='persona'>"
                + "<div class='imagen'><img src='../" + resultados[i].ruta_img + "' alt='" + resultados[i].nombre + "'></div>"
                + "<div class ='datos' id='cajaDatos'>"
                + "<ul>"
                + "<li>Nombre: <div class='valor'>" + resultados[i].nombre + "</div></li>"
                + "<li>Curso: <div class='valor'>" + curso + "</div></li>"
                + "<li>Amistad buscada: <div class='valor'>" + amistad + "</div></li>"
                + "</ul>"
                + "</div>"
                + "<div class='botones'>"
                + "<div class='perfil'><button class='btnPerfil' onclick='' >Ver perfil</button></div>"
                + "</div>"
                + "</div>";

            
        }
    }

    resultadosPerfiles.innerHTML += textoRes;


}