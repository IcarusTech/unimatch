<?php
session_start(); //Iniciar una sesion
$nombreUsuario = $_POST['nombre'];
$password = $_POST['inputPasword'];
error_reporting(E_ALL);
$dbhost = "localhost";
$dbuser = "marcos";
$dbpassword = "1234";
$dbname = "unimatch";


$_SESSION['usuario'] = $nombreUsuario;
//Conexion con la base de datos
$conexion = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conexion) {
    die("Error de conexión :" . mysqli_connect_error());
}

//Consulta con la BD
$query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario='$nombreUsuario' AND contrasena='$password'");
//Comprobamos que se ha recuperado al menus un registro del usuario
$num = mysqli_num_rows($query);
if ($num == 1 && isset($_SESSION['usuario'])) {
    echo "<script>
    console.log('usuario y contraseña incorrecta')
    </script>";
    //Si ya ha iniciado sesión, la pagina le mandara a explorador.php
    header("Location: ../indexRegistrado.php");
    exit(); //Finalizar el script actual

} else {            
    header("Location: inicioSesion.php");
}
