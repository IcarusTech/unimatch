<?php
error_reporting(0); //Funcion para ocultar las advertencias del programa
$aceptarDocumentos = isset($_POST['aceptarDocumentos']);
if (isset($_POST['inputCorreo']) && isset($_POST['inputPasword']) && $aceptarDocumentos) { //Commprobamos que los datos estan escritos
    //Comprobamos que el correo, la contraseña esten puestos y que los terminos y privacidad esten seleccionados
    $correo = $_POST['inputCorreo'];
    $password = $_POST['inputPasword'];
    $validar = true;
    function validarCorreo()
    {

    }
    
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
</head>

<body>

    <form id="formRegistrar" action="registro.php" method="post">

        <h2>Registro</h2>

        <div class="input-group">
            <div class="campo">
                <label for="name">Correo electrónico</label>
                <input type="text" name="inputCorreo" id="correo" placeholder="...@alumnos.nebrija.es">
            </div>
            <div class="campo">
                <label for="phone">Contraseña <img class="info" id="iconoInfo" src="../img/iconoInfo.png"
                        alt="iconoInfo"></label>
                <input type="password" name="inputPasword" id="password" placeholder="Introduce una contraseña">
            </div>

            <div class="checkbox">
                <label class="container">
                    <input checked="checked" type="checkbox" name="aceptarDocumentos">
                    <div class="checkmark"></div>
                </label>
                <label for="">Acepto las condiciones</label>
            </div>
            <div class="form-txt">
                <a href="../documentosLegales/privacidad.php">Politica de privacidad</a>
                <a href="../documentosLegales/terminos.php">Terminos y condiciones</a>
            </div>
            <input class="btn" type="submit" value="Enviar">
        </div>
    </form>
</body>

</html>