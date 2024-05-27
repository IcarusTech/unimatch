<?php

$id_usuario = $_GET['id_usuario'];
$nombreUsuario = $_GET['nombre'];
require_once("../modelo/DBnotificacion.php");
$conexion = new DBnotificacion();
// $conexion->enviarNotificacionUsuarioNuevo($id_usuario);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <link rel="stylesheet" href="estilosNotificaciones.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="checkbox.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/scrollbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>
    <header>
        <!-- include con el menu desplegable para movil (visible solo en movil) -->
        <?php
        include "../elementos/barraLateral.php";
        ?>
        <div class="perfil">
            <img src="../img/iconoUser.png" alt="">
        </div>
    </header>

    <aside id="menuLat">
        <div class="menuLateral">
            <ul>
                <!-- <li><a href="#"><i class="fas fa-tv"></i>dashboard</a></li> -->
                <li class="opL"><a href="../indexRegistrado.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombreUsuario ?>"><i class='fa-solid fa-house'></i></a></li>
                <li class="opL"><a href="#"><i class="far fa-user"></i></a></li>
                <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                <li class="opL"><a href="paginaNotificaciones.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombreUsuario ?>"><i class="far fa-comments"></i></a></li>
                <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                <li class="opL"><a href="../favoritos/favoritos.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombreUsuario ?>"><i class="fas fa-heart"></i></a></li>
                <li class="opL"><a href="#"><i class="fas fa-cogs"></i></a></li>
                <li class="opL"><a href="../inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a>
                </li>
            </ul>
        </div>
    </aside>
    <section id="resultadosNotificaciones">
        <div class="notificacionContainer">
            <div class="titulo">
                <h2 id="titulo">Titulo de la notificación</h2>
            </div>
            <div class="contenido">
                <p>Este es contenido: Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio ea
                    quibusdam eligendi minus quo nisi praesentium, hic vel rem deserunt distinctio sequi
                    sapiente reprehenderit exercitationem officiis qui perspiciatis tenetur est.</p>
            </div>
            <div class="abajo">
                <div class="fecha">
                    <p>2024/05/27</p>
                </div>
                <div class="checkbox">
                    <label class="container" for="aceptar">
                        <input id="aceptar" type="checkbox" name="leido">
                        <div class="checkmark"></div>
                    </label>
                    <label>Leido</label>
                </div>
            </div>
        </div>

    </section>


    <?php

    include "../elementos/footerBlanco.php";

    ?>


</body>

</html>