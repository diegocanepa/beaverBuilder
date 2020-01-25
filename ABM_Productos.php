<!DOCTYPE html>

<?php
  $bool = false;
  var_dump($_GET);
  if (count($_GET) != 0) {
    var_dump($_GET);
    echo $_GET["bool"];
    $bool = $_GET["bool"];
  }



  function consultaProductos($baseDeDatos) {
    $consulta = $baseDeDatos->prepare("SELECT * FROM producto");
    $consulta->execute();
    return $consulta->fetchAll();
  }

  require_once('conexionBD/pdo.php');
  var_dump(consultaProductos($baseDeDatos));

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
                      <input type="text" class="form-control form-control-sm" id="codigoProducto">
                      <small id="emailHelp" class="form-text text-muted">Tambien se buscara los codigos similares</small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nombreProducto" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" id="nombreProducto" aria-describedby="emailHelp" placeholder="Ingrese el nombre del producto">
                      <small id="emailHelp" class="form-text text-muted">Tambien se buscara los nombre similares</small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="precioDesde" class="col-sm-2 col-form-label">Precio Desde:</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control form-control-sm" id="precioDesde" aria-describedby="emailHelp" placeholder="Ingrese precio desde">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="precioDesde" class="col-sm-2 col-form-label">Precio Hasta:</label>
                    <div class="col-sm-3">
                      <input type="number" class="form-control form-control-sm" id="precioDesde" aria-describedby="emailHelp" placeholder="Ingrese precio hasta">
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
                        <th  class="columnasABMProductos" scope="col">Codigo</th>
                        <th  class="columnasABMProductos" scope="col">Nombre</th>
                        <th  class="columnasABMProductos" scope="col">Categoria</th>
                        <th  class="columnasABMProductos" scope="col">Precio</th>
                      </tr>
                    </thead>
                      <tr>
                        <td class="filasABMProductos text-center pl-0 pr-0">
                          <img class= "imagenTabla-abm" src="resources/eliminar.png" alt="">
                        </td>
                        <td class="filasABMProductos text-center pl-0 pr-0">
                          <img class= "imagenTabla-abm" src="resources/modificar.png" alt="">
                        </td>
                        <td class="filasABMProductos"></td>
                        <td class="filasABMProductos"></td>
                        <td class="filasABMProductos"></td>
                        <td class="filasABMProductos"></td>
                      </tr><tr>
                    </tr>
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
</html>
