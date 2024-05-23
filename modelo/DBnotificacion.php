<?php

class DBnotificacion{

   private $dbhost = "localhost";
   private $dbuser = "marcos";
   private $dbpassword = "1234";
   private $dbname = "unimatch";
   private $conexion;

   public function __construct()
   {
       $this->conexion = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);
       $this->conexion->select_db($this->dbname);
       $this->conexion->query("SET NAMES 'utf8'");
       if (!$this->conexion) {
           die("Error de conexion: " . mysqli_connect_error());
       }

   }
     //metodo por completar
   public function enviarNotificacionUsuarioNuevo($id_receptor,$titulo, $contenido,$fecha){

        $insertar = "INSERT INTO notificaciones (titulo,contenido, fecha, id_usuario_receptor) VALUES ('$titulo','$contenido', '$fecha','$id_receptor')";
       
        if (mysqli_query($this->conexion, $insertar)) {
            echo "
            <h1>$titulo</h1>
            <p>$contenido<p/>
            <p>$fecha</p>
            ";
            exit();
        } else {
            echo "Error: " .mysqli_error($this->conexion);
        }
    

   }

}


?>