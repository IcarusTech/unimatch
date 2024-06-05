<?php
class DBmail
{

    private $dbhost = "localhost";
    private $dbuser = "marcos";
    private $dbpassword = "1234";
    private $dbname = "unimatch";
    private $table = "mail";
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
    public function mensajeBienvenida($correo,$contrasena)
    {
        $fecha=date('Y-m-d');
        $message = '';
        $to      = $correo; // Enviar Email al usuario
        $subject = 'Bienvenid@ a Unimatch'; // Darle un asunto al correo electrónico
        $message = '
 
        Gracias por registrarte!
        Tu cuenta ha sido creada con exito, disfruta de nuestra obra maestra.
        Estos son tus datos personales, no los pierdas ;)
        ------------------------
        Correo: ' . $correo . '
        Contraseña: ' . $contrasena . '
        ------------------------
        '; 
        // Aqui se incluye la URL para ir al mensaje

        $headers = 'From:fernandemarcos11@gmail.com' . "\r\n"; // Colocar el encabezado
        mail($to, $subject, $message, $headers); // Enviar el correo electrónico

        $select = mysqli_query($this->conexion, "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'");
        $row = mysqli_fetch_assoc($select);
        $id_usuario = $row['id_usuario'];{

        }
        if($id_usuario)
        $insertar = mysqli_query($this->conexion, "INSERT INTO $this->table (asunto,fecha,id_usuario_receptor) VALUES ('$subject,$fecha,$id_usuario')");
        
    }
}
