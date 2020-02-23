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

Route::get('/dashBoardAdmin', function(){
  return view('dashBoardAdmin');
})->name('dashboardAdmin');

route::get('/ABMProductos', 'ProductosController@listadoProductos')->name('ABMProductos');

Route::post('/ABMProductos', 'ProductosController@listadoProductosFiltro')->name('ABMProductos');


Route::get('/perfilUsuario', 'PerfilUsuarioController@listadoComprasRealizadas')->name('perfilUsuario');
