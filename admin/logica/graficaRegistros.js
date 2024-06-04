const btnGeneral = document.getElementById('btnGeneral');
const btnSexos = document.getElementById('btnSexos');
btnGeneral.addEventListener('click', fetchGeneral);
btnSexos.addEventListener('click', fetchPorSexos);
document.addEventListener("DOMContentLoaded", fetchGeneral);
let graficoActual;
function fetchGeneral() {
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
            contarFechaRegistro(resultados);
        })
        .catch(error => {
            console.error('Error al cargar todos los datos:', error);
        });
}
function contarFechaRegistro(resultados) {
    if (graficoActual) { // Si existe un gráfico anterior, lo destruimos
        graficoActual.destroy();
    }
    // Resto del código para crear el nuevo gráfico
    let arrayDias = [];
    for (let i = 0; i < resultados.length; i++) {
        let diaRegistro = resultados[i].dia_registro - 1;
        if (!arrayDias[diaRegistro]) {
            arrayDias[diaRegistro] = 0;
        }
        arrayDias[diaRegistro]++;
    }
    const maxLength = Math.max(arrayDias.length);
    let datosDias = new Array(maxLength);
    for(let i=0;i<maxLength;i++){
     datosDias[i]=i+1;
    }
    console.log(arrayDias);
    //Etiquetas a comparar
    let etiquetas = datosDias.map((value) => value);
    //Seleccionamos el canvas
    const migrafico = document.getElementById('grafico');

    //Datos
    const datos1 = {
        label: "Personas registradas",
        data: [arrayDias[0], arrayDias[1], arrayDias[2], arrayDias[3], arrayDias[4]],
        /* pointRadius: 0, */
        borderColor: '#fe3c72',
        fill: true,
        tension: 0.3
    };
    const datos = {
        labels: etiquetas,
        datasets: [datos1]
    };
    //Configuracion del tipo de gráfico
    const config = {
        type: 'line',
        data: datos,
        options: {
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Historial de registro',
                    color: '#fe3c72',
                    font: {
                        size: 30
                    }
                },
                legend: {
                    display: false,
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: 5,
                    grid: {
                        drawOnChartArea: false
                    },
                    ticks: {
                        stepSize: 1
                    }
                },
                x: {
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    };
    graficoActual = new Chart(migrafico, config);
}
//---------------------------------------------------------------
function fetchPorSexos() {
    fetch("../datosRegistros/datos.json")
        .then(res => res.json())
        .then(res => {
            console.log(res);
            console.log("Mostrar datos fetch");
            buscarDatosPerfiles2(res);
        })
        .catch(error => {
            console.error('Error al cargar los datos JSON:', error);
        });
}
function buscarDatosPerfiles2(array) {
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
            contarFechaRegistroSexo(resultados);
        })
        .catch(error => {
            console.error('Error al cargar todos los datos:', error);
        });
}
function contarFechaRegistroSexo(resultados) {
    if (graficoActual) { //Si existe la antigua y otra actualizada, destruimos la antigua para que se muestra la actualizada
        graficoActual.destroy();
    }
    let arrayDiasChicos = [];
    let arrayDiasChicas = [];

    for (let i = 0; i < resultados.length; i++) {
        if (resultados[i].genero == "H") {
            let diaRegistro = resultados[i].dia_registro - 1;
            if (!arrayDiasChicos[diaRegistro]) {
                arrayDiasChicos[diaRegistro] = 0;
            }
            arrayDiasChicos[diaRegistro]++;
        }
        else {
            let diaRegistro = resultados[i].dia_registro - 1;
            if (!arrayDiasChicas[diaRegistro]) {
                arrayDiasChicas[diaRegistro] = 0;
            }
            arrayDiasChicas[diaRegistro]++;
        }
    }
    //Para que los dos array tengan la misma longitud si o si declaramos una variable que tome el valor másimo de ambos
    const maxLength = Math.max(arrayDiasChicas.length, arrayDiasChicos.length);
    //Verificamos si un es mas corto
    if (arrayDiasChicas.length < maxLength) {
        //Lo igualamos a la long max si es más corto
        arrayDiasChicas.length = maxLength;
        //Rellenamos lso huecos generados con ceros ya que se debe mostrar en la gráfica el valor
        arrayDiasChicas.fill(0, arrayDiasChicas.length - (maxLength - arrayDiasChicas.length));
    }

    if (arrayDiasChicos.length < maxLength) {
        arrayDiasChicos.length = maxLength;
        arrayDiasChicos.fill(0, arrayDiasChicos.length - (maxLength - arrayDiasChicos.length));
    }
    //Como hay huecos vacios en ambos arrays recorro ambos y rellono los espacios vacios con 0
    for (let i = 0; i < arrayDiasChicos.length; i++) {
        if (!arrayDiasChicos[i]) {
            arrayDiasChicos[i] = 0;
        }
    }
    for (let i = 0; i < arrayDiasChicas.length; i++) {
        if (!arrayDiasChicas[i]) {
            arrayDiasChicas[i] = 0;
        }
    }
    let datosDias = new Array(maxLength);
    for(let i=0;i<maxLength;i++){
     datosDias[i]=i+1;
    }
    console.log(arrayDiasChicas);
    console.log(arrayDiasChicos);
    //Etiquetas a comparar
    let etiquetas = datosDias.map((value) => value);
    //Seleccionamos el canvas
    const migrafico = document.getElementById('grafico');

    //Datos
    const datos1 = {
        label: "Chicos registrados",
        data: arrayDiasChicos.map((value) => value),
        /* pointRadius: 0, */
        borderColor: 'black',
        fill: 1,
        tension: 0.3
    };
    const datos2 = {
        label: "Chicas registradas",
        data: arrayDiasChicas.map((value) => value),
        /* pointRadius: 0, */
        borderColor: 'red',
        fill: 1,
        tension: 0.3
    };
    const datos = {
        labels: etiquetas,
        datasets: [datos1, datos2]
    };
    //Configuracion del tipo de gráfico
    const config = {
        type: 'line',
        data: datos,
        options: {
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Historial de registro',
                    color: '#fe3c72',
                    font: {
                        size: 30
                    }
                },
                legend: {
                    display: false,
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: 5,
                    grid: {
                        drawOnChartArea: false
                    },
                    ticks: {
                        stepSize: 1
                    }
                },
                x: {
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    };
    graficoActual = new Chart(migrafico, config);
}