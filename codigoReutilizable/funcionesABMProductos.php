<?php
  function generarConsultaProductos($array){
    $consulta = "SELECT P.codigo, P.nombre, P.precio, M.nombre as marca, C.nombre as categoria FROM productos P JOIN marca M ON P.Marca_idMarca = M.idMarca
                                                                                          JOIN categoria C ON P.Categoria_idCategoria = C.idCategoria";
    $bandera = true;
    if ($array["codigoProducto"] != NULL) {
      if ($bandera) {
        $consulta = $consulta. " WHERE codigo LIKE :codigo";
        $bandera = false;
      }
    }

    if ($array["nombreProducto"] != NULL) {
      if ($bandera) {
        $consulta = $consulta. " WHERE nombre LIKE :nombre";
        $bandera = false;
      }else {
          $consulta = $consulta. " and nombre LIKE :nombre";
      }
    }

    if ($array["precioDesde"] != NULL) {
      if ($bandera) {
        $consulta = $consulta. " WHERE precio > :precioDesde";
        $bandera = true;
      }else {
          $consulta = $consulta. " and precio > :precioDesde";
      }
    }

    if ($array["precioHasta"] != NULL) {
      if ($bandera) {
        $consulta = $consulta. " WHERE precio < :precioHasta";
        $bandera = true;
      }else {
          $consulta = $consulta. " and precio < :precioHasta";
      }
    }

    return $consulta;
  }


  function realizarConsultaProductos ($consulta, $array){
    include("./conexionBD/pdo.php");
    $ejecucionConsulta = $baseDeDatos->prepare($consulta);
    if ($array["codigoProducto"] != NULL) {
      $ejecucionConsulta->bindValue(":codigo", '%'. $array["codigoProducto"]. '%');
    }

    if ($array["nombreProducto"] != NULL) {
      $ejecucionConsulta->bindValue(":nombre", '%'. $array["nombreProducto"]. '%');
    }

    if ($array["precioDesde"] != NULL) {
      $ejecucionConsulta->bindValue(":precioDesde",  $array["precioDesde"]);
    }

    if ($array["precioHasta"] != NULL) {
      $ejecucionConsulta->bindValue(":precioHasta", $array["precioHasta"]);
    }

    $ejecucionConsulta->execute();
    return $ejecucionConsulta->fetchAll(PDO::FETCH_ASSOC);
  }

  function eliminarProducto($codProducto){
    include("./conexionBD/pdo.php");
    $sql = "DELETE FROM `productos` WHERE codigo = '". $codProducto ."';";
    echo $sql;
    $baseDeDatos->exec($sql);
  }
 ?>
