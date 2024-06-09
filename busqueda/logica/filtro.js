const form = document.getElementById('formBusqueda');
const botonBuscar = document.getElementById('btnBuscar');
botonBuscar.addEventListener('click', recogerDatosPerfiles);

function recogerDatosPerfiles(event) {
    event.preventDefault(); 
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
    const promesas = array.map(obj => fetch( obj.url)
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
            filtarResultado(resultados);
        })
        .catch(error => {
            console.error('Error al cargar todos los datos:', error);
        });
}

async function filtarResultado(res) {
    const formData = new FormData(form);
    const params = {};

    for (const [key, value] of formData) {
        params[key] = value;
        }
    console.log(params);

    // Aplicar los filtros
    const filteredResponses = res.filter((response) => {
        if (!Array.isArray(response)) {
            return false;
        }
        // Aplicar los filtros aquí
        // Por ejemplo, si deseas filtrar por un campo específico
        const campo = params['curso'];
        console.log(campo);
        return response.some((item) => item.campo === campo);
    });

    // Procesar los resultados
    if (filteredResponses.length > 0) {
        const data = await Promise.all(filteredResponses.map((response) => response.json()));
        // Procesar los resultados
    } else {
        console.error('No se encontraron resultados que cumplan con los filtros');
    }
}