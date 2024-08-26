<?php
require_once("../Model/conexion.php");
require_once("../Model/val_register.php");

$conexion = new Conexion();
$conn = $conexion->conMysql();

// llave de captcha
$keyCaptcha = "6LfjIS8qAAAAAN2_1EIyDDXS1xA_KZkJ1NOXT9r1";

// ----------------------------------------------------------
// usuario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$pais = $_POST['pais'];
$contrasena = $_POST['contrasena'];
$confirmar_contrasena = $_POST['confirmar_contrasena'];
$foto = $_FILES['foto'];
$rol = "2";

// ----------------------------------------------------------
// preguntas
$comida_favorita = $_POST['comida_favorita'];
$artista_favorito = $_POST['artista_favorito'];
$lugar_favorito = $_POST['lugar_favorito'];
$color_favorito = $_POST['color_favorito'];

// ----------------------------------------------------------
// metodos
// ----------------------------------------------------------
$register = new valRegister();
$succesFull = $register->Recaptcha($keyCaptcha);

if ($succesFull) {

    // encriptar contraseña
    $passHash = password_hash($contrasena, PASSWORD_BCRYPT);
    //------------------------------------------------------------

    //Registro de usuario
    $register = new valRegister();
    $register->existUser($email, $conn);
    $register->comparePassword($confirmar_contrasena, $contrasena);
    $register->registerUser($nombre, $apellido, $email, $telefono, $pais, $passHash, $rol, $foto, $conn);
    //------------------------------------------------------------

    $UserId = $register->getUserId($conn);
    $preguntas = new valRegister();
    $preguntas->obtenerPreguntas($conn);
    // $preguntas->agregarPreguntas($comida_favorita, $artista_favorito, $lugar_favorito, $color_favorito, $UserId, $conn);

    //------------------------------------------------------------
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Rellenar el reCAPTCHA',
            confirmButtonColor: '#D63030',
            confirmButtonText: 'OK',
            timer: 6000
        }).then(() => {
            location.assign('../view/register.php');
        });
    });
    </script>";
}
