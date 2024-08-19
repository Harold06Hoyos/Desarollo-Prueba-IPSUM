<?php

require_once '../Model/conexion.php';

class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function register() {
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $telefono = trim($_POST['telefono']);
        $pais = trim($_POST['pais']);
        $comida_favorita = trim($_POST['comida_favorita']);
        $artista_favorito = trim($_POST['artista_favorito']);
        $lugar_favorito = trim($_POST['lugar_favorito']);
        $color_favorito = trim($_POST['color_favorito']);
        $contrasena = trim($_POST['contrasena']);
        //'foto' => $this->uploadFile($_FILES['foto'])
            

             // Verificar si los campos están vacíos
            if (empty($nombre) || empty($correo) || empty($contrasena) || empty($telefono) || empty($pais) || empty($comida_favorita)|| empty($artista_favorito) || empty($lugar_favorito) || empty($color_favorito)){
                echo 'Por favor, complete todos los campos';
                return;
            }

            if ($this->model->insertUser($data)) {
                echo "Usuario registrado con éxito.";
            } else {
                echo "Error al registrar el usuario.";
            }
        }
    

    private function uploadFile($file) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $target_file);
        return $target_file;
    }
}
