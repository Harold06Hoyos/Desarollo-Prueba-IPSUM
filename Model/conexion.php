<?php
class Conexion
{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "prueba_de_desarrollo";

    public function conMysql()
    {

        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conexion->connect_error) {
            die("Error de conexion:" . $conexion->connect_error);
        }
        return $conexion;
    }
}
