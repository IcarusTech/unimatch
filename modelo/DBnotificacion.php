<?php

class DBnotificacion
{

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
    public function enviarNotificacionUsuarioNuevo($id_receptor)
    {
        $titulo = "Bienvenido a nuestra comunidad";
        $contenido = "Este es el contenido";
        $fecha = date('Y-m-d');
        $insertar = mysqli_query($this->conexion, "INSERT INTO notificaciones (titulo,contenido, fecha, id_usuario_receptor) VALUES ('$titulo','$contenido', '$fecha','$id_receptor')");
        $carpeta = "../datosRegistros/notificaciones/usuario-".$id_receptor;
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
        //------------------------------------
        $file = '../datosRegistros/notificaciones/usuario-'.$id_receptor.'/mensajeBienvenida.json';
        // lee los datos del archivo json
        
        // array con datos del usuario
        $data_array = array(

            'id usuario asociado' => $id_receptor,
            "titulo" => $titulo,
            "contenido" => $contenido,
            "fecha" => $fecha

        );
        // lo pasa a json
        $new_data_json = json_encode($data_array, JSON_PRETTY_PRINT);
        // mete el contenido en un archivo
        file_put_contents($file, $new_data_json);
        /* if (mysqli_query($this->conexion, $insertar)) {
            echo "
            <h1>$titulo</h1>
            <p>$contenido<p/>
            <p>$fecha</p>
            ";
            exit();
        } else {
            echo "Error: " .mysqli_error($this->conexion);
        } */
    }
}
