<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    //Si no se ha iniciado sesion previamente,el código nos redirigirá al login para iniciar sesión
    header("Location: inicioSesionForm/inicioSesion.php");
    exit();
}
$id_usuario = $_GET['id_usuario'];
$nombre = $_GET['usuario'];
require_once("./modelo/DBperfil.php");
$conexion = new \modelo\DBperfil;
$stringFavoritos = $conexion->consultarFavoritos($id_usuario);

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
    <script>
        const idUsuario = "<?php echo $id_usuario ?>";
        const nombre = "<?php echo $nombre ?>";
        const stringFavoritos = "<?php echo $stringFavoritos ?>";
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js?v=<?php echo time(); ?>"></script>
    <script src="./logicaGeneral/llegadaDatosPerfiles.js?v=<?php echo time(); ?>" defer></script>
    <script src="./logicaGeneral/graficaCompatibilidad.js?v=<?php echo time(); ?>" defer></script>

</head>

<body>
    <header>
        <!--el menu desplegable para movil (visible solo en movil) -->
        <label class="lateral">

            <input type="checkbox" class="input-barraLateral">
            <div class="toggle">
                <span class="top_line common"></span>
                <span class="middle_line common"></span>
                <span class="bottom_line common"></span>
            </div>

            <div class="slide">
                <ul>
                    <!-- <li><a href="#"><i class="fas fa-tv"></i>dashboard</a></li> -->
                    <li class="opL"><a href="../indexRegistrado.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombre ?>"><i class='fa-solid fa-house'></i></a></li>
                    <li class="opL"><a href="#"><i class="fa fa-search"></i></a></li>
                    <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                    <li class="opL"><a href="#"><i class="far fa-comments"></i></a></li>
                    <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                    <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                    <li class="opL"><a href="../unimatch/favoritos/favoritos.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombre ?>"><i class="fas fa-heart"></i></a></li>
                    <li class="opL"><a href="../unimatch/settingsUser/indexConfig.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombre ?>"><i class="fas fa-cogs"></i></a></li>
                    <li class="opL"><a href="../unimatch/inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a></li>
                </ul>
            </div>
        </label>
        <div class="perfil">
            <img src="img/iconoUser.png" alt="">
        </div>
    </header>

    <aside id="menuLat">
        <div class="menuLateral">
            <ul>
                <li class="opL"><img src="../unimatch/img/logotipoSinFondo2.png" alt="logo"></li>
                <!-- <li><a href="#"><i class="fas fa-tv"></i>dashboard</a></li> -->
                <li class="opL"><a href="../unimatch/indexRegistrado.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombre ?>"><i class='fa-solid fa-house'></i></a></li>
                <li class="opL"><a href="./busqueda/busqueda.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombre ?>"><i class="fa fa-search"></i></a></li>
                <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                <li class="opL"><a href="#"><i class="far fa-comments"></i></a></li>
                <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                <li class="opL"><a href="../unimatch/favoritos/favoritos.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombre ?>"><i class="fas fa-heart"></i></a></li>
                <li class="opL"><a href="../unimatch/settingsUser/indexConfig.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombre ?>"><i class="fas fa-cogs"></i></a></li>
                <li class="opL"><a href="../unimatch/inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a>
                </li>
            </ul>
        </div>
    </aside>
    <div id="perfilContainer">
        <div id="fichaPerfil">
            <div id="fotoPerfil" class="seccion">
            </div>
            <div id="textoA" class="seccion">
            </div>
            <div id="textoB" class="seccion">
            </div>
            <div class="seccion" id="grafica">
                <canvas id="grafico"></canvas>
            </div>
            <div id="btnCerrarVentana">
            </div>
        </div>
    </div>
    <section id="resultadosPerfiles">

    </section>


    <?php

    include "./elementos/footerBlanco.php";

    ?>


</body>

</html>