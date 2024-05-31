<?php
$id_usuario = $_GET['id_usuario'];
$nombre = $_GET['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/indexRegistrado.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/scrollbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/formConfig.css?v=<?php echo time(); ?>">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const idUsuario = "<?php echo $id_usuario ?>";
        const nombre = "<?php echo $nombre ?>";
        const stringFavoritos = "<?php echo $stringFavoritos ?>";
    </script>
    <script src="./logicaGeneral/llegadaDatosPerfiles.js?v=<?php echo time(); ?>" defer></script>
    <title>Document</title>
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
                    <li class="opL"><a
                            href="../indexRegistrado.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombre ?>"><i
                                class='fa-solid fa-house'></i></a></li>
                    <li class="opL"><a href="#"><i class="fa fa-search"></i></a></li>
                    <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                    <li class="opL"><a
                            href="../notificaciones/paginaNotificaciones.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombre ?>"><i
                                class="far fa-comments"></i></a></li>
                    <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                    <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                    <li class="opL"><a
                            href="../favoritos/favoritos.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombre ?>"><i
                                class="fas fa-heart"></i></a></li>
                    <li class="opL"><a href="../settingsUser/indexConfig.php"><i class="fas fa-cogs"></i></a></li>
                    <li class="opL"><a href="../inicioSesionForm/cerrarSesion.php"><i
                                class='fas fa-sign-out-alt'></i></a>
                </ul>
            </div>
        </label>
    </header>
    <!-- BARRA LATERAL -->
    <aside id="menuLat">
        <div class="menuLateral">
            <ul>
                <li class="opL"><img src="../img/logotipoSinFondo.png" alt=""></li>

                <li class="opL"><a
                        href="../indexRegistrado.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombre ?>"><i
                            class='fa-solid fa-house'></i></a></li>
                <li class="opL"><a href="#"><i class="fa fa-search"></i></a></li>
                <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                <li class="opL"><a
                        href="../notificaciones/paginaNotificaciones.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombre ?>"><i
                            class="far fa-comments"></i></a></li>
                <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                <li class="opL"><a
                        href="../favoritos/favoritos.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombre ?>"><i
                            class="fas fa-heart"></i></a></li>
                <li class="opL"><a href="../settingsUser/indexConfig.php"><i class="fas fa-cogs"></i></a></li>
                <li class="opL"><a href="../inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a>
                </li>
            </ul>
        </div>

    </aside>
    <main>

        <form action="registro.php" method="post">
    
            <div class="profile-header">
                <img src="profile_picture.jpg" alt="Profile Picture" class="profile-IMG">
                <div class="profile-info">
                    <ul>
                        <li>pablo1324</li>
                        <li>Pablo</li>
                    </ul>
                </div>
                <button class="profile-button">Cambiar foto</button>
            </div>

            <div class="input-group">
                <label for="name">Nombre</label>
                <input type="text" name="nombre" id="name" placeholder="Nombre">
                <label for="phone">Contraseña</label>
                <input type="password" name="contrasena" id="phone" placeholder="Contraseña">
            </div>

            <div class="field">
                <label>Definite con tres palabras</label>
                <div class="definicion">
                    <input type="text" name="definicion1" id="input-definicion1 def" required>
                    <input type="text" name="definicion2" id="input-definicion2 def" required>
                    <input type="text" name="definicion3" id="input-definicion3 def" required>
                </div>
                <p id="error-definicion" class="error"></p>
            </div>
            <input class="btn" type="submit" value="Guardar">
            </div>
        </form>

    </main>
    <?php

    include "../elementos/footerBlanco.php";

    ?>
</body>

</html>