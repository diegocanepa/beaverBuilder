@extends('layouts.app')

@section('content')
  <div class="container-carrito">
      <div class="row">
        <div class="col-12">
          <h1>Mi carro de compras</h1>
        </div>
      </div>
      @if (count($productosCarrito) == 0)
          <div class="row">
            <div class="contenedor-sin-productos col-12">
              <div class="texto-carrito-sin-productos">
                <h2>Tu carrito está vacío</h2>
                <h6>¿No sabés qué comprar? ¡Miles de productos te esperan!</h6>
                <a href="{{ route('productos') }}">Agregar productos al carrito</a>
              </div>
            </div>
          </div>
        @else
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
                      @foreach ($productosCarrito as $productoCarrito)
                        <tr>
                          <td class="filas" >
                            <div class="container p-0">
                              <div class="row">
                                <div class="col-lg-4 p-0 imagen-producto-carrito">
                                  <img src="{{ $productoCarrito["imagen"] }}" alt="">
                                </div>
                                <div class="col-lg-8 p-0 informacion-producto-carrito">
                                  <a class="hipervinculo-producto" href="productos/{{ $productoCarrito["idProductos"] }}">{{ $productoCarrito["nombre"] }}</a>
                                  <p>{{ $productoCarrito["codigo"] }}</p>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="filas"> {{ "$".$productoCarrito["precio"] }}</td>
                          <td class="filas">
                              <input type="number" class="qty form-control" id="input-qty" name="qty" maxlength="2" value="1" >
                          </td>
                          <td class="filas">{{ "$".$productoCarrito["precio"] }}</td>
                          <td class="filas"><a href="/eliminar/{{ $productoCarrito["idProductos"] }}">Eliminar<img src="img/eliminar-icono.png" alt=""></a></td>
                        </tr>
                      @endforeach
                      <tr>
                        <td class="filas text-center" colspan="5"><a href="{{ route('productos') }}">Agregar mas productos</a></td>
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
                      <td class="py-4 text-right text-muted">{{ "$".$subtotal }}</td>
                    </tr>
                    <tr>
                      <td class="py-4 text-left text-muted" colspan="2">
                        <form class="form-inline" action="{{ route ('carritoCompras') }}" method="post">
                          @csrf
                          <div class="form-group mr-3">
                            <label for="codigoDescuento" class="sr-only">Codigo de descuento</label>
                            <input type="text" class="form-control" id="codigoDescuento" name="codigoDescuento" placeholder="Codigo de descuento">
                          </div>
                          <button type="submit" class="btn btn-primary">Aplicar</button>
                        </form>
                      </td>
                    <tr>
                      <th class="pt-4">Total</th>
                      <td class="pt-4 text-right h3 font-weight-normal">{{"$".$total}}</td>
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
      @endif
  </div>
@endsection
