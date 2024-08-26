<?php
session_start();
class logUser
{

    public function existUser($email, $conexion)
    {
        $sql = $conexion->query("SELECT * FROM usuarios WHERE email = '$email'");

        if ($sql->num_rows < 0) {
            echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
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
    }


    public function loginUser($email, $contrasena, $conexion)
    {
        $sql = $conexion->query("SELECT * FROM usuarios WHERE email = '$email'");

        try {
            if ($sql->num_rows > 0) {
                $datos = $sql->fetch_assoc();
                $contrasenaHash = $datos["contrasena"];
                $userId = $datos["user_id"];
                $rol = $datos["role"];
                if (password_verify($contrasena, $contrasenaHash)) {
                    $_SESSION["userId"] = $userId;
                    $_SESSION["role"] = $rol;
                    if ($rol == 2)
                        echo '<script>window.location.href="../view/dashboard.php";</script>';
                    else {
                        echo '<script>window.location.href="../view/dashboard_admin.php";</script>';
                    }
                } else {
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al comprar contraseña',
                            showCancelButton: false,
                            confirmButtonColor: '#FF0000',
                            confirmButtonText: 'OK',
                            timer: 6000
                        }).then(() => {
                            location.assign('../View/user_login.php');
                        });
                    });
                    </script>";
                    exit();
                }
            } else {
                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al realizar la consulta',
                            showCancelButton: false,
                            confirmButtonColor: '#FF0000',
                            confirmButtonText: 'OK',
                            timer: 6000
                        }).then(() => {
                            location.assign('../View/user_login.php');
                        });
                    });
                    </script>";

                exit();
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
