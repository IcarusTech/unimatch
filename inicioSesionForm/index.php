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
        
    <form action="registro.php" method="post">
    
    <h2>Registro</h2>
    
    <div class="input-group">
    <label for="name">Nombre de usuario</label>
    <input type="text" name="nombre" id="name" placeholder="tu correro de nebrija sin el @alumnos...">
    <label for="phone">Contraseña</label>
    <input type="password" name="correo" id="correo" placeholder="Introduce tu contraseña">
    
    <div class="form-txt">
    <a href="#">Politica de privacidad</a>
    <a href="#">Terminos y condiciones</a>
    </div>
    <input class="btn" type="submit" value="Enviar">
    </div>
    </form>
    </body>
    </html>

</body>
</html>