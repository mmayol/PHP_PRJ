<?php
//Conexion a la base de datos
$servername = "10.100.66.106";
$username = "script";
$password = "script1";
$dbname = "Licor_FM";

$nombre=$_GET['nombre'];

$conn = new mysqli('10.100.66.106','script','script1','Licor_FM');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Eliminamos todo sobre la tabla inventario mediante el nombre añadido
$sql = "DELETE FROM inventario WHERE nombre='$nombre'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
<html>
<body style="background-color:#71C6E5;" align="center">
<h2>Eliminar Producto</h2>
<form action="menu_a_eliminacion.php" method="get">
<p>Nombre del producto que desea eliminar: <input type="text" name="nombre"></p>
<input type="submit">
</form>
<form action="menu_admin.php">
  <input type="submit" name="signup_submit" value="Inicio"/>
</form>
</body>
</html>
