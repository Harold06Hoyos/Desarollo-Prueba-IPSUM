<?php

class valPreguntas
{
    public function agregarPreguntas($comida_favorita, $artista_favorito, $lugar_favorito, $color_favorito, $conexion)
    {
        // Establecer la consulta SQL
        $user = 1;
        $sql = "INSERT INTO preguntas (user_id, favorite_food, favorite_artist, favorite_place, 	favorite_color) VALUES ('$user, $comida_favorita, $artista_favorito, $lugar_favorito, $color_favorito')";

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                        Swal.fire({
                            icon: 'success',
                            title: 'Preguntas agregadas exitosamente!',
                            showConfirmButton: false,
                            timer: 6000
                        }).then(() => {
                            location.assign('../view/register.php');
                        });
                    </script>";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
