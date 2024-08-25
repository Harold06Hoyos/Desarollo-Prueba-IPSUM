<?php
require_once('../Controller/ctr.registrer');

class enviarEmailmain
{
    public function enviarEmail($email)
    {
        $destinatario = $email;
        $asunto = 'Registro exitoso';
        $cuerpo = '
    <html> 
        <head> 
            <title>Prueba de envio de correo</title> 
        </head>

        <body> 
            <h1>Solicitud de contacto desde correo de prueba !  </h1>
            <p> 
               
            </p> 
        </body>
    </html>
';
        //para el envío en formato HTML 
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF8\r\n";
        mail($destinatario, $asunto, $cuerpo, $headers);

        echo "Correo enviado";
    }
}
