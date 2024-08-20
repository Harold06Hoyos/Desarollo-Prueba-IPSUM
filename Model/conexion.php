<?php
class Conexion
{
    public $con;

    public function __construct()
    {

        try {
            $this->con = new mysqli('localhost', 'root', '', 'registro_usuarios');
        } catch (Exception $pe) {
            echo "Error en la Conexion" . $pe->getMessage();
        }
    }

    public function getConn()
    {
        return $this->con;
    }

    public function limpiarCadena($cadena)
    {

        $palabras = ["<script>", "</script>", "<script src", "<script type=", "SELECT * FROM", "SELECT ", " SELECT ", "DELETE FROM", "INSERT INTO", "DROP TABLE", "DROP DATABASE", "TRUNCATE TABLE", "SHOW TABLES", "SHOW DATABASES", "<?php", "?>", "--", "^", "<", ">", "==", "=", ";", "::"];

        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);

        foreach ($palabras as $palabra) {
            $cadena = str_ireplace($palabra, "", $cadena);
        }

        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);

        return $cadena;
    }
}
