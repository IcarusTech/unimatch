<div class="cant-usuarios">
<h1>Personas registradas</h1>

<div class="loader">

    <div>
        <?php

        require_once "modelo/DBUsuario.php";
        $mostrarUsuario = new \modelo\DBusuario();
        $mostrarUsuario->contarUsuarios();
        ?>
    </div>
</div>
</div>