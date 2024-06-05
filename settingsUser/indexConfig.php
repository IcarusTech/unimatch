<?php
$id_usuario = $_GET['id_usuario'];
require_once("../modelo/DBusuario.php");
require_once("../modelo/DBperfil.php");
$conexion = new \modelo\DBusuario();
$conexionPerfil = new \modelo\DBperfil();
$cogerDefinicion = $conexionPerfil->mostrarDefiniciones($id_usuario);
//Como la definicion personal es un string separado por / hacemos un array con las palabras separadas
$ArrayDefiniciones = explode("/", $cogerDefinicion);
$contrasena = $conexion->mostrarContrasena($id_usuario);
$mostrarNombre = $conexionPerfil->mostrarNombre($id_usuario);
$mostrarApellido = $conexionPerfil->mostrarApellido($id_usuario);
$urlFoto = $conexionPerfil->mostrarFoto($id_usuario);
//LLegada de datos del formulario al guardar

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/indexRegistrado.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/scrollbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="btnMostrar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/formConfig.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const idUsuario = "<?php echo $id_usuario ?>";
        const nombre = "<?php echo $_GET['usuario'] ?>";
        const urlImagen = "<?php echo $urlFoto ?>";
    </script>
    <script src="logicaSettings.js?v=<?php echo time(); ?>" defer></script>
    <title>Configuracion</title>
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
                    <li class="opL"><a href="../indexRegistrado.php?id_usuario=<?php echo $_GET['id_usuario'] ?>&usuario=<?php echo $_GET['usuario'] ?>"><i class='fa-solid fa-house'></i></a></li>
                    <li class="opL"><a href="#"><i class="fa fa-search"></i></a></li>
                    <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                    <li class="opL"><a href="../notificaciones/paginaNotificaciones.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombre ?>"><i class="far fa-comments"></i></a></li>
                    <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                    <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                    <li class="opL"><a href="../favoritos/favoritos.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombre ?>"><i class="fas fa-heart"></i></a></li>
                    <li class="opL"><a href="../settingsUser/indexConfig.php?id_usuario=<?php echo $_GET['id_usuario'] ?>&usuario=<?php echo $_GET['usuario'] ?>"><i class="fas fa-cogs"></i></a></li>
                    <li class="opL"><a href="../inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a>
                </ul>
            </div>
        </label>
    </header>
    <!-- BARRA LATERAL -->
    <aside id="menuLat">
        <div class="menuLateral">
            <ul>
                <li class="opL"><img src="../img/logotipoSinFondo.png" alt=""></li>

                <li class="opL"><a href="../indexRegistrado.php?id_usuario=<?php echo $_GET['id_usuario'] ?>&usuario=<?php echo $_GET['usuario'] ?>"><i class='fa-solid fa-house'></i></a></li>
                <li class="opL"><a href="#"><i class="fa fa-search"></i></a></li>
                <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                <li class="opL"><a href="../notificaciones/paginaNotificaciones.php?id_usuario=<?php echo $_GET['id_usuario'] ?>&nombre=<?php echo $_GET['usuario'] ?>"><i class="far fa-comments"></i></a></li>
                <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                <li class="opL"><a href="../favoritos/favoritos.php?id_usuario=<?php echo $_GET['id_usuario'] ?>&nombre=<?php echo $_GET['usuario'] ?>"><i class="fas fa-heart"></i></a></li>
                <li class="opL"><a href="../settingsUser/indexConfig.php?id_usuario=<?php echo $_GET['id_usuario'] ?>&usuario=<?php echo $_GET['usuario'] ?>"><i class="fas fa-cogs"></i></a></li>
                <li class="opL"><a href="../inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a>
                </li>
            </ul>
        </div>

    </aside>
    <main>
        <!-- Formulario para la imagen del perfil-->
        <form action="" method="post" id="formImagen">

            <div class="profile-header">
                <div class="photo"><img src="#" alt="Profile Picture" class="profile-IMG" id="fotoPerfil"></div>


                <div class="profile-info">
                    <ul>
                        <li class="nombre"><?php echo $mostrarNombre ?></li>
                        <br>
                        <li class="nombre"><?php echo $mostrarApellido ?></li>
                    </ul>
                </div>

                <button class="profile-button">Cambiar foto</button>
            </div>
        </form>
        <!-- Formulario de los datos tipo texto -->
        <form action="actualizarDatos.php" method="post" id="formDatosTexto">
            <div class="datosEscondidos">
                <input type="number" name="id_usuario" value="<?php echo $_GET['id_usuario'] ?>">
                <input type="text" name="nombreUsuarioAntiguo" id="nameAntiguo" value="<?php echo $_GET['usuario'] ?>">
            </div>

            <div class="input-group">
                <label for="name">Nombre de usuario</label>
                <input type="text" name="nombre" id="name" value="<?php echo $_GET['usuario'] ?>">
            </div>
            <label for="phone">Contraseña</label>
            <div class="inputPass">
                <input type="password" name="contrasena" id="password" value="<?php echo $contrasena ?>">
                <img src="../img/eye-open.png" id="mostrarPassword">
            </div>
            </div>

            <div class="field">
                <label>Definite con tres palabras</label>
                <div class="definicion">
                    <input type="text" name="definicion1" id="input-definicion1 def " value="<?php echo $ArrayDefiniciones[0] ?>">
                    <input type="text" name="definicion2" id="input-definicion2 def" value="<?php echo $ArrayDefiniciones[1] ?>">
                    <input type="text" name="definicion3" id="input-definicion3 def" value="<?php echo $ArrayDefiniciones[2] ?>">
                </div>
                <p id="error-definicion" class="error"></p>
            </div>

            <input class="btn" type="submit" value="Guardar">
            </div>
        </form>
        <!-- Formulario para eliminar el usuario -->
        <form action="eliminarUsuario.php" method="post" id="formDelete">
            <div class="datosEscondidos">
            <input type="password" name="contrasena" id="password2" value="<?php echo $contrasena ?>">
                <input type="number" name="id_usuario" value="<?php echo $_GET['id_usuario'] ?>">
                <input type="text" name="nombreUsuario" id="usuario" value="<?php echo $_GET['usuario'] ?>">
            </div>
            <div id="containerFormDelete">

            </div>

        </form>
    </main>
    <?php

    include "../elementos/footerBlanco.php";

    ?>
</body>

</html>