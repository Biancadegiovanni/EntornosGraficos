<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $amigoEmail = $_POST['amigoEmail'];
    $mensaje = $_POST['mensaje'];

    $asunto = "$nombre te recomienda este sitio web";
    $sitio = "https://www.ejemplo.com"; 
    $cuerpo = "Hola!\n\nTu amigo/a $tuNombre ($tuEmail) te recomienda visitar este sitio:\n$sitio\n\nMensaje adicional:\n$mensaje";
    
    if(mail($amigoEmail, $asunto, $cuerpo, "From: $tuEmail")) {
        $resultado = "Recomendación enviada correctamente a $amigoEmail.";
    } else {
        $resultado = "Error al enviar la recomendación.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recomendar a un amigo</title>
</head>
<body>
  <h1>Recomendá este sitio a un amigo</h1>

  <?php if(!empty($resultado)) echo "<p>$resultado</p>"; ?>

  <form method="post" action="">
    <label>Tu nombre:</label><br>
    <input type="text" name="tuNombre" required><br><br>

    <label>Tu email:</label><br>
    <input type="email" name="tuEmail" required><br><br>

    <label>Email de tu amigo:</label><br>
    <input type="email" name="amigoEmail" required><br><br>

    <label>Mensaje personal:</label><br>
    <textarea name="mensaje" rows="4"></textarea><br><br>

    <input type="submit" value="Enviar recomendación">
  </form>
</body>
</html>