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


    // registro de usuario
    public function registerUser($nombre, $apellido, $email, $telefono, $pais, $contrasena, $rol, $conexion)
    {
        $sql = "INSERT INTO usuarios (first_name, last_name, email, phone, country, contrasena, role) VALUES ('$nombre', '$apellido', '$email', '$telefono', '$pais', '$contrasena', '$rol')";

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
                            location.assign('../view/user_login.php');
                        });
                    });
                    </script>";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
