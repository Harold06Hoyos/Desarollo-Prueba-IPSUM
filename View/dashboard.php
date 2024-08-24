<?php
session_start();
if (!isset($_SESSION["userId"])) {
    echo '<script>window.location.href="../view/user_login.php";</script>';
}

require_once '../model/consultar_users.php';
$id = $_SESSION["userId"];
$classUser = new User();
$users = $classUser->consultar($id);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="user-card">

            <div class="user-info">
                <?php
                $consulta_usuarios = include("../model/consultar_users.php");

                ?>
            </div>
            <div class="user-photo">
                <img src="
              css/imagenes/Header.png
                " alt="Foto de Usuario">
                <?php
                ?>

            </div>
        </div>
    </div>
</body>

</html>