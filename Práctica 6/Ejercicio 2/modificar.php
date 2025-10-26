<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Modificación de Ciudad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h2>Modificar Ciudad</h2>

  <form action="modificar.php" method="post" class="mb-3">
    <input class="form-control mb-2" type="number" name="id" placeholder="Ingrese el ID de la ciudad a modificar" required>
    <button class="btn btn-primary" type="submit" name="buscar">Buscar</button>
    <a href="menu.php" class="btn btn-secondary">Volver</a>
  </form>

<?php
include("conexion.php");

if (isset($_POST['buscar'])) {
    $id = $_POST['id'];
    $resultado = mysqli_query($link, "SELECT * FROM Ciudades WHERE id = $id");
    if (mysqli_num_rows($resultado) == 0) {
        echo "<div class='alert alert-warning'>No existe una ciudad con ese ID.</div>";
    } else {
        $fila = mysqli_fetch_array($resultado);
?>

  <form action="modificar.php" method="post" class="mt-4">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

    <div class="mb-2">
      <label>Ciudad:</label>
      <input class="form-control" type="text" name="ciudad" value="<?php echo $fila['ciudad']; ?>" required>
    </div>

    <div class="mb-2">
      <label>País:</label>
      <input class="form-control" type="text" name="pais" value="<?php echo $fila['pais']; ?>" required>
    </div>

    <div class="mb-2">
      <label>Habitantes:</label>
      <input class="form-control" type="number" name="habitantes" value="<?php echo $fila['habitantes']; ?>" required>
    </div>

    <div class="mb-2">
      <label>Superficie:</label>
      <input class="form-control" type="text" name="superficie" value="<?php echo $fila['superficie']; ?>" required>
    </div>

    <div class="mb-3">
      <label>Tiene Metro:</label>
      <select class="form-control" name="tieneMetro">
        <option value="1" <?php if ($fila['tieneMetro'] == 1) echo "selected"; ?>>Sí</option>
        <option value="0" <?php if ($fila['tieneMetro'] == 0) echo "selected"; ?>>No</option>
      </select>
    </div>

    <button class="btn btn-success" type="submit" name="modificar">Guardar Cambios</button>
  </form>

<?php
    }
}

if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $habitantes = $_POST['habitantes'];
    $superficie = $_POST['superficie'];
    $tieneMetro = $_POST['tieneMetro'];

    $sql = "UPDATE Ciudades 
            SET ciudad='$ciudad', pais='$pais', habitantes=$habitantes, superficie=$superficie, tieneMetro=$tieneMetro
            WHERE id=$id";

    mysqli_query($link, $sql) or die(mysqli_error($link));
    echo "<div class='alert alert-success mt-3'>Datos modificados correctamente.</div>";
}

mysqli_close($link);
?>
</body>
</html>