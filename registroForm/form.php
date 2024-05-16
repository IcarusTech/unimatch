<?php
require_once("../modelo/DBusuario.php");
//error_reporting(0); //Funcion para ocultar las advertencias del programa
$aceptarDocumentos = isset($_POST['aceptarDocumentos']);

if (isset($_POST['inputCorreo']) && isset($_POST['inputPassword']) && $aceptarDocumentos) { //Commprobamos que los datos estan escritos
    //Comprobamos que el correo, la contraseña esten puestos y que los terminos y privacidad esten seleccionados
    $correo = $_POST['inputCorreo'];
    $password = $_POST['inputPassword'];
    $conexion= new \modelo\DBusuario();
    $conexion->create($correo,$password);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="checkBox.css?v=<?php echo time(); ?>">
    <script src="validacionForm.js?v=<?php echo time(); ?>" defer></script>
</head>

<body>

    <form id="formRegistrar" action="form.php" method="post">

        <h2>Registro</h2>

        <div class="input-group">

            <div class="campo">
                <label for="inputCorreo">Correo electrónico</label>
                <input type="email" name="inputCorreo" id="correo" placeholder="...@alumnos.nebrija.es" pattern=".+@alumnos\.nebrija\.es" required>
                <p id="error1" class="error"></p>
            </div>

            <div class="campo">
                <label for="inputPassword">Contraseña <img class="info" id="iconoInfo" src="../img/iconoInfo.png"alt="iconoInfo"></label>
                <div class="inputPass">
                    <input type="password" name="inputPassword" id="password" placeholder="Introduce una contraseña"  pattern=".{6,12}" required>
                    <img src="../img/eye-open.png" id="mostrarPassword">
                </div>
                <p id="error2" class="error"></p>
            </div>

            <div class="checkbox">
                <label class="container" for="aceptar">
                    <input id="aceptar" type="checkbox" name="aceptarDocumentos">
                    <div class="checkmark"></div>
                </label>
                <label>Acepto las condiciones</label>
            </div>
            <p id="error3" class="error"></p>

            <div class="form-txt">
                <a href="../documentosLegales/privacidad.php">Politica de privacidad</a>
                <a href="../documentosLegales/terminos.php">Terminos y condiciones</a>
            </div>

            <input class="btn" type="submit" value="Enviar">

        </div>

    </form>
</body>

</html>