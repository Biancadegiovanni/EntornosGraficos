<?php
$destinatario = "xx@xx.com ";
$asunto = "Prueba";
$cuerpo = "Esto es una prueba de envío de correo a través del servidor"; 
?>

<html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Prueba</title>
</head>
<body>
    <h1>Envío de correo</h1>
</body>
</html>

<?php
mail($destinatario,$asunto,$cuerpo);
echo "Correo enviado a $destinatario";
?>