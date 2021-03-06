<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Marca;
use App\Categoria;
use App\Descuento;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }
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

      return redirect ('productos');
    }

    public function agregarEnDetalle($id){
      session_start();
      $_SESSION['carrito'][]=$id;
      return redirect ('productos/'.$id);
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
        $consulta = ' ';
        $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                                ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                                ->Where('borrado', '=', 'N')
                                ->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $vac = compact('productos', 'marcas', 'categorias', 'consulta');
        return view ('ABMProductos', $vac);
    }


    public function listadoProductosFiltro(Request $form)
    {
      $consulta = ' ';
      try {
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

      } catch (\Exception $e) {
        $consulta = 'Algo a pasado con nuestro servidor, intente mas tarde :(';
      }

      $productos = $productos->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
      $marcas = Marca::all();
      $categorias = Categoria::all();
      $vac = compact('productos', 'marcas', 'categorias', 'consulta','form');
      return view ('ABMProductos', $vac);
    }



    public function eliminarProducto(Request $codigoProducto){
      $consulta = ' ';
      try {
        $producto = Producto::find($codigoProducto['idProducto']);
        $producto->borrado = 'S';
        $producto->save();

      } catch (\Exception $e) {
        $consulta = false;
      }


      // busca productos para mostrar
      $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                              ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                              ->Where('borrado', '=', 'N')
                              ->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
      $marcas = Marca::all();
      $categorias = Categoria::all();
      $vac = compact('productos', 'marcas', 'categorias', 'consulta');
      return view ('ABMProductos', $vac);
    }

    public function modificarProducto(Request $datosProd){
      $consulta = ' ';
      try {

        if($_FILES['imagen']['error'] != 0){
          $consulta = 'Fijese si la imagen fue agregada correctamente';

          $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                                  ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                                  ->Where('borrado', '=', 'N')
                                  ->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
          $marcas = Marca::all();
          $categorias = Categoria::all();
          $vac = compact('productos', 'marcas', 'categorias', 'consulta');
          return view ('ABMProductos', $vac);
        }
        else {
          $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
          if ($ext != 'jpg' &&  $ext != 'jpeg' && $ext != 'png') {
            $consulta = 'El formato de la imagen no es el correcto';

            $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                                    ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                                    ->Where('borrado', '=', 'N')
                                    ->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
            $marcas = Marca::all();
            $categorias = Categoria::all();
            $vac = compact('productos', 'marcas', 'categorias', 'consulta');
            return view ('ABMProductos', $vac);
          }
          else {
            $ubicacionArchivo = 'Imagenes/imagen'. $datosProd['codigo'] . '.'.$ext;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $ubicacionArchivo);
          }
        }

        $producto = Producto::find($datosProd['idProducto']);
        $producto->nombre = $datosProd['nombre'];
        $producto->imagen = $datosProd['imagen'];
        $producto->descripcion = $datosProd['descripcion'];
        $producto->precio = $datosProd['precio'];
        $producto->Categoria_idCategoria = $datosProd['categoria'];
        $producto->Marca_idMarca = $datosProd['marca'];
        $producto->Stock = $datosProd['stock'];
        $producto->imagen = $ubicacionArchivo;

        $producto->save();

      } catch (\Exception $e) {
        $consulta = 'Algo a pasado con nuestro servidor, intente mas tarde :(';
      }




      // busca productos para mostrar
      $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                              ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                              ->Where('borrado', '=', 'N')
                              ->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
      $marcas = Marca::all();
      $categorias = Categoria::all();
      $vac = compact('productos', 'marcas', 'categorias','consulta');
      return view ('ABMProductos', $vac);
    }

    public function nuevoProducto(Request $datosProd){
      $consulta = ' ';
      try {
        $producto = Producto::where('codigo','=',$datosProd['codigo'])->get();
        if ($producto->isEmpty()) {

          if($_FILES['imagen']['error'] != 0){
            $consulta = 'Fijese si la imagen fue agregada correctamente';

            $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                                    ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                                    ->Where('borrado', '=', 'N')
                                    ->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
            $marcas = Marca::all();
            $categorias = Categoria::all();
            $vac = compact('productos', 'marcas', 'categorias', 'consulta');
            return view ('ABMProductos', $vac);
          }
          else {
            $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            if ($ext != 'jpg' &&  $ext != 'jpeg' && $ext != 'png') {
              $consulta = 'El formato de la imagen no es el correcto';

              $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                                      ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                                      ->Where('borrado', '=', 'N')
                                      ->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
              $marcas = Marca::all();
              $categorias = Categoria::all();
              $vac = compact('productos', 'marcas', 'categorias', 'consulta');
              return view ('ABMProductos', $vac);
            }
            else {
              $ubicacionArchivo = 'Imagenes/imagen'. $datosProd['codigo'] . '.'.$ext;
              move_uploaded_file($_FILES['imagen']['tmp_name'], $ubicacionArchivo);
            }
          }

          $producto = new Producto();
          $producto->codigo = $datosProd['codigo'];
          $producto->nombre = $datosProd['nombre'];
          $producto->imagen = $ubicacionArchivo;
          $producto->descripcion = $datosProd['descripcion'];
          $producto->precio = $datosProd['precio'];
          $producto->Categoria_idCategoria = $datosProd['categoria'];
          $producto->Marca_idMarca = $datosProd['marca'];

          if ($datosProd['oferta'] = 'on') {
            $producto->oferta = 'S';
          }else {
            $producto->oferta = 'N';
          }

          $producto->stock = $datosProd['stock'];

          $producto->save();

        }else {
          // busca productos para mostrar
          $consulta = 'El codigo de producto que trata de ingresar ya se existe!';
        }
      } catch (\Exception $e) {
        $consulta = 'Algo a pasado con nuestro servidor, intente mas tarde :(';
      }




      // busca productos para mostrar
      $productos = Producto::Join('marca', 'productos.Marca_idMarca','=','marca.idMarca')
                              ->Join('categoria', 'productos.Categoria_idCategoria','=','categoria.idCategoria')
                              ->Where('borrado', '=', 'N')
                              ->get(['productos.*', 'categoria.nombre AS nombreCategoria', 'marca.nombre AS nombreMarca']);
      $marcas = Marca::all();
      $categorias = Categoria::all();
      $vac = compact('productos', 'marcas', 'categorias', 'consulta');
      return view ('ABMProductos', $vac);
    }

}
