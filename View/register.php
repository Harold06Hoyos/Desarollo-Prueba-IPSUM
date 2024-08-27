<?php
require_once("../Controller/ctr_getPreguntas.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="css/imagenes/logo.ico" type="image/x-icon">

    <title>Registro WePlot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../View/css/register/register.css">
</head>

<body>

    <div class="register-container">
        <div class="image-container"></div>

        <div class="form-container">
            <div class="header-image-container">
                <img src="Css/Imagenes/Header.png" alt="Imagen superior" class="header-image">
            </div>

            <div class="social-buttons">
                <button class="btn btn-danger w-100 mb-2">Registro con Google</button>
                <button class="btn btn-primary w-100">Registro con Facebook</button>
            </div>

            <div class="divider">
                <hr>O diligencia el formulario
                <hr>
            </div>

            <!-- Formulario modificado -->
            <form action="../controller/ctr_register.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="apellido">Apellido*</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="telefono">Teléfono*</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pais">País</label>
                    <input type="text" class="form-control" id="pais" name="pais">
                </div>

                <?php
                $obtenerPreguntas = new valPreguntas();
                $preguntas = $obtenerPreguntas->obtenerPreguntas($conn);
                $question1 = $preguntas[0]['question'] ?? '';
                $question2 = $preguntas[1]['question'] ?? '';
                $question3 = $preguntas[2]['question'] ?? '';
                $question4 = $preguntas[3]['question'] ?? ''; ?>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="question1" id="label_question_1"><?php echo htmlspecialchars($question1); ?></label>
                        <input type="hidden" id="hidden_question_1" name="question_1_hidden" value="<?php echo htmlspecialchars($question1); ?>">
                        <input type="text" class="form-control" id="answer_1" name="answer_1">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="question2" id="label_question_2"><?php echo htmlspecialchars($question2); ?></label>
                        <input type="hidden" id="hidden_question_2" name="question_2_hidden" value="<?php echo htmlspecialchars($question2); ?>">
                        <input type="text" class="form-control" id="answer_2" name="answer_2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="question3" id="label_question_3"><?php echo htmlspecialchars($question3); ?></label>
                        <input type="hidden" id="hidden_question_3" name="question_3_hidden" value="<?php echo htmlspecialchars($question3); ?>">
                        <input type="text" class="form-control" id="answer_3" name="answer_3">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="question4" id="label_question_4"><?php echo htmlspecialchars($question4); ?></label>
                        <input type="hidden" id="hidden_question_4" name="question_4_hidden" value="<?php echo htmlspecialchars($question4); ?>">
                        <input type="text" class="form-control" id="answer_4" name="answer_4">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="contrasena">Contraseña*</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="confirmar-contrasena">Confirmar contraseña*</label>
                        <input type="password" class="form-control" id="confirmar-contrasena" name="confirmar_contrasena" required>
                    </div>
                </div>
                <div class="g-recaptcha" data-sitekey="6LfjIS8qAAAAAINSCmbPB4W2znXE5sr0MjDZyQQs"></div>
                <br>
                <div class="form-group">
                    <label for="foto">Seleccione un Archivo</label>
                    <input type="file" class="form-control-file" name="foto" id="foto" required>
                </div>

                <div class="row">
                    <div class=" col-md-6 form-group">
                        <button type=" submit" class="btn btn-success w-100">Registrarse</button>
                    </div>
                    <div class="col-md-6 form-group">
                        <button class="btn btn-success w-100"" onclick=" location.href='user_login.php'">¿Ya tienes cuenta?</button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src=" https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>