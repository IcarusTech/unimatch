<?php

namespace modelo;

use mysqli;

class BDusuario
{
    private $dbhost = "localhost";
    private $dbuser = "marcos";
    private $dbpassword = "1234";
    private $dbname = "unimatch";
    private $table = "usuarios";
    private $conexion;
    /**
     * @param string $dbhost
     * @param string $dbuser
     * @param string $dbpassword
     * @param string $dbname
     */
    public function __construct()
    {
        $this->conexion = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);
        $this->conexion->select_db($this->dbname);
        if (!$this->conexion) {
            die("Error de conexión :" . mysqli_connect_error());
        }
    }
    

    public function login($user, $password)
    {
       
        $query = mysqli_query($this->conexion, "SELECT * FROM $this->table WHERE nombre_usuario = '$user' AND contrasena ='$password'");
        $num = mysqli_num_rows($query);
        echo $num;
        if ($num == 1) {
            session_start();
            $_SESSION['usuario'] = $user; //El nombre de la sesión es igual al nombre del usuario
            header("location: ../indexRegistrado.php?usuario=$user"); //Lo redirigimos al index registrado
        } else {
            // header("location: ../inicioSesionForm/inicioSesion.php");
        }
    }
    public function create($correo, $password)
    {
    
        $caracter = "@";
        $nombreUsuario = substr($correo, 0, strpos($correo, $caracter));
        //Consulta con la BD
        $insert = mysqli_query($this->conexion, "INSERT INTO $this->table (correo,nombre_usuario,contrasena) values ('$correo','$nombreUsuario','$password')");
        $query = mysqli_query($this->conexion, "SELECT * FROM $this->table WHERE correo = '$correo' AND contrasena ='$password'");
        $id_usuario = mysqli_query($this->conexion, "SELECT id_usuario FROM $this->table WHERE correo = '$correo' AND contrasena ='$password'");
        //Comprobamos que se ha recuperado al menus un registro del usuario
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            session_start();//Iniciar una sesion
            header("location: ../perfil/formulario.php?usuario=$nombreUsuario?id_usuario=$id_usuario");
        } else {
            header("Location:form.php");
        }
    }
    public function delete($user, $password, $confirmacion)
    {
       
        $query = mysqli_query($this->conexion, "SELECT * FROM $this->table WHERE nombre_usuario = '$user' AND contrasena ='$password'");
        //Comprobamos que se ha recuperado al menus un registro del usuario
        $num = mysqli_num_rows($query);
        if ($num == 1 && $confirmacion) {
            $delete = mysqli_query($this->conexion, "DELETE FROM $this->table WHERE nombre_usuario = '$user' AND contrasena ='$password'");
        }
    }
    public function update($user, $confirmacion,$campo,$valor){
       
        $query = mysqli_query($this->conexion, "SELECT * FROM $this->table WHERE nombre_usuario = '$user'");
        //Comprobamos que se ha recuperado al menus un registro del usuario
        $num = mysqli_num_rows($query);
        if ($num == 1 && $confirmacion) {
            $update = mysqli_query($this->conexion, "UPDATE  $this->table SET $campo=$valor WHERE nombre_usuario = '$user'");
        }
    }
}
