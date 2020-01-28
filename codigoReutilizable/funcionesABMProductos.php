<?php
  function generarConsultaProductos($array){
    $consulta = "SELECT P.codigo, P.nombre, P.precio, M.nombre as marca, C.nombre as categoria, P.descripcion FROM productos P JOIN marca M ON P.Marca_idMarca = M.idMarca
                                                                                          JOIN categoria C ON P.Categoria_idCategoria = C.idCategoria";
    $bandera = true;
    if ($array["codigoProducto"] != NULL) {
      if ($bandera) {
        $consulta = $consulta. " WHERE P.codigo LIKE :codigo";
        $bandera = false;
      }
    }

    if ($array["nombreProducto"] != NULL) {
      if ($bandera) {
        $consulta = $consulta. " WHERE P.nombre LIKE :nombre";
        $bandera = false;
      }else {
          $consulta = $consulta. " and P.nombre LIKE :nombre";
      }
    }

    if ($array["precioDesde"] != NULL) {
      if ($bandera) {
        $consulta = $consulta. " WHERE P.precio > :precioDesde";
        $bandera = false;
      }else {
          $consulta = $consulta. " and P.precio > :precioDesde";
      }
    }

    if ($array["precioHasta"] != NULL) {
      if ($bandera) {
        $consulta = $consulta. " WHERE P.precio < :precioHasta";
        $bandera = false;
      }else {
          $consulta = $consulta. " and P.precio < :precioHasta";
      }
    }

    return ($consulta." and P.borrado = 0");
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
      $ejecucionConsulta->bindValue(":precioDesde",  $array["precioDesde"], PDO::PARAM_INT);
    }

    if ($array["precioHasta"] != NULL) {
      $ejecucionConsulta->bindValue(":precioHasta", $array["precioHasta"], PDO::PARAM_INT);
    }

    $ejecucionConsulta->execute();
    return $ejecucionConsulta->fetchAll(PDO::FETCH_ASSOC);
  }

  function eliminarProducto($codProducto){
    include("./conexionBD/pdo.php");
    $Consulta = "UPDATE productos SET borrado = 1 WHERE codigo = '". $codProducto."';";
    echo $Consulta;
    $Consulta = $baseDeDatos->prepare($Consulta);
    $Consulta->execute();
  }
 ?>
