<?php
//Requerimos de un archivo con objetos
require "menu_a_creacion_obj.php";
if($_SERVER["REQUEST_METHOD"]=="GET"){
  if ($_GET["p_name"]!=null && $_GET["p_name"]!=""){
    //Creamos las variables por medio del metodo GET
    $nombre = $_GET["p_name"];
    $tipo = $_GET["p_tipo"];
    $graduacion = $_GET["p_graduacion"];
    $precio = $_GET["p_precio"];
    $stock = $_GET["p_stock"];
//Especificamos las columnas que utiliza el archivo de objetos
    $Objetos1 = new Objetos ($nombre,$tipo,$graduacion,$precio,$stock);

    //Conexion a la base de datos
  $db = new mysqli('10.100.66.106','script','script1','Licor_FM');
    if ($db->connect_errno != null) {
      echo "An unexpected error happened.</br> Error number $db->connect_errno when conneting to the database.</br> Error message: $db->connect_error ";
      exit();
    }else{
      //Seleccionamos todo sobre la tabla inventario para mas tarde revisar que no añadamos productos ya existentes
      $query_select="Select * from inventario where nombre='$nombre'";
      $result_select = $db->query($query_select);
      $productos=$result_select->fetch_object();

       if($productos != null){
              echo "Este producto ya existe, introduzca un nuevo producto</br>";
        }else{
            //Insertamos en la tabla inventario los valores especificados mediante el metodo GET junto a los objetos
              $query_insert="INSERT INTO inventario (nombre, tipo, graduacion, precio, stock) VALUES
              ('" .$Objetos1->get_nombre() ."','" .$Objetos1->get_tipo()."', '".$Objetos1->get_graduacion()."', '".$Objetos1->get_precio()."', '".$Objetos1->get_stock()."')";

              $result = $db->query($query_insert);
              if($result){
                echo "Se ha añadido un nuevo producto con exito </br>";
              }else if ($db->errno != null){
                  echo "An unexpected error happened.</br> Error number $db->errno when inserting to the database.</br> Error message: $db->error </br>";
                  exit();
              }else{
                echo "Something unexpected happened</br>";
              }
          }
      $db->close();
    }
  }
}
?>
<html>
<body style="background-color:#71C6E5;" align="center">
<h2>Crea Un Nuevo Producto</h2>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
  <p>Nombre del Producto: <input type="text" name="p_name"></p>
  <p>Tipo De Producto: <input type="text" name="p_tipo"></p>
  <p>Graduacion Del Producto: <input type="text" name="p_graduacion"></p>
  <p>Precio Del Producto: <input type="text" name="p_precio"></p>
  <p>Stock Del Producto: <input type="text" name="p_stock"></p>
<input type="submit">
</form>
<form action="menu_admin.php">
  <input type="submit" name="signup_submit" value="Inicio"/>
</form>
</body>
</html>
