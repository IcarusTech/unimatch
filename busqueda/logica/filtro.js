let dam = document.getElementById('dam');
let daw = document.getElementById('daw');
let mk = document.getElementById('mk');
let afi = document.getElementById('afi');
let asir = document.getElementById('asir');
let ci = document.getElementById('ci');
let moreno = document.getElementById('moreno');
let castaño = document.getElementById('castaño');
let rubio = document.getElementById('rubio');
let pelirrojo = document.getElementById('pelirrojo');
let marron = document.getElementById('marron');
let verde = document.getElementById('verde');
let azul = document.getElementById('azul');
let fumador = document.getElementById('fumador');
let no_fumador = document.getElementById('no-fumador');
let extrovertido = document.getElementById('extrovertido');
let introvertido = document.getElementById('introvertido');
let rock_and_roll = document.getElementById('rock-&-roll');
let dembow = document.getElementById('dembow');
let rap = document.getElementById('rap');
let pop = document.getElementById('pop');
let regueton = document.getElementById('regueton');
let techno = document.getElementById('techno');
let senderismo = document.getElementById('senderismo');
let salir_de_fiesta = document.getElementById('salir-de-fiesta');
let cine = document.getElementById('cine');
let restaurantes = document.getElementById('restaurantes');
let paseos = document.getElementById('paseos');
let viajar = document.getElementById('viajar');
let museos = document.getElementById('museos');
let cata_de_vinos = document.getElementById('cata-de-vinos');
let hace_ejercicio = document.getElementById('hace-ejercicio');
let no_hace_ejercicio = document.getElementById('no-hace-ejercicio');
let mejor_amigo = document.getElementById('mejor-amigo');
let amigo_de_fiesta = document.getElementById('amigo-de-fiesta');
let a_lo_que_surja = document.getElementById('a-lo-que-surja');
let hacer_ejercicio_hobby = document.getElementById('hacer-ejercicio-hobby');
let viajar_hobby = document.getElementById('viajar-hobby');
let leer = document.getElementById('leer');
let deportes_extremos = document.getElementById('deportes-extremos');
let dibujar = document.getElementById('dibujar');
let jugar_videojuegos = document.getElementById('jugar-videojuegos');
let bailar = document.getElementById('bailar');
let cocinar = document.getElementById('cocinar');
let hombre = document.getElementById('hombre');
let mujer = document.getElementById('mujer');
let boton_buscar = document.getElementById('boton-buscar');

boton_buscar.addEventListener('click', cogerPerfiles);

function cogerPerfiles(){

    fetch("controlJson.json")
    .then (res => res.json())
    .then (data => {    a   
        console.log(data);
        buscarTxt(data);

    })

}