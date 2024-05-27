console.log(nombre);
console.log(id_usuario);
let inputFavo= document.getElementById('inputFavo');

inputFavo.addEventListener('click',mandarFavoritos);

function mandarFavoritos(){
    let urlFavoritos = "../favoritos/favoritos.php?id_usuario=" + id_usuario + "&nombre=" + nombre;

    // Redirige a la nueva URL
    window.location.href = urlFavoritos;
}