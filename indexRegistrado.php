<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['usuario'])) {
    //Si no se ha iniciado sesion previamente,el código nos redirigirá al login para iniciar sesión
    header("Location: inicioSesionForm/inicioSesion.php");
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
    <link rel="stylesheet" href="./styles/scrollbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./logicaGeneral/llegadaDatosPerfiles.js?v=<?php echo time(); ?>" defer></script>
    </script>
</head>

<body>
    <header>
        <!-- include con el menu desplegable para movil (visible solo en movil) -->
        <?php
        include "./elementos/barraLateral.php";
        ?>
        <div class="perfil">
            <img src="img/iconoUser.png" alt="">
        </div>
    </header>
    <main id="cuerpo">
        <aside id="menuLat">
            <div class="menuLateral">
                <ul>
                    <!-- <li><a href="#"><i class="fas fa-tv"></i>dashboard</a></li> -->
                    <li class="opL"><a href="#"><i class='fa-solid fa-house'></i></a></li>
                    <li class="opL"><a href="#"><i class="far fa-user"></i></a></li>
                    <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                    <li class="opL"><a href="#"><i class="far fa-comments"></i></a></li>
                    <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                    <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                    <li class="opL"><a href="#"><i class="fas fa-heart"></i></a></li>
                    <li class="opL"><a href="#"><i class="fas fa-cogs"></i></a></li>
                    <li class="opL"><a href="./inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a></li>
                </ul>
            </div>
        </aside>
        <section id="resultadosPerfiles">
            
            
        </section>
    </main>
    
    <?php

    include "./elementos/footerBlanco.php";

    ?>


</body>

</html>