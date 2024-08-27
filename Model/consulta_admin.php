<?php
require_once("../model/conexion.php");

class Admin
{
    public function consultarUsuario($conexion)
    {
        $sql = "
        SELECT u.*, p.*
        FROM usuarios AS u
        LEFT JOIN answers AS p ON u.user_id = p.user_id
        ";

        $resultado = mysqli_query($conexion, $sql);

        if (!$resultado) {
            echo "Error al consultar usuarios: " . $conexion->error;
            die();
        }

        $usuarios = [];

        while ($fila = mysqli_fetch_assoc($resultado)) {
            $usuarios[] = $fila;
        }

        return $usuarios;
    }
}

$conexion = (new Conexion())->conMysql();
$admin = new Admin();
$usuariosAdmin = $admin->consultarUsuario($conexion);

// Devolver los datos
return $usuariosAdmin;
