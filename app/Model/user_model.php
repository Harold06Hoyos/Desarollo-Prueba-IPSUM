<?php
class UserModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertUser($data)
    {
        $sql = "INSERT INTO users (nombre, apellido, email, telefono, pais, comida_favorita, artista_favorito, lugar_favorito, color_favorito, contrasena)
                VALUES (:nombre, :apellido, :email, :telefono, :pais, :comida_favorita, :artista_favorito, :lugar_favorito, :color_favorito, :contrasena)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':apellido', $data['apellido']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':telefono', $data['telefono']);
        $stmt->bindParam(':pais', $data['pais']);
        $stmt->bindParam(':comida_favorita', $data['comida_favorita']);
        $stmt->bindParam(':artista_favorito', $data['artista_favorito']);
        $stmt->bindParam(':lugar_favorito', $data['lugar_favorito']);
        $stmt->bindParam(':color_favorito', $data['color_favorito']);
        $stmt->bindParam(':contrasena', password_hash($data['contrasena'], PASSWORD_BCRYPT));
        // $stmt->bindParam(':foto', $data['foto']);

        return $stmt->execute();
    }

    public function existeCorreo($email)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        return $count > 0;
    }
}
