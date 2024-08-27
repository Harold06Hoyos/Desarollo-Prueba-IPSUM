<?php
require_once("../Model/conexion.php");
require_once("../Model/val_preguntas.php");

$conexion = new Conexion();
$conn = $conexion->conMysql();

// Consultar todas las preguntas

$obtenerPreguntas = new valPreguntas();
$preguntasObtenidas = $obtenerPreguntas->obtenerPreguntas($conn);
