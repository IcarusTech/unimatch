<?
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    // Si no hay sesión o el usuario no es admin, redirigir a login o mostrar mensaje de error
    header("Location: ../inicioSesionForm/inicioSesion.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/indexAdmin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js?v=<?php echo time(); ?>"></script>
    <script src="./logica/graficaRegistros.js?v=<?php echo time(); ?>" defer></script>
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
            <img src="../img/iconoUser.png" alt="">
        </div>
    </header>

    <aside id="menuLat">
        <div class="menuLateral">
            <ul>
                <li class="opL"><img src="../img/logotipoSinFondo2.png" alt="logo"></li>
                <!-- <li><a href="#"><i class="fas fa-tv"></i>dashboard</a></li> -->
                <li class="opL"><a href=""><i class='fa-solid fa-house'></i></a></li>
                <li class="opL"><a href="#"><i class="fa fa-minus-circle"></i></a></li>
                <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                <li class="opL"><a href="#"><i class="fa fa-exclamation-circle"></i></a></li>
                <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                <li class="opL"><a href=""><i class="fas fa-signal"></i></a></li>
                <li class="opL"><a href=""><i class="fas fa-cogs"></i></a></li>
                <li class="opL"><a href="../inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a>
                </li>
            </ul>
        </div>
    </aside>
    <section>

        <div id="grafica">
            <canvas id="grafico"></canvas>
            <div id="btnGraficoRegistro">
                <button class="opcion" id="btnGeneral">Datos generales</button>
                <button class="opcion" id="btnSexos">Dividir por sexo</button>
            </div>
        </div>
    </section>
</body>

</html>