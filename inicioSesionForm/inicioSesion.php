<?php
//-----------------------------------------------------------------------------------
require_once("../modelo/DBusuario.php");

if (isset($_POST['nombre']) && isset($_POST['inputPassword'])) {
    $user = $_POST['nombre'];
    $password = $_POST['inputPassword'];
    $conexion = new \modelo\DBusuario();
    $conexion->login($user, $password);
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
        <script src="logicaInicioSesion.js?v=<?php echo time(); ?>" defer></script>
    </head>

    <body>
    
        <form action="inicioSesion.php" method="post">

            <h2>Inicio de sesion</h2>
            <p id="correccion"></p>

            <div class="input-group">
                <label for="nombre">Nombre de usuario</label>
                <input type="text" name="nombre" id="name" placeholder="tu correo de nebrija sin el @alumnos...">
                <label for="inputPassword">Contraseña</label>
                <div class="inputPass">
                <input type="password" name="inputPassword" id="password" placeholder="Introduce tu contraseña">
                <img src="../img/eye-open.png" id="mostrarPassword">
                </div>
                <div class="form-txt">
                    <a href="../documentosLegales/privacidad.php">Politica de privacidad</a>
                    <a href="../documentosLegales/terminos.php">Terminos y condiciones</a>
                </div>
                <input class="btn" type="submit" value="Enviar">
                <div class="enlaceInicio">
                    <p>¿No estas registrado?<a href="../registroForm/form.php">¡Registrate!</a></p>
                </div>
            </div>
        </form>
    </body>

    </html>



