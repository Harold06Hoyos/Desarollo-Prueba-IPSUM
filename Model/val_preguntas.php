<?php
require_once("../model/conexion.php");
class valPreguntas
{
    public function obtenerPreguntas($conexion)
    {
        $sql = $conexion->query("SELECT * FROM preguntas");

        if ($sql->num_rows > 0) {
            $preguntas = [];
            while ($row = $sql->fetch_assoc()) {
                $preguntas[] = $row;
            }
            //  var_dump($preguntas[0]['question']);
            return $preguntas;
        } else {

            return []; // Retornar un array vacío si no hay resultados
        }
    }

    public function actualizarPreguntas($question1, $question2, $question3, $question4, $conexion)
    {
        // Suponiendo que ya tienes una conexión $conexion
        $sql = "UPDATE preguntas SET 
        question = CASE 
            WHEN question_id = 1 THEN ? 
            WHEN question_id = 2 THEN ? 
            WHEN question_id = 3 THEN ? 
            WHEN question_id = 4 THEN ? 
        END
        WHERE question_id IN (1, 2, 3, 4)";

        if ($stmt = $this->$conexion->prepare($sql)) {
            // Vincular parámetros
            $stmt->bind_param('ssss', $question1, $question2, $question3, $question4);
            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Devolver verdadero en caso de éxito
                return true;
            } else {
                // Manejar el error de ejecución
                echo "Error al actualizar las preguntas: " . $stmt->error;
                return false;
            }
        } else {
            // Manejar el error de preparación
            echo "Error en la preparación de la consulta: " . $this->$conexion->error;
            return false;
        }
    }
}
