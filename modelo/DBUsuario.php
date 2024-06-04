<?php

namespace modelo;

use mysqli;

class DBusuario
{

    private $dbhost = "localhost";
    private $dbuser = "marcos";
    private $dbpassword = "1234";
    private $dbname = "unimatch";
    private $table = "usuarios";
    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);
        $this->conexion->select_db($this->dbname);
        $this->conexion->query("SET NAMES 'utf8'");
        if ($this->conexion->connect_error) {
            die("Error de conexión :" . $this->conexion->connect_error);
        }
    }

    public function login($user, $password)
    {
        error_reporting(0); //Funcion para ocultar las advertencias del programa
        $message = "Usuario o contraseña incorrecto";
        $query = $this->conexion->prepare("SELECT * FROM $this->table WHERE nombre_usuario = ? AND contrasena = ?");
        $query->bind_param("ss", $user, $password);
        $query->execute();
        $result = $query->get_result();
        $num = $result->num_rows;
        $idUsuario = $this->conexion->prepare("SELECT id_usuario FROM $this->table WHERE nombre_usuario = ? AND contrasena = ?");
        $idUsuario->bind_param("ss", $user, $password);
        $idUsuario->execute();
        $idUsuarioResult = $idUsuario->get_result();
        $permisoUsuario = $this->conexion->prepare("SELECT administrador FROM $this->table WHERE nombre_usuario = ? AND contrasena = ?");
        $permisoUsuario->bind_param("ss", $user, $password);
        $permisoUsuario->execute();
        $result = $permisoUsuario->get_result();
        $row = $result->fetch_assoc();
        $booleanAdministrador = (bool) $row['administrador'];
        if ($num == 1) {
            if ($booleanAdministrador) {
                $id_usuario = $idUsuarioResult->fetch_row();
                $_SESSION['user_type'] = 'admin';
                header("location: ../admin/indexAdmin.php?usuario=$user&id_usuario=$id_usuario[0]"); //Lo redirigimos al index registrado
            } else {
                session_start(); //iniciar sesion o continuarla
                $id_usuario = $idUsuarioResult->fetch_row();
                $_SESSION['usuario'] = $user; //El nombre de la sesión es igual al nombre del usuario
                header("location: ../indexRegistrado.php?usuario=$user&id_usuario=$id_usuario[0]"); //Lo redirigimos al index registrado
            }
        } else {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                let correccion = document.getElementById('correccion');
                correccion.innerHTML = 'Usuario o contraseña incorrectos';
                correccion.style.color = 'red';
                correccion.style.borderRadius = '10px';
            });
            </script>";
        }
    }

    public function create($correo, $password)
    {
        $caracter = "@";
        $nombreUsuario = substr($correo, 0, strpos($correo, $caracter));
        $insert = $this->conexion->prepare("INSERT INTO $this->table (correo, nombre_usuario, contrasena) VALUES (?, ?, ?)");
        $insert->bind_param("sss", $correo, $nombreUsuario, $password);
        $insert->execute();

        $query = $this->conexion->prepare("SELECT * FROM $this->table WHERE nombre_usuario = ? AND contrasena = ?");
        $query->bind_param("ss", $nombreUsuario, $password);
        $query->execute();
        $result = $query->get_result();

        $idUsuario = $this->conexion->prepare("SELECT id_usuario FROM $this->table WHERE nombre_usuario = ? AND contrasena = ?");
        $idUsuario->bind_param("ss", $nombreUsuario, $password);
        $idUsuario->execute();
        $idUsuarioResult = $idUsuario->get_result();

        $num = $result->num_rows;
        if ($num == 1) {
            session_start(); //iniciar sesion o continuarla
            $id_usuario = $idUsuarioResult->fetch_row();
            header("location: ../perfil/formulario.php?usuario=$nombreUsuario&id_usuario=$id_usuario[0]");
        } else {
            header("Location: form.php");
        }
    }

    public function delete($user, $password, $confirmacion)
    {
        $query = $this->conexion->prepare("SELECT * FROM $this->table WHERE nombre_usuario = ? AND contrasena = ?");
        $query->bind_param("ss", $user, $password);
        $query->execute();
        $result = $query->get_result();

        $num = $result->num_rows;
        if ($num == 1 && $confirmacion) {
            $delete = $this->conexion->prepare("DELETE FROM $this->table WHERE nombre_usuario = ? AND contrasena = ?");
            $delete->bind_param("ss", $user, $password);
            $delete->execute();
        }

        $json = 'datos.json';

        $jsonArray = json_decode($json, true); // Decodifica a array asociativo

        unset($jsonArray[$user]); // Elimina la posición 2

        $jsonArray = array_values($jsonArray); // Reindexa el array
    }


    public function update($user, $campo, $valor)
    {
        $query = $this->conexion->prepare("SELECT * FROM $this->table WHERE nombre_usuario = ?");
        $query->bind_param("s", $user);
        $query->execute();
        $result = $query->get_result();

        $num = $result->num_rows;
        if ($num == 1) {
            $update = $this->conexion->prepare("UPDATE $this->table SET $campo = ? WHERE nombre_usuario = ?");
            $update->bind_param("ss", $valor, $user);
            $update->execute();
        }
    }

    public function mostrarContrasena($id_usuario){
        
        $select = mysqli_query($this->conexion, "SELECT * FROM $this->table WHERE id_usuario = $id_usuario");
        $row = mysqli_fetch_assoc($select);
        $contrasena = $row['contrasena'];
        return $contrasena;
    }

    

    public function contarUsuarios()
    {
        $query = mysqli_query($this->conexion, "SELECT * FROM usuarios");
        //Comprobamos que se ha recuperado al menus un registro del usuario
        $num = mysqli_num_rows($query);
        echo ("<div class='total'><h1>+" . $num . "</h1></div>");
    }
}