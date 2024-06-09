<?php
session_start();

// Establecer la sesión
$_SESSION['id_usuario'] = $_GET['id_usuario'];
$_SESSION['nombre'] = $_GET['usuario'];

// Recuperar la sesión
$id_usuario = $_SESSION['id_usuario'];
$nombre = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Personalizado</title>
    <link rel="stylesheet" href="../styles/indexRegistrado.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="busqueda.css?v=<?php echo time(); ?>">
    <script src="logica/busqueda.js" defer></script>
    <script src="logica/filtro.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>">
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
                    <li class="opL"><a href="../indexRegistrado.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombre ?>"><i class='fa-solid fa-house'></i></a></li>
                    <li class="opL"><a href="busqueda.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombre ?>"><i class="fa fa-search"></i></a></li>
                    <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                    <li class="opL"><a href="#"><i class="far fa-comments"></i></a></li>
                    <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                    <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                    <li class="opL"><a href="../favoritos/favoritos.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombre ?>"><i class="fas fa-heart"></i></a></li>
                    <li class="opL"><a href="../settingsUser/indexConfig.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombre ?>"><i class="fas fa-cogs"></i></a></li>
                    <li class="opL"><a href="../inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a>
                    </li>
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
                <li class="opL"><a href="../indexRegistrado.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombre ?>"><i class='fa-solid fa-house'></i></a></li>
                <li class="opL"><a href="#"><i class="fa fa-search"></i></a></li>
                <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                <li class="opL"><a href="#"><i class="far fa-comments"></i></a></li>
                <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                <li class="opL"><a href="favoritos.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombre ?>"><i class="fas fa-heart"></i></a></li>
                <li class="opL"><a href="../settingsUser/indexConfig.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombre ?>"><i class="fas fa-cogs"></i></a></li>
                <li class="opL"><a href="../inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a>
                </li>
            </ul>
        </div>
    </aside>
    <form action="busqueda.php" method="post" id="formBusqueda">
        <div class="buscar">
            <select id="desplegable">
                <option value="Todos">Todos</option>
                <option value="cursos">Cursos</option>
                <option value="color-pelo">Color de pelo</option>
                <option value="color-ojos">Color de ojos</option>
                <option value="fumador">Fumador</option>
                <option value="tipo-personalidad">Tipo de personalidad</option>
                <option value="planes">Planes</option>
                <option value="amistad-deseada">Amistad deseada</option>
                <option value="hobbies">Hobbies</option>
                <option value="ejercicio">Ejercicio</option>
                <option value="estilo-musica">Estilo de música</option>
                <option value="sexo">Sexo</option>
            </select>

            <div id="subselects-container">
                <div id="cursos-subselect" class="subselect">
                    <label><input type="checkbox" name="curso" id="dam" value="DAM"> Desarrollo de aplicaciones
                        multiplataforma</label><br>
                    <label><input type="checkbox" name="curso" id="daw" value="DAW"> DAW</label><br>
                    <label><input type="checkbox" name="curso" id="mk" value="Marketing"> Marketing y publicidad</label><br>
                    <label><input type="checkbox" name="curso" id="afi" value="AFI"> Administración y finanzas</label><br>
                    <label><input type="checkbox" name="curso" id="asir" value="ASIR"> Administración de sistemas informáticos en
                        red</label><br>
                    <label><input type="checkbox" name="curso" id="ci" value="Comercio"> Comercio internacional</label>
                </div>

                <div id="color-pelo-subselect" class="subselect">
                    <label><input type="checkbox" name="pelo" id="moreno" value="M"> Moreno</label><br>
                    <label><input type="checkbox" name="pelo" id="castaño" value="C"> Castaño</label><br>
                    <label><input type="checkbox" name="pelo" id="rubio" value="R"> Rubio</label><br>
                    <label><input type="checkbox" name="pelo" id="pelirrojo" value="P"> Pelirrojo</label><br>
                </div>

                <div id="color-ojos-subselect" class="subselect">
                    <label><input type="checkbox" name="ojos" id="marron" value="M"> Marrón</label><br>
                    <label><input type="checkbox" name="ojos" id="verde" value="V"> Verde</label><br>
                    <label><input type="checkbox" name="ojos" id="azul" value="A"> Azul</label><br>
                </div>

                <div id="fumador-subselect" class="subselect">
                    <label><input type="checkbox" name="fumador" id="fumador" value="true"> Fumador</label><br>
                    <label><input type="checkbox" name="fumador" id="no-fumador" value="false"> No fumador</label><br>
                </div>

                <div id="tipo-personalidad-subselect" class="subselect">
                    <label><input type="checkbox" name="personalidad" id="extrovertido" value="E"> Extrovertido</label><br>
                    <label><input type="checkbox" name="personalidad" id="introvertido" value="I"> Introvertido</label><br>
                </div>

                <div id="estilo-musica-subselect" class="subselect">
                    <label><input type="checkbox" name="musica" id="rock-&-roll" value="rock&roll"> Rock&Roll</label><br>
                    <label><input type="checkbox" name="musica" id="dembow" value="dembow"> Dembow</label><br>
                    <label><input type="checkbox" name="musica" id="rap" value="rap"> Rap</label><br>
                    <label><input type="checkbox" name="musica" id="pop" value="pop"> Pop</label><br>
                    <label><input type="checkbox" name="musica" id="regueton" value="regueton"> Reguetón</label><br>
                    <label><input type="checkbox" name="musica" id="techno" value="techno"> Techno</label><br>
                    <label><input type="checkbox" name="musica" id="hip-hop" value="hipHop"> Hip-Hop</label><br>
                    <label><input type="checkbox" name="musica" id="bachata" value="bachata"> Bachata</label><br>
                </div>

                <div id="planes-subselect" class="subselect">
                    <label><input type="checkbox" name="planes" id="senderismo" value="senderismo"> Senderismo</label><br>
                    <label><input type="checkbox" name="planes" id="salir-de-fiesta" value="salir-de-fiesta"> Salir de fiesta</label><br>
                    <label><input type="checkbox" name="planes" id="cine" value="cine"> Cine</label><br>
                    <label><input type="checkbox" name="planes" id="restaurantes" value="restaurantes"> Restaurantes</label><br>
                    <label><input type="checkbox" name="planes" id="paseo" value="paseo"> Paseo</label><br>
                    <label><input type="checkbox" name="planes" id="viajar" value="viajar"> Viajar</label><br>
                    <label><input type="checkbox" name="planes" id="museos" value="museos"> Museos</label><br>
                    <label><input type="checkbox" name="planes" id="cata-de-vinos" value="cataVinos"> Cata de vinos</label><br>
                </div>

                <div id="amistad-deseada-subselect" class="subselect">
                    <label><input type="checkbox" name="tipoAmistad" id="mejor-amigo" value="mejor-amigo"> Mejor amigo</label><br>
                    <label><input type="checkbox" name="tipoAmistad" id="amigo-de-fiesta" value="amigo-de-fiesta"> Amigo de fiesta</label><br>
                    <label><input type="checkbox" name="tipoAmistad" id="a-lo-que-surja" value="lo-que-surja"> A lo que surja</label><br>
                </div>

                <div id="hobbies-subselect" class="subselect">
                    <label><input type="checkbox" name="hobby" id="dormir-hobby" value="dormir">Dormir</label><br>
                    <label><input type="checkbox" name="hobby" id="viajar-hobby" value="viajar"> Viajar</label><br>
                    <label><input type="checkbox" name="hobby" id="leer" value="leer">> Leer</label><br>
                    <label><input type="checkbox" name="hobby" id="deportes-extremos" value="deportes-extremos"> Deportes
                        extremos</label><br>
                    <label><input type="checkbox" name="hobby" id="dibujar" value="dibujar"> Dibujar</label><br>
                    <label><input type="checkbox" name="hobby" id="jugar-videojuegos"value="jugar-videojuegos"> Jugar
                        videojuegos</label><br>
                    <label><input type="checkbox" name="hobby" id="bailar" value="bailar"> Bailar</label><br>
                    <label><input type="checkbox" name="hobby" id="cocinar" value="cocinar"> Cocinar</label><br>
                </div>

                <div id="sexo-subselect" class="subselect">
                    <label><input type="checkbox" name="sexo" id="hombre" value="H">Hombre</label><br>
                    <label><input type="checkbox" name="sexo" id="mujer" value="M">Mujer</label><br>
                </div>



                <!-- Agrega más subselects aquí según sea necesario -->
            </div>

            <button id="btnBuscar">Buscar</button>
        </div>
    </form>
    <?php include "../elementos/footerBlanco.php" ?>

</body>

</html>