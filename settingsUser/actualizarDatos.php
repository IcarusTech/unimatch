<?php
require_once("../modelo/DBusuario.php");
require_once("../modelo/DBperfil.php");
$conexion = new \modelo\DBusuario();
$conexionPerfil = new \modelo\DBperfil();
//Recogemos los datos que nos llegan del formulario de lso ajustes
$nombreUsuario = $_POST['nombre'];
$nombreUsuarioAntiguo = $_POST['nombreUsuarioAntiguo'];
$id_usuario = $_POST['id_usuario'];
$contrasena = $_POST['contrasena'];
$definicion1 = $_POST['definicion1'];
$definicion2 = $_POST['definicion2'];
$definicion3 = $_POST['definicion3'];
$deficionGlobalActualizada[] = $definicion1;
$deficionGlobalActualizada[] = $definicion2;
$deficionGlobalActualizada[] = $definicion3;
$stringDefinicionGlobal = implode("/", $deficionGlobalActualizada);
//Actualizamos los datos con las funciones de las clases
$conexion->update($nombreUsuarioAntiguo, "nombre_usuario", $nombreUsuario);
$conexion->update($nombreUsuarioAntiguo, "contrasena", $contrasena);
$conexionPerfil->update($id_usuario,"definicion_personal",$stringDefinicionGlobal);
//Cogemos los datos de los json (global y específico de cada perfil)
$file = '../datosRegistros/datos.json';
$current_data = file_get_contents($file);
// Convierte el string JSON en un objeto PHP
$data = json_decode($current_data, true);
foreach($data as $clave => $valor) {
    foreach($valor as $clave2 => $valor2) {
        if($clave2=="id usuario asociado" && $valor2==$id_usuario){
            $url = $valor["url"]; //Cogemos el valor de la url para ir al archivo específico del usuario
            //Cambiomas el valor del nombre del usuario para que concuerde con el nuevo nombre del input
            $data[$clave]["nombre del usuario"]=$nombreUsuario;
        }
    }
}
$new_data_json2 = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents($file, $new_data_json2);
//Cargamos los datos del perfil específico al coger la url específica en el otro json
$filePerfil =$url;
$current_data2 = file_get_contents($filePerfil);
// Convierte el string JSON en un objeto PHP
$data2 = json_decode($current_data2, true);
$data2["definicion_1"]=$definicion1;
$data2["definicion_2"]=$definicion2;
$data2["definicion_3"]=$definicion3;
$new_data_json = json_encode($data2, JSON_PRETTY_PRINT);
file_put_contents($filePerfil, $new_data_json);
header("Location: indexConfig.php?id_usuario=$id_usuario&usuario=$nombreUsuario");
exit();