window.addEventListener('DOMContentLoaded', function(){

    let datos = document.getElementById('datos');

    fetch("Perfil/perfiles.json")
    .then(res => res.json())
    .then(data => {
        console.log(data);
        recorrer(data);
    })

   function recorrer(data){

    let txt = "";

    for(let i = 0; i <= data.length; i++){
        txt += "<p>Nombre: " + data[i].nombre + "</p>";
        txt += "<p>Nombre: " + data[i].apellido + "</p>";
        txt += "<p>Nombre: " + data[i].fechaNacimiento + "</p>";
        txt += "<p>Nombre: " + data[i].curso + "</p>";
        txt += "<p>Nombre: " + data[i].genero + "</p>";
        txt += "<p>Nombre: " + data[i].colorPelo + "</p>";
        txt += "<p>Nombre: " + data[i].colorOjos + "</p>";
        txt += "<p>Nombre: " + data[i].opcionMusica + "</p>";
        txt += "<p>Nombre: " + data[i].fuma + "</p>";
        txt += "<p>Nombre: " + data[i].personalidad + "</p>";
        txt += "<p>Nombre: " + data[i].amistad_deseada + "</p>";
        txt += "<p>Nombre: " + data[i].planes + "</p>";
        txt += "<p>Nombre: " + data[i].hobbie + "</p>";
        txt += "<p>Nombre: " + data[i].instagram + "</p>";
        txt += "<p>Nombre: " + data[i].definicion1 + "</p>";
        txt += "<p>Nombre: " + data[i].definicion2 + "</p>";
        txt += "<p>Nombre: " + data[i].definicion3 + "</p>";
    }

   imprimir(txt);

    }

    function imprimir(txt){
    datos.innerHTML = txt;
    }


})