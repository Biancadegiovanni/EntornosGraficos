<?php
session_start();

// Si el contador no existe 
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1;
} else {
    $_SESSION['contador']++;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Contador de páginas visitadas</title>
</head>
<body>
  <h1>Contador de páginas visitadas</h1>

  <p>Has visitado <strong><?php echo $_SESSION['contador']; ?></strong> página(s) durante esta sesión.</p>

  <p><a href="contador.php">Recargar esta página</a></p>
  <p><a href="otra.php">Ir a otra página (si querés seguir contando)</a></p>
</body>
</html>