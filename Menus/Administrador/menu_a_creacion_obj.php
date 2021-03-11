<?php
//Creamos la clase
Class Objetos{
//Especificamos los parametros
private $nombre;
private $tipo;
private $graduacion;
private $precio;
private $stock;

//Creamos los GET de cada parametro
public function get_nombre()
 {return $this->nombre;}


public function get_tipo()
 {return $this->tipo;}

public function get_graduacion()
 {return $this->graduacion;}

public function get_precio()
 {return $this->precio;}

public function get_stock()
 {return $this->stock;}
//Añadimos los parametros en el __construct
public function __construct($nombre,$tipo,$graduacion,$precio,$stock)
    {
    $this->nombre=$nombre;
    $this->tipo=$tipo;
    $this->graduacion=$graduacion;
    $this->precio=$precio;
    $this->stock=$stock;
    }
}

?>
