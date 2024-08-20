
<?php
require_once 'Model/conexion.php';
class Usuario
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function agregarUsuario($nombre, $correo, $contrasena)
    {
        $stmt = $this->conexion->prepare("INSERT INTO tbl_usuarios(name_user, mail_user, pass_user) VALUES(?,?,?)");
        $stmt->bind_param("sss", $nombre, $correo, $contrasena);
        $stmt->execute();
        $stmt->close();
    }


    public function existeCorreo($correo)
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM tbl_usuarios WHERE mail_user = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        return $count > 0;
    }
}
?>
