<?php //archivo con la conexion a la base de datos

$link = mysqli_connect("localhost", "root", "", "capitals")
    or die("Error de conexión" . mysqli_connect_error());
?>