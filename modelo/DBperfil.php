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
    public function create($nombre,$apellido,$fecha_nacimiento,$curso,$genero,$color_pelo,$color_ojos,$estilo_musical,$fumador,$tipo_personalidad,$tipo_amistad,$planes,$hobbies,$definicion_personal,$instagram,$id_usuario)
    {

        //Consulta con la BD
        $insert = mysqli_query($this->conexion, "INSERT INTO $this->table (nombre,apellido,fecha_nacimiento,curso,genero,color_pelo,color_ojos,estilo_musical,fumador,tipo_personalidad,tipo_amistad,planes,hobbies,definicion_personal,instagram,id_usuario) 
                  values ('$nombre','$apellido','$fecha_nacimiento','$curso','$genero','$color_pelo','$color_ojos','$estilo_musical','$fumador','$tipo_personalidad','$tipo_amistad','$planes','$hobbies','$definicion_personal','$instagram','$id_usuario')");
        $query = mysqli_query($this->conexion, "SELECT * FROM $this->table WHERE nombre = '$nombre' AND apellido ='$apellido' AND curso='$curso'");
        //Comprobamos que se ha recuperado al menus un registro del usuario
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            session_start();//Iniciar una sesión o continuarla
            header("location: ../indexRegistrado.php");
        } else {
            header("Location: formulario.php");
        }
    }
}