<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Marca;
use App\Categoria;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productosListado = Producto::all();
      $vac = compact('productosListado');
      return view('productos', $vac);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $producto = Producto::find($id);
      $vac = compact('producto');
      return view('detalleProducto', $vac);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }

    public function listadoProductos()
    {
        $productos = Producto::all();
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $vac = compact('productos', 'marcas', 'categorias');
        return view ('ABMProductos', $vac);
    }


    public function listadoProductosFiltro(Request $form)
    {
      $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                           ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                           ->where('borrado','=','N');
      if ($form['codigoProducto']) {
        $productos = $productos->where('codigo','LIKE','%'.$form['codigoProducto'].'%');
      }
      if ($form['nombreProducto']) {
        $productos = $productos->where('nombre','LIKE','%'.$form['nombreProducto'].'%');
      }
      if ($form['precioDesde']) {
        $productos = $productos->where('precio','>', $form['precioDesde']);
      }
      if ($form['precioHasta']) {
        $productos = $productos->where('precio','<', $form['precioHasta']);
      }
      if ($form['marca'] != 0) {
        $productos = $productos->where('Marca_idMarca','=',$form['marca']);
      }
      if ($form['categoria'] != 0) {
        $productos = $productos->where('Categoria_idCategoria','=',$form['categoria']);
      }
      $productos = $productos->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
      $marcas = Marca::all();
      $categorias = Categoria::all();
      $vac = compact('productos', 'marcas', 'categorias');
      return view ('ABMProductos', $vac);
    }

}
