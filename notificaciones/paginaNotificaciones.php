<?php

$id_usuario = $_GET['id_usuario'];
$nombreUsuario = $_GET['nombre'];

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
    <script>
        
        const id_usuario="<?php echo $id_usuario ?>";
        const nombre="<?php echo $nombreUsuario ?>";
    </script>
    <link rel="stylesheet" href="../favoritos/campoMultiple.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="logicaNotificaciones.js?v=<?php echo time(); ?>" defer></script>


</head>

<body>
    <header>
        <!-- include con el menu desplegable para movil (visible solo en movil) -->
        <!-- Barra lateral -->
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
        <li class="opL"><a href="../indexRegistrado.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombreUsuario ?>"><i class='fa-solid fa-house'></i></a></li>
                <li class="opL"><a href="#"><i class="far fa-user"></i></a></li>
                <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                <li class="opL"><a href="#"><i class="far fa-comments"></i></a></li>
                <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                <li class="opL"><a href="../favoritos/favoritos.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombreUsuario ?>"><i class="fas fa-heart"></i></a></li>
                <li class="opL"><a href="#"><i class="fas fa-cogs"></i></a></li>
                <li class="opL"><a href="../inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a>
    </ul>
</div>
</label>
        <div class="perfil">
            <img src="../img/iconoUser.png" alt="">
        </div>
    </header>
    <div class="campoMultiple">
        <div class="radio-inputs">
            <label class="radio" id="labelIdioma">
                <input id="inputFavo" type="radio" name="opcion" value="favoritos" >
                <span class="name">Favoritos</span>
            </label>
            <label class="radio" id="labelIdioma">
                <input id="inputNoti" type="radio" name="opcion" value="notificaciones" checked="">
                <span class="name">Notificaciones</span>
            </label>
        </div>
    </div>
    <aside id="menuLat">
        <div class="menuLateral">
            <ul>
                <!-- <li><a href="#"><i class="fas fa-tv"></i>dashboard</a></li> -->
                <li class="opL"><a href="../indexRegistrado.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombreUsuario ?>"><i class='fa-solid fa-house'></i></a></li>
                <li class="opL"><a href="#"><i class="far fa-user"></i></a></li>
                <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                <li class="opL"><a href="#"><i class="far fa-comments"></i></a></li>
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
        

    </section>


    <?php

    include "../elementos/footerBlanco.php";

    ?>


</body>

</html>