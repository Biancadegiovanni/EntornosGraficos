<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Baja de Ciudad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Eliminar Ciudad</h2>

  <form action="baja.php" method="post" class="mb-3">
    <input class="form-control mb-2" type="number" name="id" placeholder="Ingrese el ID de la ciudad" required>
    <button class="btn btn-danger" type="submit" name="eliminar">Eliminar</button>
    <a href="menu.php" class="btn btn-secondary">Volver</a>
  </form>

<?php
if (isset($_POST['eliminar'])) {
    include("conexion.php");
    $id = $_POST['id'];

    // Verificar si el ID existe
    $check = mysqli_query($link, "SELECT * FROM Ciudades WHERE id = $id");
    if (mysqli_num_rows($check) == 0) {
        echo "<div class='alert alert-warning'>No existe una ciudad con ese ID.</div>";
    } else {
        $sql = "DELETE FROM Ciudades WHERE id = $id";
        mysqli_query($link, $sql) or die(mysqli_error($link));
        echo "<div class='alert alert-success'>Ciudad eliminada correctamente.</div>";
    }

    mysqli_close($link);
}
?>
</body>
</html>