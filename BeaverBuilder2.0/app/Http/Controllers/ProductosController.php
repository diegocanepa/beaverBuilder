<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class productosController extends Controller
{
    public function listado(){
      $productosListado = Producto::all();
      $vac = compact('productosListado');
      return view('productos', $vac);
    }

    public function ver($id){
      $producto = Producto::find($id);
      $vac = compact('producto');
      return view('detalleProducto', $vac);
    }
}
