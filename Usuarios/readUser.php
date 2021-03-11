<?php
//Añado el comando error_reporting para que no salgan warnings cuando añadimos un usuario no existente.
error_reporting(0);

if ($_GET["username"]!=null && $_GET["username"]!=""){
    //crear variables amb els valors del formulari
    $username = $_GET["username"];
    $password = $_GET["pwd"];
}
//Conexion a la base de datos
$conn = new mysqli('10.100.66.106','script','script1','Licor_FM');
// comprovar si la connexió funciona
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//Creamos la query que selecciona la contraseña de la tabla usuarios.
$sql = "SELECT pwd FROM users where username='$username'";
$result_select = $conn->query($sql);
$passwords=$result_select->fetch_assoc();
//Verifica si la contraseña es correcta
foreach ($passwords as $value)
echo "", password_verify($password,$value);
if($password !== $value) {
	echo 'Inicio de sesion erronea: La contrasenya no és correcta, vuelva a intentar iniciar sesion <br>
  <form action="login.html">
      <input type="submit" name="signup_submit" value="Volver a iniciar sesion"/>
  </form>';
}else {
  echo "Bienvenido" . " " . $username . " el inicio de sesion se a completado con exito.";
}

//Seleccionamos el rol del usuario
$sql = "SELECT rol FROM users where username='$username'";
$result_select = $conn->query($sql);
$todo=$result_select->fetch_assoc();

foreach ($todo as $todo2) {
  $todo2;
}
//Redirigimos al usuario segun el rol que tena, si es User ira al select, si es Admin ira al menu
if($todo2 == "User") {
  echo '<br>
  <form action="../Menus/Usuario/readForm.php">
      <input type="submit" name="signup_submit" value="Inicio"/>
  </form>';
} elseif ($todo2 == "Admin") {
  echo '<br>
  <form action="../Menus/Administrador/menu_admin.php">
      <input type="submit" name="signup_submit" value="Inicio"/>
  </form>';
}




$conn->close();
?>
<br>
<html>
<head>
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="taula.css">
</head>
<body>

</body>
</html>
