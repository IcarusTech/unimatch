<?php
error_reporting (0);//Funcion para ocultar las advertencias del programa
session_start();//Iniciar una sesion
if (isset($_SESSION['usuario'])) {   
    //Si ya ha iniciado sesión, la pagina le mandara a explorador.php
    header("Location: ../indexRegistrado.php");
    exit();//Finalizar el script actual
}else{
    echo("Error");
}
$dbhost = "localhost";
$dbuser = "marcos";
$dbpassword = "1234";
$dbname = "unimatch";

//Conexion con la base de datos
$conexion = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conexion) {
    die("Error de conexión :" . mysqli_connect_error());
}
$nombreUsuario = $_POST['nombre'];
$password = $_POST['inputPasword'];
//Consulta con la BD
$query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario = '$nombreUsuario' AND contrasena ='$password'");
//Comprobamos que se ha recuperado al menus un registro del usuario
$num = mysqli_num_rows($query);
if ($num == 1) {
    header("location: ../indexRegistrado.php");
} else {
    header("location: index.php");
}
?>