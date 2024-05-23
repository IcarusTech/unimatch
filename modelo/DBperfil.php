<?php

namespace modelo;

use mysqli;

class DBperfil
{
    private $dbhost = "localhost";
    private $dbuser = "marcos";
    private $dbpassword = "1234";
    private $dbname = "unimatch";
    private $table = "perfil";
    private $conexion;
    public function __construct()
    {
        $this->conexion = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);
        $this->conexion->select_db($this->dbname);
        if (!$this->conexion) {
            die("Error de conexión :" . mysqli_connect_error());
        }
    }
    public function create($nombre, $apellido, $fecha_nacimiento, $curso, $genero, $color_pelo, $color_ojos, $estilo_musical, $fumador, $tipo_personalidad, $tipo_amistad, $planes, $hobbies, $definicion_personal, $instagram, $urlImagen, $id_usuario)
    {
        //Consulta con la BD
        $insert = mysqli_query($this->conexion, "INSERT INTO $this->table (nombre,apellido,fecha_nacimiento,curso,genero,color_pelo,color_ojos,estilo_musical,fumador,tipo_personalidad,tipo_amistad,planes,hobbies,definicion_personal,instagram,imagen,id_usuario) values ('$nombre','$apellido','$fecha_nacimiento','$curso','$genero','$color_pelo','$color_ojos','$estilo_musical','$fumador','$tipo_personalidad','$tipo_amistad','$planes','$hobbies','$definicion_personal','$instagram','$urlImagen','$id_usuario')");
        $query = mysqli_query($this->conexion, "SELECT * FROM $this->table WHERE nombre = '$nombre' AND apellido ='$apellido' AND curso='$curso'");
        //Comprobamos que se ha recuperado al menus un registro del usuario
        $num = mysqli_num_rows($query);
        $_SESSION['usuario'] = $nombre;
        if ($num == '1') {
            session_start(); //Iniciar una sesión o continuarla
            header("location: ../indexRegistrado.php");
        } else {
            header("Location: ../perfil/formulario.php");
        }
    }
    public function ponerImg($id_usuario, $colorPelo, $colorOjos, $sexo)
    {
        $img="";
        // URL o ruta al archivo JSON
        $jsonFile = '../avatares/avatares.json';

        // Obtener el contenido del archivo JSON
        $jsonData = file_get_contents($jsonFile);

        // Decodificar el JSON a un array asociativo
        $data = json_decode($jsonData, true);

        
        foreach ($data as $avatar){
           if($avatar['sexo']==$sexo && $avatar['color-ojos']==$colorOjos && $avatar['color-pelo']==$colorPelo){
           $img="../avatares/".$avatar['ruta'];
           }
        }
        
        return $img;
    }
}
