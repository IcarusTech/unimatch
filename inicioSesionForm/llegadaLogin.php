<?php
$dbhost = "localhost";
$dbuser = "marcos";
$dbpassword = "1234";
$dbname = "unimatch";

//Conexion con la base de datos
$conexion = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conexion) {
    die("Error de conexión :" . mysqli_connect_error());
}
$correo = $_POST['nombre'];
$password = $_POST['inputPasword'];
$caracter="@";
$nombreUsuario=substr($correo, 0, strpos($correo, $caracter));
//Consulta con la BD
$query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario = '$nombreUsuario' AND contrasena ='$password'");
//Comprobamos que se ha recuperado al menus un registro del usuario
$num = mysqli_num_rows($query);
if ($num == 1) {
    header("location: ../indexRegistrado.php");
} else {
    header("index.php");
}
?>