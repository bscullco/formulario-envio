<?php
// Verificamos si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Llamando a los campos
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $mensaje = $_POST['mensaje'] ?? '';

    // Validar los datos recibidos, verificar si están presentes y no vacíos
    if (!empty($nombre) && !empty($correo) && !empty($telefono) && !empty($mensaje)) {
        // Datos para el correo
        $destinatario = "anderson1995sistemas@gmail.com";
        $asunto = "Contacto desde nuestra web";

        // Cuerpo del mensaje
        $carta = "De: $nombre \n";
        $carta .= "Correo: $correo \n";
        $carta .= "Telefono: $telefono \n";
        $carta .= "Mensaje: $mensaje";

        // Cabeceras adicionales
        $cabeceras = 'From: anderson1995sistemas@gmail.com' . "\r\n" .
                     'Reply-To: anderson1995sistemas@gmail.com' . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();

        // Enviando el mensaje
        if (mail($destinatario, $asunto, $carta, $cabeceras)) {
            // Redirigir después de enviar el correo
            header('Location: mensaje-de-envio.html');
            exit; // Finalizamos la ejecución del script después de la redirección
        } else {
            echo "Error al enviar el correo. Por favor, inténtalo de nuevo más tarde.";
        }
    } else {
        echo "Por favor, completa todos los campos del formulario.";
    }
} else {
    // Si no se envían los datos por el método POST, redirigimos a alguna página
    header('Location: formulario.html');
}
?>
