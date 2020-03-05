<?php

namespace App\Http\Controllers;

use App\DetallePedido;
use App\Pedido;
use App\Tarjeta;
use App\Producto;
use App\Descuento;
use App\Cobro;

use Illuminate\Http\Request;

class carritoComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function show(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function edit(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetallePedido $detallePedido)
    {
        //
    }


    public function guardarCompra(Request $request){
      try {
        $booleano = true;

        session_start();
        $pedido = new Pedido();

        $pedido->fechaPedido = date('Y-m-d');
        $pedido->total = $request['subtotalCompra'];
        $pedido->totalConDescuento = $request['totalCompra'];
        if (isset($_SESSION['descuento'])) {
          $pedido->descuento_codigoDescuento = $_SESSION['descuento']['codigoDescuento'];
        }
        //todos se generan en el primer estado que es pendiente
        $pedido->EstadoPedido_idEstadoPedido = 3;
        $pedido->User_idUser = auth()->user()->id;
        $pedido->save();

        $producto = json_decode($request['productosCarrito'], true);
        foreach ($producto as $key => $productoCarrito) {

          $detallePedido = new DetallePedido();

          $detallePedido->cantidad = 1;
          $detallePedido->precio = $productoCarrito["precio"];
          $detallePedido->subtotal = $productoCarrito["precio"];
          $detallePedido->productos_idProductos = $productoCarrito["idProductos"];
          $pedidoRecienGuardado = $pedido->idPedido ;
          $detallePedido->Pedido_idPedido = $pedidoRecienGuardado;

          $detallePedido->save();
        }

        $cobro = new Cobro();
        $cobro->fechaCobro = date('Y-m-d');
        $cobro->totalCobro = $request['totalCompra'];
        $cobro->Tarjeta_idTarjeta  = $request['id'];
        $cobro->save();

        $pedido->Cobro_idCobro = $cobro->idCobro;
        $pedido->EstadoPedido_idEstadoPedido = 1;
        $pedido->save();

      } catch (\Exception $e) {
        $booleano = false;
      }

      $_SESSION['descuento'] = [];
      $_SESSION['carrito'] = [];


      $vac = compact('booleano');
      return view('resultadoCompra', $vac);
    }

    public function listadoProductosCarrito(){
      session_start();
      $productosCarrito = Producto::whereIn('idProductos', $_SESSION['carrito'])->get();
      $subtotal = 0;
      foreach ($productosCarrito as $productoCarrito) {
        $subtotal = $subtotal + $productoCarrito['precio'];
      }
      $tarjetas = Tarjeta::Where('users_id', '=', auth()->user()->id)->get();
      $total = $subtotal;
      $_SESSION['descuento'] = [];
      $vac = compact('productosCarrito', 'subtotal', 'total', 'tarjetas');
      return view('carritoCompras', $vac);
    }

    public function calculoCodigoDescuento(Request $codigoDescuento){
      session_start();
      $productosCarrito = Producto::whereIn('idProductos', $_SESSION['carrito'])->get();
      $subtotal = 0;
      foreach ($productosCarrito as $productoCarrito) {
        $subtotal = $subtotal + $productoCarrito['precio'];
      }
      $descuento = Descuento::Where('codigoDescuento', '=', $codigoDescuento['codigoDescuento'])->where('fechaInicio', '<', date('Y-m-d'))->where('fechaFin', '>', date('Y-m-d'))->get();
      $total = $subtotal;
      if ($descuento->isEmpty()){
        $total = $subtotal;
        $texto = 'Codigo de descuento no vigente';
      }else {
        $total = $total - ($total * $descuento[0]['porcentaje'] / 100);
        $_SESSION['descuento'] = $descuento[0];
        $texto = 'Descuento Aplicado!';
      }
      $tarjetas = Tarjeta::Where('users_id', '=', auth()->user()->id)->get();
      $vac = compact('productosCarrito', 'subtotal', 'total', 'tarjetas','texto');
      return view('carritoCompras', $vac);
    }

    public function eliminarProdCarrito($id){
      session_start();
      $arrayTemporal = $_SESSION['carrito'];
      $_SESSION['carrito'] = [];
      foreach ($arrayTemporal as $valor) {
        if ($valor != $id){
          $_SESSION['carrito'][] = $valor;
        }
      }
      $productosCarrito = Producto::whereIn('idProductos', $_SESSION['carrito'])->get();
      $subtotal = 0;
      foreach ($productosCarrito as $productoCarrito) {
        $subtotal = $subtotal + $productoCarrito['precio'];
      }
      $_SESSION['descuento'] = [];
      $total = $subtotal;
      $tarjetas = Tarjeta::Where('users_id', '=', auth()->user()->id)->get();
      $vac = compact('productosCarrito', 'subtotal', 'total', 'tarjetas');
      return view('carritoCompras', $vac);
    }
}
