<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone_no']; // Asegúrate de que el nombre coincida con el campo del formulario
    $message = $_POST['message'];

    // Configurar encabezados para el correo electrónico
    $header = 'From: ' . $mail . " \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Construir el cuerpo del mensaje
    $email_message = "Este mensaje fue enviado por: " . $name . " \r\n";
    $email_message .= "Su e-mail es: " . $mail . " \r\n";
    $email_message .= "Teléfono de contacto: " . $phone . " \r\n";
    $email_message .= "Mensaje: " . $message . " \r\n";
    $email_message .= "Enviado el: " . date('d/m/Y', time());

    // Destinatario y asunto del correo
    $para = 'cryptoaris5@gmail.com'; // Coloca tu dirección de correo electrónico aquí
    $asunto = 'Mensaje desde formulario de contacto en home.html';

    // Enviar el correo
    if (mail($para, $asunto, utf8_decode($email_message), $header)) {
        // Redirigir al usuario a la página de inicio (home.html)
        header("Location: home.html");
        exit;
    } else {
        // Manejo de error si el correo no se pudo enviar
        echo "Hubo un problema al enviar el mensaje. Por favor, inténtelo de nuevo más tarde.";
    }
} else {
    // Si no es una solicitud POST, redirigir o manejar según sea necesario
    echo "Acceso no permitido.";
}
?>
