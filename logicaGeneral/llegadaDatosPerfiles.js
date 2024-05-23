//declaramos variables y constantes
let resultadosPerfiles=document.getElementById('resultadosPerfiles');

//Le decimos al sistema que al cargar ejecute automáticamente la funcion de abajo
document.addEventListener('DOMContentLoaded', recogerDatosPerfiles);

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
    const promesas = array.map(obj => fetch("unimatch/"+obj.url) 
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
function generarPerfiles(resultados){
    let textoRes;
    for(let i=0;i<resultados.length;i++){
        textoRes += "<div class='persona'>"
        + "<div class='imagen'><img src='" + allPokemons[i].sprites.other['official-artwork'].front_default + "' alt='" + allPokemons[i].name + "'></div>"
        + "<div class ='datos' id='cajaDatos'>"
        +"<ul>"
        +"<li><li>Nombre: <div class='valor'>'"+resultados[i].nombre+"'</div></li>"
        +"<li>Curso: <div class='valor'>'"+resultados[i].curso+"'</div></li>"
        +"<li>Amistad buscada:<br><div class='valor'>'"+resultados[i].tipo_de_amistad_buscada+"'</div></li>"
        +"</ul>"
        +"</div>"
        +"<div class='botones'>"
        +"<div class='perfil'><button class='btnPerfil' onclick='' >Ver perfil</button></div>"
        +"<?php"
        +"include './elementos/btnFavorito.php';"
        +"?>"
        +"</div>"
        //+ "<li><button id='ficha' onclick='mostrarFicha(" + allPokemons[i].id + ")'>Ver ficha</button></li></ul></div>";
    }
}
