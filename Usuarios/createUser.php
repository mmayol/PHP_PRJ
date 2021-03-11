<?php
    //cream les variables con los valores del formulario
    $username = $_GET["username"];
    $email=$_GET['email'];
    if(isset($email)){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo  "El correu no és vàl·lid, torna a provar.<br>";
        }
    }
    $tel=$_GET['tel'];
    if((isset($_GET['password']))&&(isset($_GET['password2']))){
      if($_GET['password'] !== $_GET['password2']){
        echo "<b>Les contrasenyes no són iguals.</b> Torna-les a escriure.<br>";
      }else{
          $password_ins = $_GET["password"];
      }
    }

    //Conexion con la base de datos
    $db = new mysqli('10.100.66.106','script','script1','Licor_FM');
    if ($db->connect_error != null) {
      echo "An unexpected error happened.</br> Error number $db->connect_errno when conneting to the database.</br> Error message: $db->connect_error ";
      exit();
    }else{
      //Busca si el correo ya existe en la base de datos
      $query_select="Select mail from users where username='$username'";
      $result_select = $db->query($query_select);
      $users=$result_select->fetch_object();
      //Busca que el usuario no exista en la base de datos.
       if($users != null){
              echo "User allready exist, try another.</br>";
        }else{
		if(isset($password_ins) && isset($email) && isset($tel)){
              $query_insert="INSERT INTO users(username, mail, tel,pwd) VALUES ('$username', '$email', '$tel' ,'$password_ins');";
              $result = $db->query($query_insert);
              //Implementamos el header para redirigir tras el registro a la pagina de inicio de sesion
              header("Location: login.html");
		}
	      }
	 $db->close();
 }
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body style="background-color:#71C6E5;">

<h2 align="center">Usuario Registrado Con Exito</h2>
<form align="center" action="../index.html">
<input type="submit" name="signup_submit" value="Inicio"/>
</form>
</body>
</html>
