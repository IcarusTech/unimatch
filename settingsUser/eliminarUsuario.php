<?php
require_once("../modelo/DBusuario.php");
$conexion = new \modelo\DBusuario();
$nombreUsuario = $_POST['nombreUsuario'];
$id_usuario = $_POST['id_usuario'];
$contrasena = $_POST['contrasena'];
$conexion->delete($nombreUsuario, $contrasena);
$file = '../datosRegistros/datos.json';
//Buscamos en el archivo json el perfil propio y eliminamos dicha posicion
$current_data = file_get_contents($file);
$data = json_decode($current_data, true);
foreach ($data as $clave => $valor) {
    foreach ($valor as $clave2 => $valor2) {
        if ($clave2 == "id usuario asociado" && $valor2 == $id_usuario) {
            $url = $valor["url"]; //Cogemos el valor de la url para ir al archivo específico del usuario
            //Cambiomas el valor del nombre del usuario para que concuerde con el nuevo nombre del input
            unset($data[$clave]); //eliminamos la posicion del array del perteneciente al perfil
        }
    }
}
$data = array_values($data);
// Codificar el array de nuevo en JSON
$json = json_encode($data,JSON_PRETTY_PRINT);
file_put_contents($file, $json);
//Ahora eliminamos el archivo exclusivo del perfil
$filePerfil =$url;
if (file_exists($filePerfil)) {
    unlink($filePerfil);
}
$fileNotificacion="../datosRegistros/notificaciones/usuario-$id_usuario";
if(file_exists($fileNotificacion)){
    unlink($fileNotificacion);
}
header("Location: ../registroForm/form.php");