@extends('layout.php')

@section('contents')
  <div class="container-carrito">
      <div class="row">
        <div class="col-12">
          <h1>Mi carro de compras</h1>
        </div>
      </div>
      <?php if (is_array($_SESSION["idProductos"])): ?>
        <?php if (count($_SESSION["idProductos"]) == 0): ?>
          <div class="row">
            <div class="contenedor-sin-productos col-12">
              <div class="texto-carrito-sin-productos">
                <h2>Tu carrito está vacío</h2>
                <h6>¿No sabés qué comprar? ¡Miles de productos te esperan!</h6>
                <a href="productos.php">Agregar productos al carrito</a>
              </div>
            </div>
          </div>
          <?php else: ?>
            <div class="row">
              <div class="col-lg-7 productosCarrito">
                <div class="card cartaProductos">
                  <div class="card-header">
                    <h6 class="mb-0">Detalle del pedido</h6>
                  </div>
                  <div class="card-body py-4">
                    <table class="table table-hover" width="100%">
                      <tbody>
                        <thead>
                          <tr>
                            <th width="42%" class="columnas" scope="col">Prodcuto</th>
                            <th width="12" class="columnas" scope="col">Precio</th>
                            <th width="10%" class="columnas" scope="col">Cantidad</th>
                            <th width="15%" class="columnas" scope="col">Subtotal</th>
                            <th width="20%" class="columnas" scope="col"></th>
                          </tr>
                        </thead>
                        <?php foreach ($_SESSION["idProductos"] as $key => $value): ?>
                          <tr>
                            <td class="filas" >
                              <div class="container p-0">
                                <div class="row">
                                  <div class="col-lg-4 p-0 imagen-producto-carrito">
                                    <img src="<?php echo $productos[$value]["imagen"]; ?>" alt="">
                                  </div>
                                  <div class="col-lg-8 p-0 informacion-producto-carrito">
                                    <a class="hipervinculo-producto" href="detalleProducto.php?prod=<?php echo $value; ?>"><?php echo $productos[$value]["Nombre"]; ?></a>
                                    <p>codigo Producto (todavia no realizado)</p>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="filas"><?php echo "$".$productos[$value]["precio"]; ?></td>
                            <td class="filas">
                                <input type="number" class="qty form-control" id="input-qty" name="qty" maxlength="2" value="1" >
                            </td>
                            <td class="filas"><?php echo "$".$productos[$value]["precio"]; ?></td>
                            <td class="filas"><a href="carrito.php?prod=<?php echo $value; ?>">Eliminar<img src="img/eliminar-icono.png" alt=""></a></td>
                          </tr>
                        <?php endforeach; ?>
                        <tr>
                          <td class="filas text-center" colspan="5"><a href="productos.php">Agregar mas productos</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>

              <div class="col-lg-4 productosCarrito">
                <div class="card cartaProductos">
                  <div class="card-header">
                    <h6 class="mb-0">Resumen del pedido</h6>
                  </div>
                  <div class="card-body py-4">
                    <table class="table card-text">
                      <tr>
                        <th class="py-4">Subtotal</th>
                        <td class="py-4 text-right text-muted"><?php echo calcularSubtotal($_SESSION["idProductos"]);?></td>
                      </tr>
                      <tr>
                        <td class="py-4 text-left text-muted" colspan="2">
                          <form class="form-inline" action="carrito.php" method="post">
                            <div class="form-group mr-3">
                              <label for="codigoDescuento" class="sr-only">Codigo de descuento</label>
                              <input type="text" class="form-control" id="codigoDescuento" name="codigoDescuento" placeholder="Codigo de descuento">
                            </div>
                            <button type="submit" class="btn btn-primary">Aplicar</button>
                          </form>
                        </td>
                      <tr>
                        <th class="pt-4">Total</th>
                        <td class="pt-4 text-right h3 font-weight-normal"><?php echo "$".$total; ?></td>
                      </tr>
                    </table>
                    <div class="text-right">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter">
                        Siguiente
                      </button>

                      <!-- Modal -->
                      <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Seleccione la tarjeta con la cual realizara la compra</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table class="table table-hover" width="100%">
                                <tbody>
                                  <tr>
                                    <td class="filas" >
                                      <div class="container p-0">
                                        <div class="row">
                                          <div class="col-lg-4 p-0 imagen-producto-carrito">
                                            <img src="img/ceramica5.jpg" alt="">
                                          </div>
                                          <div class="col-lg-8 p-0 informacion-producto-carrito">
                                            <h6>Terminada en 5585</h6>
                                            <p>Mastercard</p>
                                            <p>Vencimiento: 04/2029</p>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="filas text-right">
                                      <input type="radio" name="seleccionTarjeta" value="1">  Seleccionar
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="filas" >
                                      <div class="container p-0">
                                        <div class="row">
                                          <div class="col-lg-4 p-0 imagen-producto-carrito">
                                            <img src="img/ceramica5.jpg" alt="">
                                          </div>
                                          <div class="col-lg-8 p-0 informacion-producto-carrito">
                                            <h6>Terminada en 5585</h6>
                                            <p>Mastercard</p>
                                            <p>Vencimiento: 04/2029</p>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="filas text-right">
                                      <input type="radio" name="seleccionTarjeta" value="2">  Seleccionar
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="filas" >
                                      <div class="container p-0">
                                        <div class="row">
                                          <div class="col-lg-4 p-0 imagen-producto-carrito">
                                            <img src="img/ceramica5.jpg" alt="">
                                          </div>
                                          <div class="col-lg-8 p-0 informacion-producto-carrito">
                                            <h6>Terminada en 5585</h6>
                                            <p>Mastercard</p>
                                            <p>Vencimiento: 04/2029</p>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="filas text-right">
                                      <input type="radio" name="seleccionTarjeta" value="3">  Seleccionar
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              <button type="button" class="btn btn-primary">Comprar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php endif; ?>
        <?php else: ?>
          <div class="row">
            <div class="contenedor-sin-productos col-12">
              <div class="texto-carrito-sin-productos">
                <h2>Tu carrito está vacío</h2>
                <h6>¿No sabés qué comprar? ¡Miles de productos te esperan!</h6>
                <a href="productos.php">Agregar productos al carrito</a>
              </div>
            </div>
          </div>
      <?php endif; ?>
    </div>
@endsection
