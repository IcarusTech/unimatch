<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    //Si no se ha iniciado sesion previamente,el código nos redirigirá al login para iniciar sesión
    header("Location: inicioSesionForm/index.php");
    exit();
}
//-----------------
$variable_php = 'valor'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Registrado</title>
    <link rel="stylesheet" href="./styles/indexRegistrado.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>">
    <script src="./logicaGeneral/llegadaDatosPerfiles.js?v=<?php echo time(); ?>" defer></script>
</head>

<body>
    <header>
        <?php
        include "./elementos/barraLateral.php";
        ?>
        <div class="perfil">
            <img src="img/iconoUser.png" alt="">
        </div>
    </header>
    <aside>
        <div class="menuLateral">
            <ul>
                <!-- <li><a href="#"><i class="fas fa-tv"></i>dashboard</a></li> -->
                <li class="opL"><a href="#"><i class='fa-solid fa-house'></i>Inicio</a></li>
                <li class="opL"><a href="#"><i class="far fa-user"></i>Perfil</a></li>
                <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                <li class="opL"><a href="#"><i class="far fa-comments"></i>Foro</a></li>
                <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                <li class="opL"><a href="#"><i class="fas fa-heart"></i>Favoritos</a></li>
                <li class="opL"><a href="#"><i class="fas fa-cogs"></i>Ajustes</a></li>
                <li class="opL"><a href="/inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i>Salir</a></li>
            </ul>
        </div>
    </aside>
    <section>
        <div class="persona">
         <div class="imagen"></div>
         <div class="datos"></div>
        </div>
    </section>

    <?php

    include "./elementos/footer.php";

    ?>


</body>

</html>