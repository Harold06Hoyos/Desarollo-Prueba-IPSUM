
<?php

require_once '../model/conexion.php';
require_once '../model/val_register.php';

class C_registro
{
    public function returnManejos()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        if ($action == 'registrar') {
            $this->registrar();
        }
    }

    public function registrar()
    {
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['correo']);
        $contrasena = trim($_POST['contrasena']);

        // Verificar si los campos están vacíos
        if (empty($nombre) || empty($correo) || empty($contrasena)) {
            echo 'Por favor, complete todos los campos';
            return;
        }

        // Validar la dirección de correo electrónico
        $email_regex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        if (!preg_match($email_regex, $correo)) {
            echo "La dirección de correo electrónico no es válida";
            return;
        }

        $conexion = new Conexion();
        $usuarios = new Usuario($conexion->getConn());

        // Verificar si el correo electrónico ya está registrado en la base de datos
        if ($usuarios->existeCorreo($correo)) {
            echo "El correo electrónico ya está registrado";
            return;
        }

        $enContrasena = md5($_POST['contrasena']);
        $usuarios->agregarUsuario($nombre, $correo, $enContrasena);
        header('Location: login.php');
        exit;
    }
}
?>
