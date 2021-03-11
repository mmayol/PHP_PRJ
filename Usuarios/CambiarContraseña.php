<?php
$servername = "10.100.66.106";
$username = "script";
$password = "script1";
$dbname = "Licor_FM";

$username=$_GET['username'];
$tel=$_GET['tel'];
$mail=$_GET['mail'];
$rol=$_GET['rol'];
$pwd=$_GET['pwd'];

// Conexion con la BDD
$conn = new mysqli('10.100.66.106','script','script1','Licor_FM');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//Actualizamos la tabla de usuarios
$sql = "UPDATE users SET username='$username', tel='$tel', mail='$mail', rol='$rol', pwd='$pwd' WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
  echo "Modificacion del usuario con exito";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
<html>
<head>
    <title>Modificacion de usuarios</title>
    <link rel="stylesheet" href="taula.css">
</head>
<body style="background-color:#0EEDA7;" align="left">
<h2>Modificar Usuarios</h2>
<form action="CambiarContraseña.php" method="get">
<p>Nombre De Usuario: <input type="text" name="username"></p>
<p>Numero De Telefono: <input type="text" name="tel"></p>
<p>CorreoElectronico <input type="text" name="mail"></p>
<p>Cambiar Rol: <input type="text" name="rol"></p>
<p>Cambiar Contraseña: <input type="password" name="pwd"></p>
<input type="submit">
</form>
<form action="login.html">
  <input type="submit" name="signup_submit" value="Inicio"/>
</form>
</body>
</html>
