<?
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    // Si no hay sesión o el usuario no es admin, redirigir a login o mostrar mensaje de error
    header("Location: ../inicioSesionForm/inicioSesion.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Esta es la pagina admin</h1>
</body>
</html>