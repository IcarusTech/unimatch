let mostrar = document.getElementById('mostrarPassword');

mostrar.addEventListener('click', mostrarPassword);

function mostrarPassword() {
    let password = document.getElementById('password');
    if (password.type === "password") {
      password.type = "text";
      mostrar.src = "../img/eye-close.png";
    } else {
      password.type = "password";
      mostrar.src = "../img/eye-open.png";
    }
}