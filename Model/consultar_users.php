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
            SELECT u.*, a.*
            FROM usuarios AS u
            INNER JOIN answers AS a ON a.user_id = u.user_id
            WHERE u.user_id = ?
            ";

            if ($stmt = $conn->prepare($sql)) {
                // Vincular parámetros
                $stmt->bind_param("i", $userId);
                $stmt->execute();
                $return = $stmt->get_result();
                $rutaFoto = 'C:/xampp/htdocs/Desarollo-Prueba-IPSUM-1/archivos/';


                while ($row = $return->fetch_assoc()) {
                    $rutaRelativa = str_replace($rutaFoto, '', $row['archivo']);
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
