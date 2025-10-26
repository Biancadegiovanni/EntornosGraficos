<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Alta de Ciudad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Agregar nueva ciudad</h2>
  <form action="alta.php" method="post">
    <input class="form-control mb-2" type="text" name="ciudad" placeholder="Ciudad" required>
    <input class="form-control mb-2" type="text" name="pais" placeholder="País" required>
    <input class="form-control mb-2" type="number" name="habitantes" placeholder="Habitantes" required>
    <input class="form-control mb-2" type="text" name="superficie" placeholder="Superficie" required>
    <select class="form-control mb-3" name="tieneMetro">
      <option value="1">Sí</option>
      <option value="0">No</option>
    </select>
    <button class="btn btn-success" type="submit" name="agregar">Agregar</button>
    <a href="menu.php" class="btn btn-secondary">Volver</a>
  </form>

<?php
if (isset($_POST['agregar'])) {
    include("conexion.php");
    $sql = "INSERT INTO Ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
            VALUES ('$_POST[ciudad]', '$_POST[pais]', $_POST[habitantes], $_POST[superficie], $_POST[tieneMetro])";
    mysqli_query($link, $sql) or die(mysqli_error($link));
    echo "<div class='alert alert-success mt-3'>Ciudad agregada correctamente.</div>";
    mysqli_close($link);
}
?>
</body>
</html>