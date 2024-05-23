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
    
   public function enviarNotificacionUsuarioNuevo( $id_remitente, $contenido){

        $insertar = "INSERT INTO notificaciones (id_notificacion, id_remitente, contenido, fecha, id_usuario_receptor) VALUES ('$id_remitente', '$contenido')";

        if (mysqli_query($this->conexion, $insertar)) {
            echo "Has recibido una notificacion proveniente de 
            <h1>$id_remitente<h1/>
            <p>$contenido<p/>
            ";
            exit();
        } else {
            echo "Error: " .mysqli_error($this->conexion);
        }
    

   }

}


?>