<?php

  function calcularSubtotal($arrayProductos){
    include("productos.php");
    $subtotal = 0;
    foreach ($arrayProductos as $key => $value) {
      $subtotal = $subtotal + $productos[$value]["precio"];
    }
    return $subtotal;
  }


  function obtenerCodigoDescuento($codigo){
    $json = file_get_contents("codigosDescuento.json");
    $arrayCodigos = json_decode($json, true);
    var_dump($arrayCodigos);
    foreach ($arrayCodigos as $key => $value) {
      if ($value["codigo"] == $codigo) {
        return $value;
      }
    }
    return;
  }

  function cantidadDeProductosEnCarro($arrayProductos){
    return count($arrayProductos);
  }

 ?>
