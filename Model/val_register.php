<?php

class valRegister
{

    // verificar existencia del usuario
    public function existUser($email, $conexion)
    {
        $sql = $conexion->query("SELECT email FROM usuarios WHERE email = '$email'");

        if ($sql->num_rows > 0) {
            echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Este correo ya se encuentra en uso',
                            showCancelButton: false,
                            confirmButtonColor: '#FF0000',
                            confirmButtonText: 'OK',
                            timer: 6000
                        }).then(() => {
                            location.assign('../view/register.php');
                        });
                    });
                    </script>";
            exit();
        }
    }

    // verificacion de contraseñas
    public function comparePassword($contrasena, $confirmar_contrasena)
    {

        if ($contrasena != $confirmar_contrasena) {
            echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Las contraseñas no coinciden',
                            showCancelButton: false,
                            confirmButtonColor: '#FF0000',
                            confirmButtonText: 'OK',
                            timer: 6000
                        }).then(() => {
                            location.assign('../view/register.php');
                        });
                    });
                    </script>";
            die();
        }
    }

    function subirArchivo($cedula, $registrador, $programa, $fecha, $certificador, $archivo)
    {
        $nombreArchivo = $archivo['name'];
        $archivoTemporal = $archivo['tmp_name'];

        // Ruta relativa al directorio accesible desde el navegador
        $carpetaDestino = '../archivos/';

        // Crear la ruta completa
        $rutaDestino = $carpetaDestino . basename($nombreArchivo);

        // Mover el archivo al destino
        if (move_uploaded_file($archivoTemporal, $rutaDestino)) {
            $conexion = new Conexion();
            $conn = $conexion->conMysql();

            // Usar consultas preparadas para prevenir inyección SQL
            $sql = "INSERT INTO tbl_certificados (cedula, registrador, programa, fecha, certificador, nombre_archivo, archivo) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $cedula, $registrador, $programa, $fecha, $certificador, $nombreArchivo, $rutaDestino);

            // Ejecutar la consulta y cerrar la conexión
            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();
                return true; // Éxito
            } else {
                // Manejar errores de SQL aquí
                error_log("Error al ejecutar la consulta: " . $stmt->error);
            }
        }

        return false; // Error
    }



    // registro de usuario
    public function registerUser($nombre, $apellido, $email, $telefono, $pais, $passHash, $rol, $foto, $conexion)
    {

        $nombreArchivo = $foto['name'];
        $archivoTemporal = $foto['tmp_name'];

        $carpetaDestino = 'C:/xampp/htdocs/Desarollo-Prueba-IPSUM-1/archivos/';
        $rutaDestino = $carpetaDestino . $nombreArchivo;

        if (move_uploaded_file($archivoTemporal, $rutaDestino)) {
            $sql = "INSERT INTO usuarios (first_name, last_name, email, phone, country, contrasena, `role`, archivo) VALUES ('$nombre', '$apellido', '$email', '$telefono', '$pais', '$passHash', '$rol', '$rutaDestino')";
            try {
                $ejecutar = mysqli_query($conexion, $sql);
                if ($ejecutar) {
                    echo "
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script language='JavaScript'>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Usuario Almacenado Exitosamente',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK',
                                timer: 5000
                            }).then(() => {
                                location.assign('../view/user_login.php');
                            });
                        });
                        </script>";
                } else {
                    echo "
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script language='JavaScript'>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'El email:  $email, ya se encuentra registrado',
                                showCancelButton: false,
                                confirmButtonColor: '#FF0000',
                                confirmButtonText: 'OK',
                                timer: 5000
                            }).then(() => {
                                location.assign('../view/register.php');
                            });
                        });
                        </script>";
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Salio mal al mover el archivo',
                    showCancelButton: false,
                    confirmButtonColor: '#FF0000',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    location.assign('../view/register.php');
                });
            });
            </script>";
        }
    }

    // Agregar preguntas
    public function agregarPreguntas($comida_favorita, $artista_favorito, $lugar_favorito, $color_favorito, $user_id,  $conexion)
    {
        // Establecer la consulta SQL
        $sql = "INSERT INTO preguntas (favorite_food, favorite_artist, favorite_place, favorite_color, user_id) VALUES ('$comida_favorita', '$artista_favorito', '$lugar_favorito', '$color_favorito', $user_id)";
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                // Acción exitosa, puedes redirigir directamente o mostrar un mensaje en PHP
                header('Location: ../view/user_login.php');
                exit;
            } else {
                // En caso de error, puedes redirigir o mostrar un mensaje de error
                header('Location: ../view/register.php?error=1');
                exit;
            }
        } catch (Exception $e) {
            // Manejo de excepciones, mostrar un mensaje o redirigir a una página de error
            echo "Error: " . $e->getMessage();
        }
    }


    public function getUserId($conexion)
    {
        // Ejecutar la consulta
        $sql = $conexion->query("SELECT user_id FROM usuarios ORDER BY user_id DESC LIMIT 1");

        // Verificar si hay resultados
        if ($sql->num_rows > 0) {
            // Obtener el resultado como un arreglo asociativo
            $row = $sql->fetch_assoc();

            // Retornar el valor del user_id
            return $row['user_id'];
        } else {
            // Si no hay resultados, puedes retornar null o un valor por defecto
            return null;
        }
    }


    public function Recaptcha($keyCaptcha)
    {
        $succesFull = false;

        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $keyCaptcha . '&response=' . $_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);

            if ($responseData->success) {
                $succesFull = true;
            } else {

                echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error en la validación reCAPTCHA',
                    confirmButtonColor: '#D63030',
                    confirmButtonText: 'OK',
                    timer: 6000
                }).then(() => {
                    location.assign('../view/register.php');
                });
            });
            </script>";
            }
        }
        return $succesFull;
    }
    public function obtenerPreguntas($conexion)
    {
        $sql = $conexion->query("SELECT * FROM preguntas");

        if ($sql->num_rows > 0) {
            echo "
                    <scrip src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <scrip language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Este usuario no esta registrado',
                            showCancelButton: false,
                            confirmButtonColor: '#FF0000',
                            confirmButtonText: 'OK',
                            timer: 6000
                        }).then(() => {
                            location.assign('../view/register.php');
                        });
                    });
                    </script>";
            exit();
        }
        var_dump($sql);
    }
}
