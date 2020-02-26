<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Marca;
use App\Categoria;
use App\Descuento;
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

    public function agregar ($id)
    {
      session_start();
      $_SESSION['carrito'][]=$id;
      //$productos = Producto::whereIn('idProductos', $_SESSION['carrito'])->get();
      //dd($productos);
      return redirect ('productos');
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
        $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                                ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                                ->Where('borrado', '=', 'N')
                                ->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
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
        $productos = $productos->where('productos.nombre','LIKE','%'.$form['nombreProducto'].'%');
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

    public function listadoProductosCarrito(){
      session_start();
      $productosCarrito = Producto::whereIn('idProductos', $_SESSION['carrito'])->get();
      $subtotal = 0;
      foreach ($productosCarrito as $productoCarrito) {
        $subtotal = $subtotal + $productoCarrito['precio'];
      }
      $total = $subtotal;
      $vac = compact('productosCarrito', 'subtotal', 'total');
      return view('carritoCompras', $vac);
    }

    public function calculoCodigoDescuento(Request $codigoDescuento){
      session_start();
      $productosCarrito = Producto::whereIn('idProductos', $_SESSION['carrito'])->get();
      $subtotal = 0;
      foreach ($productosCarrito as $productoCarrito) {
        $subtotal = $subtotal + $productoCarrito['precio'];
      }
      $descuento = null;
      $descuento = Descuento::Where('codigoDescuento', '=', $codigoDescuento['codigoDescuento'])->where('fechaInicio', '<', date('Y-m-d'))->where('fechaFin', '>', date('Y-m-d'))->get();
      $total = $subtotal;
      if ($descuento != null){
        $total = $total - ($total * $descuento->porcentaje / 100);
      }
      $vac = compact('productosCarrito', 'subtotal', 'total');
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
      $total = $subtotal;
      $vac = compact('productosCarrito', 'subtotal', 'total');
      return view('carritoCompras', $vac);
    }

    public function eliminarProducto(Request $codigoProducto){
      $producto = Producto::find($codigoProducto['idProducto']);
      $producto->borrado = 'S';
      $producto->save();

      // busca productos para mostrar
      $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                              ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                              ->Where('borrado', '=', 'N')
                              ->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
      $marcas = Marca::all();
      $categorias = Categoria::all();
      $vac = compact('productos', 'marcas', 'categorias');
      return view ('ABMProductos', $vac);
    }

    public function modificarProducto(Request $datosProd){
      $producto = Producto::find($datosProd['idProducto']);
      $producto->nombre = $datosProd['nombre'];
      $producto->imagen = $datosProd['imagen'];
      $producto->descripcion = $datosProd['descripcion'];
      $producto->precio = $datosProd['precio'];
      $producto->Categoria_idCategoria = $datosProd['categoria'];
      $producto->Marca_idMarca = $datosProd['marca'];
      /*$producto->oferta = $datosProd['nombre*/
      $producto->Stock = $datosProd['stock'];

      $producto->save();


      // busca productos para mostrar
      $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                              ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                              ->Where('borrado', '=', 'N')
                              ->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
      $marcas = Marca::all();
      $categorias = Categoria::all();
      $vac = compact('productos', 'marcas', 'categorias');
      return view ('ABMProductos', $vac);
    }
}
