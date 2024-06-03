<?php
error_reporting(0); //Funcion para ocultar las advertencias del programa
$carpetaPerfil = "../datosRegistros";
//---------------------------------------------------------------------------------
session_start(); //Iniciar una sesión

require_once("../modelo/DBperfil.php");
require_once("../modelo/DBnotificacion.php");


//Si no se ha iniciado sesion previamente, el código nos redirigirá al login para iniciar sesión
$id_usuario = $_GET['id_usuario'];
$_SESSION['usuario'] = $_GET['usuario'];
$usuario = $_GET['usuario'];

if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
    echo ("el nombre esta puesto : ") . $_POST['nombre'];
    $id_usuarioForm = $_POST['id'];
    $nombreUsuario = $_POST['usuario'];
    $conexionNoti = new DBnotificacion();
    $conexionNoti->enviarNotificacionUsuarioNuevo($id_usuarioForm);
    echo ("el nombre del usuario esta puesto : ") . $nombreUsuario;
    echo ("el nombre id del usuario esta puesto : ") . $id_usuarioForm;
    // 1º página
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    // 2º página
    $curso = $_POST['curso'];
    $genero = $_POST['genero'];
    $colorPelo = $_POST['colorPelo'];
    // 3º página
    $colorOjos = $_POST['colorOjos'];
    $estiloMusica = $_POST['opcionMusica'];
    $fumador = $_POST['fuma'];
    // 4º página
    $personalidad = $_POST['personalidad'];
    $tipoAmistad = $_POST['amistad_deseada'];
    $planes = $_POST['planes'];
    // 5º página
    $hobbie = $_POST['hobbie'];
    $instagram = $_POST['instagram'];
    // Apartado de la definicion personal (en tres palabras)
    $definicion1 = $_POST['definicion1'];
    $definicion2 = $_POST['definicion2'];
    $definicion3 = $_POST['definicion3'];
    $definicionTotal = "";
    $definicionTotal .= $definicion1;
    $definicionTotal .= "/" . $definicion2;
    $definicionTotal .= "/" . $definicion3;
    $conexion = new \modelo\DBperfil();
    $img=$conexion->ponerImg($id_usuarioForm,$colorPelo,$colorOjos,$genero);
    //-----------------------------------------------------
    $datos_del_usuario = array(
        "nombre" => $nombre,
        "apellido" => $apellido,
        "fecha_de_nacimiento" => $fechaNacimiento,
        "curso" => $curso,
        "genero" => $genero,
        "color_de_pelo" => $colorPelo,
        "color_de_ojos" => $colorOjos,
        "estilo_de_musica" => $estiloMusica,
        "fumador" => $fumador,
        "tipo_de_personalidad" => $personalidad,
        "tipo_de_amistad_buscada" => $tipoAmistad,
        "planes" => $planes,
        "hobbie" => $hobbie,
        "instagram" => $instagram,
        "definicion_1" => $definicion1,
        "definicion_2" => $definicion2,
        "definicion_3" => $definicion3,
        "ruta_img"=>$img,
        "id_usuario_relacionado" => $id_usuarioForm
    );
    // convierte los datos del usuario introducidos en el formulario en un json
    $json = json_encode($datos_del_usuario, JSON_PRETTY_PRINT);
    $ruta_json = $carpetaPerfil . "/json" . date('YmdHis') . '.json';
    // pone ese contenido en la carpeta que se le indica
    file_put_contents($ruta_json, $json, FILE_APPEND);
    //--------------------------------------------------------
    $file = '../datosRegistros/datos.json';
    // lee los datos del archivo json
    $current_data = file_get_contents($file);
    // convierte el json en php
    $data_array = json_decode($current_data, true);
    // array con datos del usuario
    $new_object = array(

        'id usuario asociado' => $id_usuarioForm,
        'nombre del usuario' => $nombreUsuario,
        "url" => $ruta_json

    );
    // lo mete en una variable
    $data_array[] = $new_object;
    // lo pasa a json
    $new_data_json = json_encode($data_array, JSON_PRETTY_PRINT);
    // mete el contenido en un archivo
    file_put_contents($file, $new_data_json);
    //----------------------------------------------------
    $conexion->create($nombre, $apellido, $fechaNacimiento, $curso, $genero, $colorPelo, $colorOjos, $estiloMusica, $fumador, $personalidad, $tipoAmistad, $planes, $hobbie, $definicionTotal, $instagram,$img,$id_usuarioForm);
    echo $nombre;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Formulario</title>
    <link rel="stylesheet" href="formulario.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="inputEleccion.css?v=<?php echo time(); ?>">
    <script src="logicaFormulario.js?v=<?php echo time(); ?>" defer></script>

    <!--  -->

</head>

<body>
    <div class="container">
        <header>Perfil</header>
        <div class="progress-bar">
            <div class="step">
                <p>
                    Name
                </p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>
                    Name
                </p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>
                    Contact
                </p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>
                    Birth
                </p>
                <div class="bullet">
                    <span>4</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>
                    Submit
                </p>
                <div class="bullet">
                    <span>5</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
        </div>
        <div class="form-outer">
            <form action="formulario.php" method="POST" id="formulario" enctype="multipart/form-data">
                <div class="inputsEnlace">
                    <input type="text" id="nombreUsuario" name="usuario" value="<?php echo $usuario; ?>">
                    <input type="number" id="id_usuario" name="id" value="<?php echo $id_usuario; ?>">
                </div>
                <!-- 1º PAGE -->
                <!-- 
                    Nombre
                    Apellido
                    Fecha de nacimiento
                 -->
                <div class="page page1" id="slide-page">

                    <div class="field">
                        <label for="input-nombre">Nombre</label>
                        <input type="text" name="nombre" id="input-nombre" placeholder="Pon tu nombre aquí" maxlength="50" required>
                        <p id="error-nombre" class="error"></p>
                    </div>
                    <div class="field">
                        <label for="input-apellido">Apellido</label>
                        <input type="text" name="apellido" id="input-apellido" placeholder="Pon tu apellido aquí" maxlength="50" required>
                        <p id="error-apellido" class="error"></p>
                    </div>
                    <div class="field">
                        <label for="input-nacimiento">Fecha de nacimiento</label>
                        <input type="date" name="fechaNacimiento" id="input-nacimiento" min="1970-01-01">
                        <p id="error-date" class="error"></p>
                    </div>
                    <div class="btns field">
                        <button class="firstNext next btn">Next</button>
                    </div>
                </div>

                <!-- 2º PAGE -->
                <!-- 
                    Curso
                    Género
                    Color de pelo
                 -->
                <div class="page page2">

                    <div class="field">
                        <label for="curso">Curso</label>
                        <select name="curso" id="curso">
                            <option value="Comercio">Comercio internacional</option>
                            <option value="Marketing">Márketing y publicidad</option>
                            <option value="AFI">Administración y finanzas</option>
                            <option value="DAM">Desarrollo de aplicaciones
                                multiplataforma</option>
                            <option value="DAW">Desarrollo de aplicaciones web</option>
                            <option value="ASIR">Administración de Sistemas
                                Informáticos en Red</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="sexo">Sexo</label>
                        <select name="genero" id="sexo">
                            <option value="H">Hombre</option>
                            <option value="M">Mujer</option>
                        </select>
                    </div>
                    <div class="campoMultiple">
                        <label>Color de pelo</label>
                        <div class="radio-inputs">
                            <label class="radio" id="labelPelo">
                                <input type="radio" name="colorPelo" value="C" checked="">
                                <span class="name">Castaño</span>
                            </label>
                            <label class="radio" id="labelPelo">
                                <input type="radio" name="colorPelo" value="P">
                                <span class="name">Pelirrojo</span>
                            </label>

                            <label class="radio" id="labelPelo">
                                <input type="radio" name="colorPelo" value="M">
                                <span class="name">Moreno</span>
                            </label>
                            <label class="radio" id="labelPelo">
                                <input type="radio" name="colorPelo" value="R">
                                <span class="name">Rubio</span>
                            </label>
                        </div>
                    </div>

                    <div class="btns field">
                        <button class="prev-1 prev btn">Previous</button>
                        <button class="next-1 next btn">Next</button>
                    </div>
                </div>

                <!-- 3º PAGE -->
                <!-- 
                    Color de ojos
                    Estilo de música
                    Fumas
                 -->
                <div class="page page3">

                    <div class="campoMultiple">
                        <label>Color de ojos</label>
                        <div class="radio-inputs">
                            <label class="radio" id="labelOjos">
                                <input type="radio" name="colorOjos" value="V" checked="">
                                <span class="name">Verdes</span>
                            </label>
                            <label class="radio" id="labelOjos">
                                <input type="radio" name="colorOjos" value="A">
                                <span class="name">Azules</span>
                            </label>

                            <label class="radio" id="labelOjos">
                                <input type="radio" name="colorOjos" value="M">
                                <span class="name">Marrones</span>
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <label for="estiloMusica">Estilo de música</label>
                        <select name="opcionMusica" id="estiloMusica">
                            <option value="rock&roll">Rock&Roll</option>
                            <option value="dembow">dembow</option>
                            <option value="pop">Pop</option>
                            <option value="rap">Rap</option>
                            <option value="reguetón">Reguetón</option>
                            <option value="techno">Techno</option>
                            <option value="hipHop">Hip-Hop</option>
                            <option value="bachata">Bachata</option>
                        </select>
                    </div>
                    <!-- <div class="campoMultiple">
                        <label>Deporte</label>
                        <div class="radio-inputs">
                            <label class="radio" id="labelDeporte">
                                <input type="radio" name="Deporte" value="Baloncesto" checked="">
                                <span class="name">Baloncesto</span>
                            </label>
                            <label class="radio" id="labelDeporte">
                                <input type="radio" name="Deporte" value="Futbol">
                                <span class="name">Futbol</span>
                            </label>

                            <label class="radio" id="labelDeporte">
                                <input type="radio" name="Deporte" value="Padel">
                                <span class="name">Padel</span>
                            </label>
                            <label class="radio" id="labelDeporte">
                                <input type="radio" name="Deporte" value="Voleibol">
                                <span class="name">Voleibol</span>
                            </label>
                        </div>
                    </div> -->
                    <div class="campoMultiple">
                        <label>¿Fumas?</label>
                        <div class="radio-inputs">
                            <label class="radio" id="labelFumar">
                                <input type="radio" name="fuma" value="true" checked="">
                                <span class="name">Fumo</span>
                            </label>
                            <label class="radio" id="labelFumar">
                                <input type="radio" name="fuma" value="false">
                                <span class="name">No fumo</span>
                            </label>
                        </div>
                    </div>
                    <div class="btns field">
                        <button class="prev-2 prev btn">Previous</button>
                        <button class="next-2 next btn">Next</button>
                    </div>
                </div>

                <!-- 4º PAGE -->
                <!-- 
                    extrovertido / introvertido
                    Tipo de amistad
                    Planes
                 -->
                <div class="page page4">


                    <div class="campoMultiple">
                        <label>¿Eres extrovertido o introvertido?</label>
                        <div class="radio-inputs">
                            <label class="radio" id="extrovertido-introvertido">
                                <input type="radio" name="personalidad" value="E" checked="">
                                <span class="name">Extrovertido</span>
                            </label>
                            <label class="radio" id="extrovertido-introvertido">
                                <input type="radio" name="personalidad" value="I">
                                <span class="name">Introvertido</span>
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <label for="amistad">Tipo de amistad</label>
                        <select name="amistad_deseada" id="amistad">
                            <option value="lo-que-surja">Lo que surja</option>
                            <option value="mejor-amigo">Mejor amigo/a</option>
                            <option value="amigo-de-fiesta">Amigo/a de fiesta</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="estiloPlan">Planes</label>
                        <select name="planes" id="estiloPlan">
                            <option value="senderismo">Senderismo</option>
                            <option value="salir-de-fiesta">Salir de fiesta</option>
                            <option value="cine">Cine</option>
                            <option value="restaurantes">Restaurantes</option>
                            <option value="paseo">Paseo</option>
                            <option value="viajar">Viajar</option>
                            <option value="museos">Museos</option>
                            <option value="cataVinos">Cata de vinos</option>
                        </select>
                    </div>

                    <div class="btns field">
                        <button class="prev-3 prev btn">Previous</button>
                        <button class="next-3 next btn">Next</button>
                    </div>
                </div>

                <!-- FINAL PAGE -->
                <!-- 
                    Hobbies
                    Definite con tres palabras
                    Insta
                 -->
                <div class="page page5">

                    <div class="field">
                        <label for="hobbie">Hobbies</label>
                        <select name="hobbie" id="hobbie">
                            <option value="dormir">Hacer ejercicio</option>
                            <option value="leer">Leer</option>
                            <option value="viajar">Viajar</option>
                            <option value="deportes-extremos">Deportes extremos</option>
                            <option value="dibujar">Dibujar</option>
                            <option value="jugar-videojuegos">Jugar videojuegos</option>
                            <option value="bailar">Bailar</option>
                            <option value="cocinar">Cocinar</option>
                        </select>
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
                    <div class="field">
                        <label for="input-instagram">Instagram</label>
                        <input type="text" name="instagram" id="input-instagram" placeholder="Pon tu instagram (opcional)" maxlength="50">

                    </div>
                    <div class="btns field">
                        <button class="prev-4 prev btn">Previous</button>
                        <button type="submit" class="submit btn">Submit</button>
                    </div>


                </div>
            </form>
        </div>
    </div>

</body>

</html>