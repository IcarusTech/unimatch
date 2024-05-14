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
$correo = $_POST['inputCorreo'];
$password = $_POST['inputPasword'];
$caracter="@";
$nombreUsuario=substr($correo, 0, strpos($correo, $caracter));
//Consulta con la BD
$insert = mysqli_query($conexion, "INSERT INTO usuarios (correo,nombre_usuario,contrasena) values ('$correo','$nombreUsuario','$password')");
$query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena ='$password'");
//Comprobamos que se ha recuperado al menus un registro del usuario
$num = mysqli_num_rows($query);
if ($num == 1) {
    header("location: ../perfil/formulario.php?usuario=$nombreUsuario");
} else {
    header("Location:form.php");
}
?>
<!--    <script>console.log('{$nombreUsuario}');</script>