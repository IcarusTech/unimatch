
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
const errorDefinicon = document.getElementById('error-definicion');
errorNombre.innerHTML = "";
errorApellido.innerHTML = "";
errorFecha.innerHTML = "";
errorDefinicon.innerHTML = "";

let validado = false;
let nombreOk=false;
let apellidoOk=false;
/* 
  Creamos un evento que cuando se cargue el DOM si el usuario pulsa el botón de 
  enviar el formulario se active la función validarFormulario
*/
btnsNext.forEach((button => {
  //Solo se ejecutara este código si hacemos click en un boton
  button.addEventListener('click', function () {

    if (nombre.value == "" || !/^[a-zA-Z0-9\s]{1,50}$/.test(nombre.value)) {
      errorNombre.innerHTML = 'Introduzca un nombre válido';
      nombre.style.border = "2px solid red";
      nombreOk=false;
    } else {
      nombre.style.border = "2px solid black";
      
      nombreOk=true;
    }
    if (apellido.value == "" || !/^[a-zA-Z0-9\s]{1,50}$/.test(apellido.value)) {
      errorApellido.innerHTML = 'Introduzca un apellido válido';
      apellido.style.border = "2px solid red";
      apellidoOk=false;
    } else {
      apellido.style.border = "2px solid black";
      
      apellidoOk=true;
    }
    if(nombreOk==true && apellidoOk==true){
      validarEdad();
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
    console.log(anio_act);
    console.log(anio_naci);
    console.log(resta);
    console.log("Hay ninguna fecha");
    if (resta < 18) {
      console.log("menor de edad");
      errorFecha.innerHTML = 'Introduzca una fecha válida';
      nacimiento.style.border = "2px solid red";
      validado = false;
    } else {
      console.log("Mayor de edad");
      errorFecha.innerHTML = '';
      nacimiento.style.border = "2px solid black";
      validado = true;
    }
  } else {
    console.log("No esta puesta la fecha");
    errorFecha.innerHTML = 'No hay ninguna fecha en el input';
    nacimiento.style.border = "2px solid red";
    validado = false;
  }

}

//-----------------------------------------------------------------------
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
  if (definicion1.value == "" || !/^[a-zA-Z0-9\s]{1,20}$/.test(definicion1.value)) {
    errorDefinicon.innerHTML = 'La descripción es incorrecta';
    errorDefinicon.style.border = "2px solid red";
    validado = false;
  } else {
    errorDefinicon.style.border = "2px solid black";
    validado = true;
    setTimeout(function () {
      alert("Your Form Successfully Signed up");
      location.reload();
    }, 800);
  }
});

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