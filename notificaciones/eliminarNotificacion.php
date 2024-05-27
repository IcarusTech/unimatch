<?php
$id_usuario = $_POST['idPropio'];
$posicion = $_POST['posicion'];
$file = '../datosRegistros/notificaciones/usuario-'.$id_usuario.'.json';
$json_file = file_get_contents($file);
$data = json_decode($json_file, true);
$data[$posicion]['leido'] = true;
$new_data_json = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents($file, $new_data_json);