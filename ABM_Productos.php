<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once('codigoReutilizable/head.php'); ?>
  <body class="body-abmProductos">
    <?php require_once('codigoReutilizable/nav.php'); ?>
    <section>
      <div class="container abmProductos">


        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Alta</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Baja</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Modificacion</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

          <!-- OPCION ALTA DE PRODUCTO -->
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
            </div>







          <!-- OPCION BAJA DE PRODUCTO -->
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row">
              <div class="col-lg-12">
                <h1 class="text-center pb-4">ABM Productos</h1>
                <form action="ABM_Productos.php">
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

            <div class="row">
              <table class="table table-hover" width="100%">
                <tbody>
                  <thead>
                    <tr>
                      <th  class="columnasABMProductos" scope="col">Eliminar</th>
                      <th  class="columnasABMProductos" scope="col">Modificar</th>
                      <th  class="columnasABMProductos" scope="col">Codigo</th>
                      <th  class="columnasABMProductos" scope="col">Nombre</th>
                      <th  class="columnasABMProductos" scope="col">Categoria</th>
                      <th  class="columnasABMProductos" scope="col">Precio</th>
                    </tr>
                  </thead>
                    <tr>
                      <td class="filasABMProductos text-center">
                        <input class="" type="checkbox" id="gridCheck1">
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
          </div>






          <!-- OPCION MODIFICACION DE PRODUCTO -->
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="row">
              <div class="col-lg-12">
                <h1 class="text-center pb-4">ABM Productos</h1>
                <form action="ABM_Productos.php">
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

            <div class="row">
              <table class="table table-hover" width="100%">
                <tbody>
                  <thead>
                    <tr>
                      <th  class="columnas" scope="col">Eliminar</th>
                      <th  class="columnas" scope="col">Modificar</th>
                      <th  class="columnas" scope="col">Codigo</th>
                      <th  class="columnas" scope="col">Nombre</th>
                      <th  class="columnas" scope="col">Categoria</th>
                      <th  class="columnas" scope="col">Precio</th>
                    </tr>
                  </thead>
                    <tr>
                      <td class="filas">
                        <input class="form-check-input checkboxTable" type="checkbox" id="gridCheck1">
                      </td>
                      <td class="filas"></td>
                      <td class="filas"></td>
                      <td class="filas"></td>
                      <td class="filas"></td>
                    </tr><tr>
                  </tr>
                </tbody>
              </table>

            </div>
        </div>
      </div>
    </div>


    </section>

    <?php require_once('codigoReutilizable/footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
