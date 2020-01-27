<?php
  $dsn= "mysql:dbname=mydb;host=127.0.0.1;port:3306";
  $usuario= "root";
  $pass = null;

  try {
    $baseDeDatos = new PDO($dsn, $usuario, $pass);
    $baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (\Exception $e) {
    var_dump($e->getMessage());
    echo "Oh no, Hubo un error :(";
    exit;
  }
 ?>
