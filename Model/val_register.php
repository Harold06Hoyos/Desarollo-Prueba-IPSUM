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
        // Verificar que la contraseña tenga al menos 8 caracteres
        if (strlen($contrasena) < 8) {
            echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'La contraseña debe tener al menos 8 caracteres',
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

        // Verificar que la contraseña incluya al menos una letra mayúscula
        /*if (!preg_match('/[A-Z]/', $contrasena)) {
            echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'La contraseña debe incluir al menos una letra mayúscula',
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

        // Verificar que la contraseña incluya al menos un número
        if (!preg_match('/[0-9]/', $contrasena)) {
            echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'La contraseña debe incluir al menos un número',
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
        }*/
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
    public function agregarPreguntas($question1, $answer1, $question2, $answer2, $question3, $answer3, $question4, $answer4, $UserId, $conexion)
    {
        // Establecer la consulta SQL
        $sql = "INSERT INTO answers (pregunta_1, respuesta_1, pregunta_2, respuesta_2, pregunta_3, respuesta_3, pregunta_4, respuesta_4, user_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Preparar la consulta para evitar inyecciones SQL
        if ($stmt = mysqli_prepare($conexion, $sql)) {
            // Vincular los parámetros
            mysqli_stmt_bind_param($stmt, "ssssssssi", $question1, $answer1, $question2, $answer2, $question3, $answer3, $question4, $answer4, $UserId);

            // Ejecutar la consulta
            if (mysqli_stmt_execute($stmt)) {
                // Acción exitosa, redirigir
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
                header('Location: ../view/user_login.php');
                exit;
            } else {
                // En caso de error, redirigir a una página de error
                header('Location: ../view/register.php?error=1');
                exit;
            }
        } else {
            // Manejo de errores si la preparación falla
            echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
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
}
