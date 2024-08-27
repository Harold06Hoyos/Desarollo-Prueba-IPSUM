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

// preguntas y respuestas
$question1 = $_POST['question_1_hidden'];
$question2 = $_POST['question_2_hidden'];
$question3 = $_POST['question_3_hidden'];
$question4 = $_POST['question_4_hidden'];
$answer1 = $_POST['answer_1'];
$answer2 = $_POST['answer_2'];
$answer3 = $_POST['answer_3'];
$answer4 = $_POST['answer_4'];
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
    $agregarObtenidas = new valRegister();
    $agregarObtenidas->agregarPreguntas($question1, $answer1, $question2, $answer2, $question3, $answer3, $question4, $answer4, $UserId, $conn);

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
