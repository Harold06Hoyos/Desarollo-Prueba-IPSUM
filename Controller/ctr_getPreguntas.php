<?php
require_once("../Model/conexion.php");
require_once("../Model/val_preguntas.php");

$conexion = new Conexion();
$conn = $conexion->conMysql();



// ----------------------------------------------------------

// Consultar todas las preguntas
$obtenerPreguntas = new valPreguntas();
$preguntasObtenidas = $obtenerPreguntas->obtenerPreguntas($conn);

// --------------------------------

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = $_POST[""];
    $question1 = $_POST['cambiarPregunta1'];
    $question2 = $_POST['input2'];
    $question3 = $_POST['input3'];
    $question4 = $_POST['input4'];
    var_dump($a);
}
$actualizarPreguntas = new valPreguntas();
//$preguntasObtenidas = $actualizarPreguntas->actualizarPreguntas($cambiarPregunta1, $question2, $question3, $question4, $conn);
//Agregarpreguntas
