<?php

namespace App\Http\Controllers;

use App\DetallePedido;
use APP\Pedido;
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
        $pedido = new Pedido();

        $pedido->fechaPedido = date('Y-m-d');
        $pedido->total =
        $pedido->totalConDescuento =
        $descuento_codigoDescuento =
        $estadoPedido_idEstadoPedido =

        foreach ($request['productosCarrito'] as $key => $value) {
          $detallePedido = new DetallePedido();

          $detallePedido->cantidad =
          $detallePedido->precio =
          $detallePedido->subtotal =
          $detallePedido->productos_idProductos =
          

        }

      } catch (\Exception $e) {

      }

      $booleano = true;
      $vac = compact('booleano');
      return view('resultadoCompra', $vac);
    }
}
