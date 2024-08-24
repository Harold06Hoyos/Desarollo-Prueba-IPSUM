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

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="comida">Comida favorita</label>
                        <input type="text" class="form-control" id="comida" name="comida_favorita">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="artista">Artista favorito</label>
                        <input type="text" class="form-control" id="artista" name="artista_favorito">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="lugar">Lugar favorito</label>
                        <input type="text" class="form-control" id="lugar" name="lugar_favorito">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="color">Color favorito</label>
                        <input type="text" class="form-control" id="color" name="color_favorito">
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

                <div class="form-group">
                    <label for="foto">Seleccione un Archivo</label>
                    <input type="file" class="form-control-file" name="foto" id="foto" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Registrarse</button>

            </form>
        </div>
    </div>
</body>

</html>