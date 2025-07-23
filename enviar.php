<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = htmlspecialchars($_POST["nombre"]);
  $correo = htmlspecialchars($_POST["correo"]);
  $mensaje = htmlspecialchars($_POST["mensaje"]);

  // Cambia esto por tu correo real
  $destinatario = "tucorreo@ejemplo.com";
  $asunto = "Nuevo mensaje de contacto";

  $contenido = "Nombre: $nombre\n";
  $contenido .= "Correo: $correo\n\n";
  $contenido .= "Mensaje:\n$mensaje";

  $headers = "From: $correo\r\n" .
             "Reply-To: $correo\r\n" .
             "X-Mailer: PHP/" . phpversion();

  if (mail($destinatario, $asunto, $contenido, $headers)) {
    echo "<script>alert('Mensaje enviado correctamente.'); window.location.href='index.html#contacto';</script>";
  } else {
    echo "<script>alert('Hubo un error al enviar el mensaje.'); window.history.back();</script>";
  }
}
?>
