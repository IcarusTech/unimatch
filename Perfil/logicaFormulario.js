let form = document.getElementById('formulario');
let btnsNext = document.querySelector('.next');

const nombre = document.getElementById('input-nombre');
  const apellido = document.getElementById('input-apellido');
  const nacimiento = document.getElementById('input-nacimiento');
  const curso = document.getElementById('curso');
  const definicion = document.querySelectorAll('#input-definicion');

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
/* 
    Creamos un evento que cuando se cargue el DOM si el usuario pulsa el botón de 
    enviar el formulario se active la función validarFormulario
*/
form.addEventListener('submit', validarFormulario);
btnsNext.addEventListener('click', validarFormulario);
function validarFormulario() {
  
  //Variables para los inputs
  
}
if (nombre.value == "" || !/^[a-zA-Z0-9\s]{1,50}$/.test(nombre.value)) {
  errorNombre.innerHTML = 'Introduzca un nombre válido';
  nombre.style.border = "2px solid red";
} else {
  nombre.style.border = "2px solid black";
  validado = true;
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
  setTimeout(function () {
    alert("Your Form Successfully Signed up");
    location.reload();
  }, 800);
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