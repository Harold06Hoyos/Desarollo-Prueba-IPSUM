<?php
require_once("../model/conexion.php");

class User
{

    public function consultar($userId)
    {
        $return = null;
        if (!empty($userId)) {
            $conexion = new Conexion();
            $conn = $conexion->conMysql();

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $sql = "
            SELECT c.*, p.*
            FROM usuarios as c
            INNER JOIN preguntas as p ON p.user_id = c.user_id
            WHERE c.user_id = ?
            ";

            if ($stmt = $conn->prepare($sql)) {
                // Vincular parámetros
                $stmt->bind_param("i", $userId);
                $stmt->execute();
                $return = $stmt->get_result();
                $rutaFoto = 'C:/wamp64/www/Desarollo-Prueba-IPSUM-1/';


                while ($row = $return->fetch_assoc()) {
                    $rutaRelativa = str_replace($rutaFoto, '../', $row['archivo']);
                    $row['archivo'] = $rutaRelativa;
                    $usuarios[] = $row;
                }
                $stmt->close();
            } else {

                die("Error al preparar la consulta: " . $conn->error);
            }

            $conn->close();
        }

        return $usuarios;
    }
}
