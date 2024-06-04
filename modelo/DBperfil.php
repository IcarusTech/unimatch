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
        //$_SESSION['usuario'] = $nombre;
        if ($num == '1') {

            header("location: ../inicioSesionForm/inicioSesion.php");
            session_destroy();
            exit();
        } else {
            header("Location: ../perfil/formulario.php");
        }
    }
    public function ponerImg($id_usuario, $colorPelo, $colorOjos, $sexo)
    {
        $img = "";
        // URL o ruta al archivo JSON
        $jsonFile = '../avatares/avatares.json';

        // Obtener el contenido del archivo JSON
        $jsonData = file_get_contents($jsonFile);

        // Decodificar el JSON a un array asociativo
        $data = json_decode($jsonData, true);


        foreach ($data as $avatar) {
            if ($avatar['sexo'] == $sexo && $avatar['color-ojos'] == $colorOjos && $avatar['color-pelo'] == $colorPelo) {
                $img = "../unimatch/avatares/" . $avatar['ruta'];
            }
        }

        return $img;
    }
    public function agregarFavoritos($nuevoIdFavorito, $id_propio)
    {
        echo "\n llega a la funcion editarFavoritos";
        $select = mysqli_query($this->conexion, "SELECT lista_favoritos FROM $this->table WHERE id_usuario =$id_propio");
        $row = mysqli_fetch_assoc($select);
        $antiguaListaFavoritos = $row['lista_favoritos'];
        $arraLista = explode(",", $antiguaListaFavoritos);
        $arraLista[] = $nuevoIdFavorito;
        $favoritosActualizados = implode(",", $arraLista);
        $update = mysqli_query($this->conexion, "UPDATE perfil SET lista_favoritos='$favoritosActualizados' WHERE id_usuario=$id_propio");
    }
    public function eliminarFavorito($viejoIdFavorito, $id_propio)
    {
        echo "\n llega a la funcion editarFavoritos";
        $select = mysqli_query($this->conexion, "SELECT lista_favoritos FROM $this->table WHERE id_usuario =$id_propio");
        $row = mysqli_fetch_assoc($select);
        $antiguaListaFavoritos = explode(",", $row['lista_favoritos']);

        for ($i = 0; $i < count($antiguaListaFavoritos); $i++) {
            if ($antiguaListaFavoritos[$i] == $viejoIdFavorito) {
                array_splice($antiguaListaFavoritos, $i, 1); // Elimina el elemento en la posición $i
                
            }
        }

        $nuevaListaFavoritos = implode(",", $antiguaListaFavoritos);
        $update = mysqli_query($this->conexion, "UPDATE perfil SET lista_favoritos='$nuevaListaFavoritos' WHERE id_usuario=$id_propio");
    }

    public function consultarFavoritos($id_usuario){

        $select = mysqli_query($this->conexion, "SELECT lista_favoritos FROM $this->table WHERE id_usuario =$id_usuario");
        $row = mysqli_fetch_assoc($select);
        $listaFavoritos = $row['lista_favoritos'];

        return $listaFavoritos;
    }

    public function mostrarDefiniciones($id_usuario){

        $select = mysqli_query($this->conexion, "SELECT * FROM $this->table WHERE id_usuario =$id_usuario");
        $row = mysqli_fetch_assoc($select);
        $definiciones = $row['definicion_personal'];
        return $definiciones;

    }

    public function mostrarNombre($id_usuario){

        $select = mysqli_query($this->conexion, "SELECT * FROM $this->table WHERE id_usuario =$id_usuario");
        $row = mysqli_fetch_assoc($select);
        $nombre = $row['nombre'];
        return $nombre;

    }

    public function mostrarApellido($id_usuario){

        $select = mysqli_query($this->conexion, "SELECT * FROM $this->table WHERE id_usuario =$id_usuario");
        $row = mysqli_fetch_assoc($select);
        $apellido = $row['apellido'];
        return $apellido;

    }

    public function mostrarFoto($id_usuario){

        $select = mysqli_query($this->conexion, "SELECT * FROM $this->table WHERE id_usuario =$id_usuario");
        $row = mysqli_fetch_assoc($select);
        $imagen = $row['imagen'];
        return $imagen;

    }

}
