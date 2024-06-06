<?php
$id_usuario = $_GET['id_usuario'];
$nombreUsuario = $_GET['nombre'];
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>">
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
                <li class="opL"><a href="busqueda.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombreUsuario ?>"><i class="fa fa-search"></i></a></li>
                <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                <li class="opL"><a href="#"><i class="far fa-comments"></i></a></li>
                <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                <li class="opL"><a href="../favoritos/favoritos.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombreUsuario ?>"><i class="fas fa-heart"></i></a></li>
                <li class="opL"><a href="../settingsUser/indexConfig.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombreUsuario ?>"><i class="fas fa-cogs"></i></a></li>
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
                <!-- <li><a href="#"><i class="fas fa-tv"></i>dashboard</a></li> -->
                <li class="opL"><a href="../indexRegistrado.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombreUsuario ?>"><i class='fa-solid fa-house'></i></a></li>
                <li class="opL"><a href="#"><i class="fa fa-search"></i></a></li>
                <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
                <li class="opL"><a href="#"><i class="far fa-comments"></i></a></li>
                <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
                <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
                <li class="opL"><a href="favoritos.php?id_usuario=<?php echo $id_usuario ?>&nombre=<?php echo $nombreUsuario ?>"><i class="fas fa-heart"></i></a></li>
                <li class="opL"><a href="../settingsUser/indexConfig.php?id_usuario=<?php echo $id_usuario ?>&usuario=<?php echo $nombreUsuario ?>"><i class="fas fa-cogs"></i></a></li>
                <li class="opL"><a href="../inicioSesionForm/cerrarSesion.php"><i class='fas fa-sign-out-alt'></i></a>
                </li>
            </ul>
        </div>
    </aside>

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
                <label><input type="checkbox" name="dam" id="dam"> Desarrollo de aplicaciones
                    multiplataforma</label><br>
                <label><input type="checkbox" name="daw" id="daw"> DAW</label><br>
                <label><input type="checkbox" name="mk" id="mk"> Marketing y publicidad</label><br>
                <label><input type="checkbox" name="afi" id="afi"> Administración y finanzas</label><br>
                <label><input type="checkbox" name="asir" id="asir"> Administración de sistemas informáticos en
                    red</label><br>
                <label><input type="checkbox" name="ci" id="ci"> Comercio internacional</label>
            </div>

            <div id="color-pelo-subselect" class="subselect">
                <label><input type="checkbox" name="moreno" id="moreno"> Moreno</label><br>
                <label><input type="checkbox" name="castaño" id="castaño"> Castaño</label><br>
                <label><input type="checkbox" name="rubio" id="rubio"> Rubio</label><br>
                <label><input type="checkbox" name="pelirrojo" id="pelirrojo"> Pelirrojo</label><br>
            </div>

            <div id="color-ojos-subselect" class="subselect">
                <label><input type="checkbox" name="marron" id="marron"> Marrón</label><br>
                <label><input type="checkbox" name="verde" id="verde"> Verde</label><br>
                <label><input type="checkbox" name="azules" id="azul"> Azul</label><br>
            </div>

            <div id="fumador-subselect" class="subselect">
                <label><input type="checkbox" name="fumador" id="fumador"> Fumador</label><br>
                <label><input type="checkbox" name="no-fumador" id="no-fumador"> No fumador</label><br>
            </div>

            <div id="tipo-personalidad-subselect" class="subselect">
                <label><input type="checkbox" name="extrovertido" id="extrovertido"> Extrovertido</label><br>
                <label><input type="checkbox" name="introvertido" id="introvertido"> Introvertido</label><br>
            </div>

            <div id="estilo-musica-subselect" class="subselect">
                <label><input type="checkbox" name="rock-&-roll" id="rock-&-roll"> Rock&Roll</label><br>
                <label><input type="checkbox" name="dembow" id="dembow"> Dembow</label><br>
                <label><input type="checkbox" name="rap" id="rap"> Rap</label><br>
                <label><input type="checkbox" name="pop" id="pop"> Pop</label><br>
                <label><input type="checkbox" name="regueton" id="regueton"> Reguetón</label><br>
                <label><input type="checkbox" name="techno" id="techno"> Techno</label><br>
                <label><input type="checkbox" name="hip-hop" id="hip-hop"> Hip-Hop</label><br>
                <label><input type="checkbox" name="bachata" id="bachata"> Bachata</label><br>
            </div>

            <div id="planes-subselect" class="subselect">
                <label><input type="checkbox" name="senderismo" id="senderismo"> Senderismo</label><br>
                <label><input type="checkbox" name="salir-de-fiesta" id="salir-de-fiesta"> Salir de fiesta</label><br>
                <label><input type="checkbox" name="cine" id="cine"> Cine</label><br>
                <label><input type="checkbox" name="restaurantes" id="restaurantes"> Restaurantes</label><br>
                <label><input type="checkbox" name="paseo" id="paseo"> Paseo</label><br>
                <label><input type="checkbox" name="viajar" id="viajar"> Viajar</label><br>
                <label><input type="checkbox" name="museos" id="museos"> Museos</label><br>
                <label><input type="checkbox" name="cata-de-vinos" id="cata-de-vinos"> Cata de vinos</label><br>
            </div>

            <div id="ejercicio-subselect" class="subselect">
                <label><input type="checkbox" name="hacer-ejercicio" id="hace-ejercicio">Hace ejercicio</label><br>
                <label><input type="checkbox" name="no-hace-ejercicio" id="no-hace-ejercicio">No hace
                    ejercicio</label><br>
            </div>

            <div id="amistad-deseada-subselect" class="subselect">
                <label><input type="checkbox" name="mejor-amigo" id="mejor-amigo"> Mejor amigo</label><br>
                <label><input type="checkbox" name="amigo-de-fiesta" id="amigo-de-fiesta"> Amigo de fiesta</label><br>
                <label><input type="checkbox" name="a-lo-que-surja" id="a-lo-que-surja"> A lo que surja</label><br>
            </div>

            <div id="hobbies-subselect" class="subselect">
                <label><input type="checkbox" name="hacer-ejercicio-hobby" id="hacer-ejercicio-hobby"> Hacer
                    ejercicio</label><br>
                <label><input type="checkbox" name="viajar-hobby" id="viajar-hobby"> Viajar</label><br>
                <label><input type="checkbox" name="leer" id="leer"> Leer</label><br>
                <label><input type="checkbox" name="deportes-extremos" id="deportes-extremos"> Deportes
                    extremos</label><br>
                <label><input type="checkbox" name="dibujar" id="dibujar"> Dibujar</label><br>
                <label><input type="checkbox" name="jugar-videojuegos" id="jugar-videojuegos"> Jugar
                    videojuegos</label><br>
                <label><input type="checkbox" name="bailar" id="bailar"> Bailar</label><br>
                <label><input type="checkbox" name="cocinar" id="cocinar"> Cocinar</label><br>
            </div>

            <div id="sexo-subselect" class="subselect">
                <label><input type="checkbox" name="hombre" id="hombre">Hombre</label><br>
                <label><input type="checkbox" name="mujer" id="mujer">Mujer</label><br>
            </div>



            <!-- Agrega más subselects aquí según sea necesario -->
        </div>

        <button id="boton-buscar">Buscar</button>
    </div>

    <?php include "../elementos/footerBlanco.php" ?>

</body>

</html>