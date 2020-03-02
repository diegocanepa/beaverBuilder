<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/productos', 'ProductosController@index')->name('productos');
Route::get('agregar/{id}', 'ProductosController@agregar')->name('agregar');
Route::get('/productos/{id}', 'ProductosController@show')->name('detalleProducto');

Route::get('/carritoCompras', 'ProductosController@listadoProductosCarrito')->name('carritoCompras');
Route::post('/carritoCompras', 'ProductosController@calculoCodigoDescuento')->name('carritoCompras');
Route::get('/eliminar/{id}', 'ProductosController@eliminarProdCarrito')->name('eliminar');
route::post('/resultadoCompra', 'carritoComprasController@guardarCompra')->name('resultadoCompra');

Route::get('/dashBoardAdmin', function(){
  return view('dashBoardAdmin');
})->name('dashboardAdmin');

/*rutas carito*/
route::get('/ABMProductos', 'ProductosController@listadoProductos')->name('ABMProductos');
Route::post('/ABMProductos', 'ProductosController@listadoProductosFiltro')->name('ABMProductos');
Route::post('/BajaProducto', 'ProductosController@eliminarProducto')->name('BajaProducto');
Route::post('/ModificarProducto', 'ProductosController@modificarProducto')->name('ModificarProducto');
Route::post('/NuevoProducto', 'ProductosController@nuevoProducto')->name('NuevoProducto');


Route::get('/perfilUsuario', 'PerfilUsuarioController@listadoComprasRealizadas')->name('perfilUsuario');

Route::get('/perfilUsuarioEdit', 'PerfilUsuarioController@informacionPerfilUsuarioEdit')->name('perfilUsuarioEdit');
route::post('/editarDireccion', 'PerfilUsuarioController@editarDireccion')->name('editarDireccion');
route::post('/eliminarDireccion', 'PerfilUsuarioController@eliminarDireccion')->name('eliminarDireccion');
route::post('/agregarDireccion', 'PerfilUsuarioController@agregarDireccion')->name('agregarDireccion');
route::post('/editarTarjeta', 'PerfilUsuarioController@editarTarjeta')->name('editarTarjeta');
route::post('/eliminarTarjeta', 'PerfilUsuarioController@eliminarTarjeta')->name('eliminarTarjeta');
route::post('/agregarTarjeta', 'PerfilUsuarioController@agregarTarjeta')->name('agregarTarjeta');


Route::get('/resultadoCompra', function(){
  return view('resultadoCompra');
})->name('resultadoCompra');
