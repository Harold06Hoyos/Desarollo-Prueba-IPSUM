<?php
session_start();
if (!isset($_SESSION["userId"])) {
    echo '<script>window.location.href="../view/user_login.php";</script>';
}

//require_once("../Controller/ctr_getPreguntas.php");

//$id = $_SESSION["userId"];
//$classUser = new User();
//$users = $classUser->consultar($id);
require_once("../Controller/ctr_getPreguntas.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Estilo</title>
    <link rel="stylesheet" href="css/dasboard_admin/dashboardPreguntas.css">
</head>

<body>
    <div action="../controller/ctr_getPreguntas.php" class="form-container">
        <form>
            <?php

            ?>

            <div class="form-group">
                <label for="input1"><?php echo htmlspecialchars($preguntasObtenidas[0]['question']); ?>:</label>
                <input type="text" id="input1" name="input1" value="<?php echo htmlspecialchars(''); ?>">
            </div>
            <div class="form-group">
                <label for="input2"><?php echo htmlspecialchars($preguntasObtenidas[1]['question']); ?>:</label>
                <input type="text" id="input2" name="input2" value="<?php echo htmlspecialchars(''); ?>">
            </div>
            <div class="form-group">
                <label for="input3"><?php echo htmlspecialchars($preguntasObtenidas[2]['question']); ?>:</label>
                <input type="text" id="input3" name="input3" value="<?php echo htmlspecialchars(''); ?>">
            </div>
            <div class="form-group">
                <label for="input4"><?php echo htmlspecialchars($preguntasObtenidas[3]['question']); ?></label>
                <input type="text" id="input4" name="input4" value="<?php echo htmlspecialchars(''); ?>">
            </div>
            <div class="form-group">
                <button type="submit">Enviar</button>
            </div>

        </form>
    </div>
</body>

</html>