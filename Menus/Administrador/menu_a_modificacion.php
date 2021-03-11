<?php
//Conexion a la base de datos y creacion de las variables por medio del metodo GET
$servername = "10.100.66.106";
$username = "script";
$password = "script1";
$dbname = "Licor_FM";

$nombre=$_GET['nombre'];
$tipo=$_GET['tipo'];
$graduacion=$_GET['graduacion'];
$precio=$_GET['precio'];
$stock=$_GET['stock'];

$conn = new mysqli('10.100.66.106','script','script1','Licor_FM');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//Actualizacion de la tabla inventario sobre las variables que hemos creado anteriormente mediante el metodo GET
$sql = "UPDATE inventario SET nombre='$nombre', tipo='$tipo', graduacion='$graduacion', precio='$precio', stock='$stock' WHERE nombre='$nombre'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
<html>
<body style="background-color:#71C6E5;" align="center">
<h2>Update Form</h2>
<form action="menu_a_modificacion.php" method="get">
<p>Nombre De Producto: <input type="text" name="nombre"></p>
<p>Tipo De Producto: <input type="text" name="tipo"></p>
<p>Graduacion Del Producto <input type="text" name="graduacion"></p>
<p>Precio Del Producto: <input type="text" name="precio"></p>
<p>Stock Del Producto: <input type="text" name="stock"></p>
<input type="submit">
</form>
<form action="menu_admin.php">
  <input type="submit" name="signup_submit" value="Inicio"/>
</form>
</body>
</html>
