<?php
require_once("../Model/conexion.php");
require_once("../Model/val_preguntas.php");

$conexion = new Conexion();
$conn = $conexion->conMysql();



// ----------------------------------------------------------

// Consultar todas las preguntas
$obtenerPreguntas = new valPreguntas();
$preguntasObtenidas = $obtenerPreguntas->obtenerPreguntas($conn);
//$question1 = $preguntas[0]['question'] ?? '';
//$question2 = $preguntas[1]['question'] ?? '';
//$question3 = $preguntas[2]['question'] ?? '';
//$question4 = $preguntas[3]['question'] ?? '';
//Agregarpreguntas
// --------------------------------

$question1 = $_POST['input1'];
$question2 = $_POST['input2'];
$question3 = $_POST['input3'];
$question4 = $_POST['input4'];
$actualizarPreguntas = new valPreguntas();
//$preguntasObtenidas = $actualizarPreguntas->actualizarPreguntas($question1, $question2, $question3, $question4, $conn);
//Agregarpreguntas
