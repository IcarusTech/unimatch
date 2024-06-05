<?php

class DBnotificacion
{

    private $dbhost = "localhost";
    private $dbuser = "marcos";
    private $dbpassword = "1234";
    private $dbname = "unimatch";
    private $table = "notificaciones";
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
    public function enviarNotificacionUsuarioNuevo($id_receptor)
    {    
        $leido=false;
        $titulo = "Bienvenido a nuestra comunidad";
        $contenido = "Muchas gracias por unirte a nuestra comunidad...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
        $fecha = date('Y-m-d');
        $insertar = mysqli_query($this->conexion, "INSERT INTO $this->table (titulo,contenido, fecha, id_usuario_receptor) VALUES ('$titulo','$contenido', '$fecha','$id_receptor')");
        
        //------------------------------------
        $file = '../datosRegistros/notificaciones/usuario-'.$id_receptor.'.json';
        if (!file_exists($file)) {
            // Si no existe, crea un array vacío
            $data = array();
        
            // Codifica el array en formato JSON
            $json_data = json_encode($data, JSON_PRETTY_PRINT);
        
            // Escribe el contenido JSON en el archivo
            file_put_contents($file, $json_data);
        }
        //------------------------------------
        // lee los datos del archivo json
       $current_data = file_get_contents($file);
       // convierte el json en php
      $data_array = json_decode($current_data, true);
        // array con datos del usuario
        $new_object = array(

            'id usuario asociado' => $id_receptor,
            "titulo" => $titulo,
            "contenido" => $contenido,
            "fecha" => $fecha,
            "leido"=> $leido

        );
        // lo mete en una variable
        $data_array[] = $new_object;
        // lo pasa a json
        $new_data_json = json_encode($data_array, JSON_PRETTY_PRINT);
        // mete el contenido en un archivo
        file_put_contents($file, $new_data_json);
       
    }
}
