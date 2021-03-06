@extends('layouts.app')

@section('content')
<div class="body-carrito">
  <div class="container-carrito">
      <div class="row">
        <div class="col-12">
          <h1>Mi carro de compras</h1>
        </div>
      </div>
      @if (count($productosCarrito) == 0)
          <div class="row p-3">
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
                      @foreach ($productosCarrito as $i => $productoCarrito)
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
                              <input type="number" class="qty form-control" id="qty" name="qty" maxlength="2" value="1">
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
                        @if ($texto ?? '')
                          <p>{{$texto ?? ''}}</p>
                        @endif
                      </td>
                    </tr>
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
                                @foreach ($tarjetas as $tarjeta)
                                  <tr>
                                    <td class="filas" >
                                      <div class="container p-0">
                                        <div class="row">
                                          <div class="col-lg-3  imagen-producto-carrito">
                                            <i class="fa fa-credit-card-alt fa-5x" aria-hidden="true"></i>
                                          </div>
                                          <div class="col-lg-8 p-0 informacion-producto-carrito">
                                            <h6>Terminada en {{substr($tarjeta['nroTarjeta'],-4)}}</h6>
                                            <p>{{$tarjeta['nombre']}}</p>
                                            <p>Vencimiento: {{$tarjeta['fechaVencimiento']}}</p>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="filas text-right">
                                      <form class="" action="{{ Route ('resultadoCompra') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$tarjeta['id']}}">
                                        <input type="hidden" name="totalCompra" value="{{ $total }}">
                                        <input type="hidden" name="subtotalCompra" value="{{ $subtotal }}">
                                        <input type="hidden" name="productosCarrito" value="{{ $productosCarrito }}">
                                        <button type="submit" class="btn btn-dark">Seleccionar</button>
                                      </form>
                                    </td>
                                  </tr>
                                @endforeach
                                <tr>
                                  <td class="filas" >
                                    <div class="container p-0">
                                      <div class="row">
                                        <div class="col-lg-3  imagen-producto-carrito">
                                          <i class="fa fa-money fa-5x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-lg-8 p-0 pt-4 informacion-producto-carrito">
                                          <h6>Pago en Efectivo</h6>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="filas text-right">
                                    <form class="" action="{{ Route ('resultadoCompra') }}" method="post">
                                      @csrf
                                      <input type="hidden" name="nombreTarjeta" value="">
                                      <input type="hidden" name="codigoTarjeta" value="">
                                      <input type="hidden" name="totalCompra" value="{{ $total }}">
                                      <input type="hidden" name="subtotalCompra" value="{{ $subtotal }}">
                                      <input type="hidden" name="productosCarrito" value="{{ $productosCarrito }}">
                                      <button type="submit" class="btn btn-dark">Seleccionar</button>
                                    </form>
                                  </td>
                                </tr>

                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
</div>
@endsection
