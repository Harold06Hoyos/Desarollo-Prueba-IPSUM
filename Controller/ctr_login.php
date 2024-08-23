<?php
require_once("../Model/conexion.php");
require_once("../Model/val_login.php");
require_once("../Model/val_register.php");

$conexion = new Conexion();
$conn = $conexion->conMysql();

// Validar email y contraseña
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];


// instanciar la clase
$Userlogin = new logUser();
// verificar si el usuario existe
$Userlogin->existUser($email, $conn);
// verificar credenciales
$Userlogin->loginUser($email, $contrasena, $conn);
