@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Ventas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  active" href="{{ route('ABMProductos') }}">
                <span data-feather="shopping-cart"></span>
                Productos <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Clientes
              </a>
            </li>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">ABM Productos</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>

        <div class="container">


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
                          <form action="{{ route('ABMProductos') }}" method="post">
                            @csrf
                            <div class="form-group row">
                              <label for="codigoProducto" class="col-sm-2 col-form-label">Codigo:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="codigoProducto" name="codigoProducto" placeholder="Ingrese el codigo del producto">
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
                              <label for="precioHasta" class="col-sm-2 col-form-label">Precio Hasta:</label>
                              <div class="col-sm-3">
                                <input type="number" class="form-control form-control-sm" name="precioHasta" id="precioHasta" aria-describedby="emailHelp" placeholder="Ingrese precio hasta">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="categoria" class="col-sm-2 col-form-label">Categoria:</label>
                              <div class="col-sm-3">
                                <select class="custom-select" name='categoria'>
                                  <option value="0">Seleccione</option>
                                  @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria['idCategoria'] }}">{{ $categoria['nombre'] }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <label for="marca" class="col-sm-2 col-form-label">Marca:</label>
                              <div class="col-sm-3">
                                <select class="custom-select" name="marca">
                                  <option value="0">Seleccione</option>
                                  @foreach ($marcas as $marca)
                                    <option value="{{ $marca['idMarca'] }}">{{ $marca['nombre'] }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                          </form>
                        </div>
                      </div>
                      <div class="table-responsive pt-5">
                        <table class="table table-striped table-sm" width="100%">
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
                              @foreach ($productos as $value)
                                <tr>
                                  <td class="filasABMProductos text-center pl-0 pr-0">
                                    <!-- Button trigger modal -->
                                    <input class="botonEliminar" type="image" src="Iconos/eliminar.png" name=""  data-toggle="modal" data-target="#exampleModal">


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
                                    <a href=""><img class= "imagenTabla-abm" src="Iconos/modificar.png" alt=""></a>
                                  </td>
                                  <td class="filasABMProductos">
                                    {{ $value["codigo"] }}
                                  </td>
                                  <td class="filasABMProductos">
                                    {{ $value["nombre"] }}
                                  </td>
                                  <td class="filasABMProductos">
                                    {{ $value["nombreCategoria"] }}
                                  </td>
                                  <td class="filasABMProductos">
                                    {{ $value["nombreMarca"] }}
                                  </td>
                                  <td class="filasABMProductos">
                                    ${{ $value["precio"] }}
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>

      </main>
    </div>
  </div>
@endsection
