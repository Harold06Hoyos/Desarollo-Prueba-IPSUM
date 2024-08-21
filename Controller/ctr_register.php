<?php
require_once("../Model/conexion.php");
require_once("../Model/val_register.php");

$conexion = new Conexion();
$conn = $conexion->conMysql();

// ----------------------------------------------------------
// usuario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$pais = $_POST['pais'];
$contrasena = $_POST['contrasena'];
$confirmar_contrasena = $_POST['confirmar_contrasena'];
$rol = "1";

echo "<script>
        console.log('nombre:$nombre')
 </script>";
// ----------------------------------------------------------
// preguntas
$comida_favorita = $_POST['comida_favorita'];
$artista_favorito = $_POST['artista_favorito'];
$lugar_favorito = $_POST['lugar_favorito'];
$color_favorito = $_POST['color_favorito'];

// ----------------------------------------------------------
// metodos
$register = new valRegister();
$register->existUser($email, $conn);
$register->comparePassword($confirmar_contrasena, $contrasena);
$register->registerUser($nombre, $apellido, $email, $telefono, $pais, $contrasena, $rol, $conn);
