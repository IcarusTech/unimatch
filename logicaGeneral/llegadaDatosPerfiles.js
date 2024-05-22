console.log("Hola");
document.addEventListener('DOMContentLoaded', recogerDatosPerfiles);
function recogerDatosPerfiles() {
    fetch("datosRegistros/datos.json")
      .then(res => res.json())
      .then(res => {
        console.log(res);
        console.log("Mostrar datos fetch");
        mostrarInfo(res);
      })
      .catch(error => console.error("Ha habido un error al cargar los perfiles"+ error));
  }