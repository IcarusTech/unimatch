<?php
error_reporting (0);//Funcion para ocultar las advertencias del programa
$correo= $_POST['inputCorreo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    </head>

    <body>

        <form action="form.php" method="post">

            <h2>Registro</h2>

            <div class="input-group">
                <div class="campo">
                    <label for="name">Correo de Nebrija</label>
                    <input type="text" name="inputCorreo" id="correo" placeholder="...@alumnos.nebrija.es">
                </div>
                <div class="campo">
                    <label for="phone">Contraseña <img class="info" id="iconoInfo" src="../img/iconoInfo.png" alt="iconoInfo"></label>
                    <input type="password" name="correo" id="correo" placeholder="Introduce una contraseña">
                </div>
                <div class="form-txt">
                    <a href="#">Politica de privacidad</a>
                    <a href="../documentosLegales/terminos.php">Terminos y condiciones</a>
                </div>
                <input class="btn" type="submit" value="Enviar">
            </div>
        </form>
    </body>

    </html>

</body>

</html>