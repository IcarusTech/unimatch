<?php
//-----------------------------------------------------------------------------------
require_once("../modelo/DBusuario.php");

 if(isset($_POST['nombre'])&&isset($_POST['inputPassword'])){
    $user=$_POST['nombre'];
    $password=$_POST['inputPassword'];
    $conexion= new \modelo\BDusuario();
    $conexion->login($user,$password);
} 
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
        
    <form action="inicioSesion.php" method="post">
    
    <h2>Inicio de sesion</h2>
    
    <div class="input-group">
    <label for="nombre">Nombre de usuario</label>
    <input type="text" name="nombre" id="name" placeholder="tu correo de nebrija sin el @alumnos...">
    <label for="inputPassword">Contraseña</label>
    <input type="password" name="inputPassword" id="password" placeholder="Introduce tu contraseña">
    
    <div class="form-txt">
    <a href="../documentosLegales/privacidad.php">Politica de privacidad</a>
    <a href="../documentosLegales/terminos.php">Terminos y condiciones</a>
    </div>
    <input class="btn" type="submit" value="Enviar">
    </div>
    </form>
    </body>
    </html>

</body>
</html>