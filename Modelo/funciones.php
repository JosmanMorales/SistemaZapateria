<?php
// Cargar las clases de PHPMailer (suponiendo que PHPMailer está en la carpeta 'Mailer')
require 'servidor/Mailer/src/PHPMailer.php';
require 'servidor/Mailer/src/SMTP.php';
require 'servidor/Mailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarMail($destinatarios, $asunto, $mensaje) {
    $mail = new PHPMailer(true);  // Crear una nueva instancia de PHPMailer y habilitar excepciones

    try {
        // Configuración del servidor
        $mail->isSMTP();                                      // Usar SMTP
        $mail->Host = 'smtp.gmail.com';                       // Servidor SMTP
        $mail->SMTPAuth = true;                               // Habilitar autenticación SMTP
        $mail->Username = 'proyectozapateriaumg@gmail.com';   // Nombre de usuario SMTP
        $mail->Password = 'pnijhsjcvodctszq';                 // Contraseña SMTP
        $mail->SMTPSecure = 'ssl';                            // Habilitar encriptación SSL
        $mail->Port = 465;                                    // Puerto SMTP

        // Información del remitente
        $mail->setFrom('proyectozapateriaumg@gmail.com', 'PROYECTO UMG');

        // Agregar destinatarios
        foreach ($destinatarios as $correo => $nombre) {
            $mail->addAddress($correo, $nombre);
        }

        // Contenido del correo
        $mail->isHTML(true);                                  // Establecer formato de correo como HTML
        $mail->CharSet = 'UTF-8';                             // Configurar el charset
        $mail->Subject = $asunto;                             // Asunto del correo
        $mail->Body = '<div align="center"><img src="https://aprende.guatemala.com/wp-content/uploads/2016/09/guatemala-universidadmarianogalvez.jpg" width="330" height="200"></div><br><br>' . $mensaje;

        // Enviar el correo
        $mail->send();
        return true;

    } catch (Exception $e) {
        // Puedes registrar el error si es necesario
        // echo "No se pudo enviar el correo. Error de PHPMailer: {$mail->ErrorInfo}";
        return false;
    }
}
?>
