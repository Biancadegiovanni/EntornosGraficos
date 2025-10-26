<?php // muestra todas las ciudades de la tabla
include("conexion.php");

$vSql = "SELECT * FROM Ciudades";
$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Ciudades</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Listado de Ciudades</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Ciudad</th>
        <th>País</th>
        <th>Habitantes</th>
        <th>Superficie</th>
        <th>Tiene Metro</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($fila = mysqli_fetch_array($vResultado)) { ?>
        <tr>
          <td><?php echo $fila['id']; ?></td>
          <td><?php echo $fila['ciudad']; ?></td>
          <td><?php echo $fila['pais']; ?></td>
          <td><?php echo $fila['habitantes']; ?></td>
          <td><?php echo $fila['superficie']; ?></td>
          <td><?php echo $fila['tieneMetro']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <a href="menu.php" class="btn btn-secondary">Volver al menú</a>

<?php
mysqli_free_result($vResultado);
mysqli_close($link);
?>
</body>
</html>