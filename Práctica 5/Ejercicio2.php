<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $destinatario = "tu_correo@ejemplo.com"; 
    $asunto = "Consulta desde la página de contacto";
    $cuerpo = "Nombre: $nombre\nEmail: $email\nMensaje:\n$mensaje";

    if(mail($destinatario, $asunto, $cuerpo)) {
        $resultado = "Gracias por tu consulta, $nombre. Tu mensaje fue enviado correctamente.";
    } else {
        $resultado = "Error al enviar el mensaje. Por favor, intentá más tarde.";
    }
}
?>
<!DOCTYPE html>
<html lang ="es">
<head>
  <meta charset="UTF-8" />
  <title>Contacto</title>
</head>
<body>
    <h1>Formulario de contacto</h1>
    
    <?php if(!empty($resultado)) echo "<p>$resultado</p>"; ?>

  <form method="post" action="">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mensaje:</label><br>
    <textarea name="mensaje" rows="5" required></textarea><br><br>

    <input type="submit" value="Enviar">
  </form>
</body>
</html>
