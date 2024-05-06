
let form = document.getElementById('formulario');
let btnsNext = document.querySelectorAll('.next');

const nombre = document.getElementById('input-nombre');
const apellido = document.getElementById('input-apellido');
const nacimiento = document.getElementById('input-nacimiento');
const curso = document.getElementById('curso');
const definicion1 = document.getElementById('input-definicion1');
const definicion2 = document.getElementById('input-definicion2');
const definicion3 = document.getElementById('input-definicion3');

//Variables para las etiquetas <p> con los errores
const errorNombre = document.getElementById('error-nombre');
const errorApellido = document.getElementById('error-apellido');
const errorFecha = document.getElementById('error-date');
const errorDefinicion = document.getElementById('error-definicion');
errorNombre.innerHTML = "";
errorApellido.innerHTML = "";
errorFecha.innerHTML = "";
errorDefinicion.innerHTML = "";

let validado = false;
let nombreOk = false;
let apellidoOk = false;
let definicion1Ok = false;
let definicion2Ok = false;
let definicion3Ok = false;
let formularioOk = false;
// Creamos variabes que contengan string procesados y validados de los inputs
let nombreProcesado;
let apellidoProcesado;
/* 
  Creamos un evento que cuando se cargue el DOM si el usuario pulsa el botón de 
  enviar el formulario se active la función validarFormulario
*/
btnsNext.forEach((button => {
  //Solo se ejecutara este código si hacemos click en un boton
  button.addEventListener('click', function () {

    if (nombre.value.trim() == "" || !/^[a-zA-Z\s]{3,50}$/.test(nombre.value)) {
      console.log("No está puesto el nombre");
      errorNombre.innerHTML = 'Introduzca un nombre válido';
      nombre.style.border = "2px solid red";
      nombreOk = false;
    } else {
      nombre.style.border = "2px solid black";
      errorNombre.innerHTML = '';
      nombreOk = true;
      nombreProcesado = nombre.value.trim()//Igualamos la variable al nombre sin espacios iniciales y finales
      console.log(nombreProcesado); //Mostramos por consola como se veria en nombre sin espacion innecesarios
    }
    if (apellido.value.trim() == "" || !/^[a-zA-Z\s]{3,50}$/.test(apellido.value)) {
      console.log("No está puesta el apellido");
      errorApellido.innerHTML = 'Introduzca un apellido válido';
      apellido.style.border = "2px solid red";
      apellidoOk = false;
    } else {
      apellido.style.border = "2px solid black";
      errorApellido.innerHTML = '';
      apellidoOk = true;
      apellidoProcesado = apellido.value.trim();
      console.log(apellidoProcesado);
    }
    if (nombreOk == true && apellidoOk == true) {
      validarEdad();
    } else {
      console.log("No esta puesta la fecha");
      errorFecha.innerHTML = 'No hay ninguna fecha en el input';
      nacimiento.style.border = "2px solid red";
      validado = false;
    }
  })
}));
function validarEdad() {
  console.log(nacimiento.value);
  let resta

  let valores = nacimiento.value.split("-");
  let dia_naci = valores[2];
  let mes_naci = valores[1];
  let anio_naci = valores[0];


  let fecha_act = new Date();
  let dia_act = fecha_act.getDate();
  let mes_act = fecha_act.getMonth() + 1;
  let anio_act = fecha_act.getFullYear();

  resta = (anio_act - anio_naci);
  if (nacimiento.value) {
    if (anio_naci >= 1980 && anio_naci < 2025) {

      console.log(anio_act);
      console.log(anio_naci);
      console.log(resta);
      console.log("Hay una fecha");
      if (resta < 18) {
        console.log("menor de edad");
        errorFecha.innerHTML = 'Introduzca una fecha válida';
        nacimiento.style.border = "2px solid red";
        validado = false;
      } else if (resta == 18) {
        console.log("El mes puesto es: " + mes_naci + " y el actual es: " + mes_act);
        if (mes_act > mes_naci) {

          console.log("Mayor de edad");
        } else if (mes_act == mes_naci) {
          console.log("El dia puesto es: " + dia_naci + " y es actual es: " + dia_act);
          if (dia_act >= dia_naci) {
            console.log("Feliz cumple");
            errorFecha.innerHTML = '';
            nacimiento.style.border = "2px solid black";
            validado = true;
          } else {
            console.log("Menor de edad");
          }
        }
        else {
          console.log("menor de edad");
        }
      }
      else {

        errorFecha.innerHTML = '';
        nacimiento.style.border = "2px solid black";
        validado = true;
      }
    }
  } else {
    console.log("No esta puesta la fecha");
    errorFecha.innerHTML = 'No hay ninguna fecha en el input';
    nacimiento.style.border = "2px solid red";
    validado = false;
  }

}

//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const nextBtnfourth = document.querySelector(".next-3");
const prevBtnfifth = document.querySelector(".prev-4");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;

nextBtnFirst.addEventListener("click", function (event) {
  event.preventDefault();
  if (validado) {
    slidePage.style.marginLeft = "-20%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  }
});
nextBtnSec.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-40%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
nextBtnThird.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-60%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
nextBtnfourth.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-80%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
submitBtn.addEventListener("click", function () {
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
  validar1definicion();
  validar2definicion();
  validar3definicion();
  if (definicion1Ok && definicion2Ok && definicion3Ok) {
    validado = true;
    console.log("Las tres definiciones estas correctas");
    formularioOk = window.confirm("¿Estás seguro que quieres finalizar ?");
  }
  /*
  setTimeout(function () {
    alert("Your Form Successfully Signed up");
    location.reload();
  }, 800);
  */

});
function validar1definicion() {
  if (definicion1.value.trim() == "" || !/^[a-zA-Z\s]{3,20}$/.test(definicion1.value)) {
    errorDefinicion.innerHTML = 'La descripción está incompleta';
    errorDefinicion.style.border = "2px solid red";
  } else {
    errorDefinicion.style.border = "2px solid black";
    errorDefinicion.innerHTML = "";
    definicion1Ok = true;
    console.log("La definicion 3 esta bien: " + definicion1Ok);
  }
}
function validar2definicion() {
  if (definicion2.value.trim() == "" || !/^[a-zA-Z\s]{3,20}$/.test(definicion2.value)) {
    errorDefinicion.innerHTML = 'La descripción está incompleta';
    errorDefinicion.style.border = "2px solid red";
  } else {
    errorDefinicion.style.border = "2px solid black";
    errorDefinicion.innerHTML = "";
    definicion2Ok = true;
    console.log("La definicion 2 esta bien: " + definicion2Ok);
  }
}
function validar3definicion() {
  if (definicion3.value.trim() == "" || !/^[a-zA-Z\s]{3,20}$/.test(definicion3.value)) {
    errorDefinicion.innerHTML = 'La descripción está incompleta';
    errorDefinicion.style.border = "2px solid red";
  } else {
    errorDefinicion.style.border = "2px solid black";
    errorDefinicion.innerHTML = "";
    definicion3Ok = true;
    console.log("La definicion 3 esta bien: " + definicion3Ok);
  }
}

prevBtnSec.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnThird.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-20%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnFourth.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-40%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnfifth.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-60%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});