<?php
$valorFavorito = $_POST["idFavorito"];
$valorIdPropio = $_POST["idPropio"];
echo "Ha llegado a eliminarFavorito.php\n";
echo "la id del usuario favorito es:".$valorFavorito."\n";
echo "mi id es:".$valorIdPropio."\n";
require_once("../modelo/DBperfil.php");
$conexion = new \modelo\DBperfil;
