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
    <link rel="stylesheet" href="css/main/dashboard.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">
</head>

<body>
    <div>
        <a class="exit-link" href="../model/cerrar_session.php">
            <i class="fa fa-right-from-bracket fa-beat" style="color: #ff0000"></i>
        </a>
    </div>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="user-card">
            <?php foreach ($users as $user) { ?>
                <div class="user-photo">
                    <!-- <img src="<?php echo $user['archivo']; ?>" alt="Foto de Usuario"> -->
                    <img src="../archivos/<?php echo $user['archivo']; ?>" alt="Foto de Usuario">

                </div>
                <div class="user-info">
                    <h3><?php echo $user["first_name"] . " " . $user["last_name"]; ?></h3>
                    <p><span class="user-label">Email:</span> <?php echo $user["email"]; ?></p>
                    <p><span class="user-label">Teléfono:</span> <?php echo $user["phone"]; ?></p>
                    <p><span class="user-label">País:</span> <?php echo $user["country"]; ?></p>
                    <p><span class="user-label">Comida favorita:</span> <?php echo $user["favorite_food"]; ?></p>
                    <p><span class="user-label">Artista favorito:</span> <?php echo $user["favorite_artist"]; ?></p>
                    <p><span class="user-label">Lugar favorito:</span> <?php echo $user["favorite_place"]; ?></p>
                    <p><span class="user-label">Color favorito:</span> <?php echo $user["favorite_color"]; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>