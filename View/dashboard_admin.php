<?php
session_start();
if (!isset($_SESSION["role"])) {
    echo '<script>window.location.href="../view/user_login.php";</script>';
} else if ($_SESSION["role"] == "2") {
    echo '<script>window.location.href="../view/dashboard.php";</script>';
}

// Incluir el archivo PHP que devuelve los datos de usuario
$usuariosAdmin = require_once("../model/consulta_admin.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="images/logo-redondo.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Consultar Usuarios</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/dasboard_admin/admin.css" />
    <link rel="stylesheet" type="text/css" href="css/dasboard_admin/header.css" />
</head>



<body>
    <div class="header">
        <div class="header-container">
            <a class="exit-link" href="../model/cerrar_session.php">
                <i class="fa fa-right-from-bracket fa-beat"></i>
                <span class="exit-text">Cerrar Sesión</span>
            </a>
        </div>

    </div>

    <main class=" table" id="customers_table">
        <section class="table__header">
            <h1>Usuarios</h1>
            <div class="input-group">
                <input id="search" type="search" placeholder="Buscar usuario" />
                <img src="css/imagenes/search.png" alt="" />
            </div>

        </section>

        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Nombre<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Apellido <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Telefono <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Pais <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Rol <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Pregunta #1<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Respuesta #1 <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Pregunta<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Respuesta #2<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Pregunta<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Respuesta #3<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Pregunta<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Respuesta #4<span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuariosAdmin as $usuario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['phone']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['country']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['role']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['pregunta_1']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['respuesta_1']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['pregunta_2']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['respuesta_2']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['pregunta_3']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['respuesta_3']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['pregunta_4']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['respuesta_4']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Modal de novedades para móvil -->
        <div id=" modalNovedades" class="modal">
            <div class="modal-content">
                <span class="close"><i class="fa-solid fa-xmark fa-bounce"></i></span>
                <div id="modalContentNovedades"></div>
                <!-- contenido del modal -->
            </div>
        </div>

        <!-- Modal de editar descripción novedad -->
        <div id="modalEditarDescripcion" class="modal">
            <div class="modal-content">
                <span class="close"><i class="fa-solid fa-xmark fa-bounce"></i></span>
                <div id="modalContentEditarDescripcion"></div>
                <!-- contenido del modal -->
            </div>
        </div>

    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../controller/js/allNovedades.js"></script>

</body>

</html>