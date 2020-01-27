<!DOCTYPE html>

<?php
  $bool = false;
  if (count($_GET) != 0) {
    if (isset($_GET["bool"])) {
      $bool = $_GET["bool"];
    }

    if (isset($_GET["codigoProducto"])) {
      $vector = [];
      var_dump($datosConsulta);
      if (isset($datosConsulta)) {
        foreach ($datosConsulta as $key => $value) {
          if ($value["codigoProducto"] != $_GET["codigoProducto"]) {
            $vector[] = $value;
          }
        }
      }
      //vacio la variable session para luego meterle el array. Si no se vaciara, no funciona correctamente cuando eliminamos el ultimo producto del carrito
      $datosConsulta = [];
      //Se le asigna a la variable  $datosConsulta el $vector, el cual puede estar vacio o no
      $datosConsulta = $vector;
    }


    }


  if (count($_POST) != 0 ) {
    require_once('codigoReutilizable/funcionesABMProductos.php');

    if (isset($_POST["codProdEliminacion"])) {
      echo $_POST["codProdEliminacion"];
      eliminarProducto($_POST["codProdEliminacion"]);
      echo "se elimino wuacho";
    }else {
      $consulta  = generarConsultaProductos($_POST);
      $datosConsulta= realizarConsultaProductos($consulta, $_POST);
    }
  }

?>




<html lang="en" dir="ltr">
  <?php require_once('codigoReutilizable/head.php'); ?>
  <body class="body-abmProductos">
    <?php require_once('codigoReutilizable/nav.php'); ?>
    <section>
      <div class="container abmProductos">


          <!-- OPCION ALTA DE PRODUCTO

            <div class="row">
              <div class="col-lg-12">
                <h1 class="text-center pb-4">Nuevo Producto</h1>
                <form action="ABM_Productos.php">
                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="codigoProducto">Codigo</label>
                        <input type="text" class="form-control form-control-sm" id="codigoProducto" required>
                        <small id="emailHelp" class="form-text text-muted">Ingrese el codigo del Producto</small>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="nombreProducto">Nombre</label>
                        <input type="text" class="form-control form-control-sm" id="nombreProducto" required>
                        <small id="emailHelp" class="form-text text-muted">Ingrese el nombre del Producto</small>
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control form-control-sm" id="precio" required>
                        <br>
                        <label for="Categoria">Categoria</label>
                        <select class="custom-select input-sm" id="Categoria" required>
                            <option selected>Choose...</option>
                            <option value="1">Venatana</option>
                            <option value="2">Puerta</option>
                            <option value="3">Alfombra</option>
                        </select>
                        <br>
                        <br>
                        <label for="marca">Marca</label>
                        <select class="custom-select input-sm" id="marca" required>
                            <option selected>Choose...</option>
                            <option value="1">Riot</option>
                            <option value="2">Alma</option>
                            <option value="3">Easy</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">

                    </div>

                    <div class="form-group col-md-6">
                      <div class="mb-3">
                          <label for="DescripcionLarga">Descripcion</label>
                          <textarea rows="8" class="form-control form-control-sm" id="DescripcionLarga" placeholder="Descripcion Requerida" required
></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </div>

                </form>
              </div>
              -->

            <div class="row">
              <div class="col-lg-12">
                <h1 class="text-center pb-4">ABM Productos</h1>
                <form action="ABM_Productos.php?bool=true" method="post">
                  <div class="form-group row">
                    <label for="codigoProducto" class="col-sm-2 col-form-label">Codigo:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" id="codigoProducto" name="codigoProducto">
                      <small id="emailHelp" class="form-text text-muted">Tambien se buscara los codigos similares</small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nombreProducto" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" name="nombreProducto" id="nombreProducto" aria-describedby="emailHelp" placeholder="Ingrese el nombre del producto">
                      <small id="emailHelp" class="form-text text-muted">Tambien se buscara los nombre similares</small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="precioDesde" class="col-sm-2 col-form-label">Precio Desde:</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control form-control-sm" name="precioDesde" id="precioDesde" aria-describedby="emailHelp" placeholder="Ingrese precio desde">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="precioHasta" class="col-sm-2 col-form-label">Precio Hasta:</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control form-control-sm" name="precioHasta" id="precioHasta" aria-describedby="emailHelp" placeholder="Ingrese precio hasta">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
              </div>
            </div>
            <?php if ($bool): ?>
              <div class="row pt-3">
                <table class="table table-hover" width="100%">
                  <tbody>
                    <thead>
                      <tr>
                        <th  class="columnasABMProductos" scope="col"></th>
                        <th  class="columnasABMProductos" scope="col"></th>
                        <th  class="columnasABMProductos" id="numero" scope="col">Codigo</th>
                        <th  class="columnasABMProductos" scope="col">Nombre</th>
                        <th  class="columnasABMProductos" scope="col">Categoria</th>
                        <th  class="columnasABMProductos" scope="col">Marca</th>
                        <th  class="columnasABMProductos" scope="col">Precio</th>
                      </tr>
                    </thead>
                    <?php foreach ($datosConsulta as $key => $value): ?>
                      <tr>
                        <td class="filasABMProductos text-center pl-0 pr-0">
                          <!-- Button trigger modal -->
                          <?php $miVariable = "hola mundo" ?>
                          <input class="botonEliminar" type="image" src="resources/eliminar.png" name=""  data-toggle="modal" data-target="#exampleModal">


                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Importante!</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                ¿Esta seguro que desea eliminar este producto por completo de la base de datos?
                                <div class="mostrarvalores"></div>
                                <form action="ABM_Productos.php" method="POST">
                                  <input type="hidden" name="codProdEliminacion" id="caja_valor" value="">
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="filasABMProductos text-center pl-0 pr-0">
                          <a href=""><img class= "imagenTabla-abm" src="resources/modificar.png" alt=""></a>
                        </td>
                        <td class="filasABMProductos">
                          <?php echo $value["codigo"]; ?>
                        </td>
                        <td class="filasABMProductos">
                          <?php echo $value["nombre"]; ?>
                        </td>
                        <td class="filasABMProductos">
                          <?php echo $value["categoria"]; ?>
                        </td>
                        <td class="filasABMProductos">
                          <?php echo $value["marca"]; ?>
                        </td>
                        <td class="filasABMProductos">
                          <?php echo $value["precio"]; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>


    </section>

    <?php require_once('codigoReutilizable/footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

  <script>
      $(function(){
          $(".botonEliminar").click(function(){

              var valores="";

              // Obtenemos todos los valores contenidos en los <td> de la fila
              // seleccionada
              $(this).parents("tr").find("td:nth-child(3)").each(function(){
                  valores+=$(this).html()+"\n";
              });
              $(".mostrarvalores").html(valores);
              let valor = valores;
              document.getElementById("caja_valor").value = valor;

          });
      });
  </script>

  <script>

  </script>
</html>
