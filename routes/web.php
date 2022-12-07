<?php

use App\Http\Controllers\ControladorVistas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorUsuariosBD;
use App\Http\Controllers\ControladorComicsBD;
use App\Http\Controllers\ControladorArticulosBD;
use App\Http\Controllers\ControladorProveedoresBD;
use App\Http\Controllers\ControladorVentasBD;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(ControladorVistas::class)->group(function(){
    Route::get('menu','vistaMenu')->name('ini');
    // Route::get('proveedores','vistaProveedores')->name('pro');
    Route::get('consultaCA','vistaCA')->name('cca');
    Route::get('pedidos','vistaPedidos')->name('ped');
    Route::get('/','vistaLogin')->name('log');
    Route::get('registro_usuario','registroUsuario')->name('reg_usu');
    Route::get('registro_articulos','vistaRegistroA')->name('reg_art');
    Route::get('registro_comics','vistaRegistroC')->name('reg_com');
    // Route::get('ventas_mostrador','vistaVentasM')->name('venm');
    Route::get('registro_proveedores', 'vistaRegistroProveedores')->name('reg_pro');
    Route::get('tienda','vistaTienda')->name('shop');
    Route::get('carrito', 'vistaCarrito')->name('shCar');

    // Route::post('agregar_comic', 'AgregarComic')->name('addCom');
    // Route::post('agregar_proveedor', 'AgregarProveedor')->name('addProv');
    // // Route::get('sesion','VistaSesion')->name('ses');

    // Procesos de validación
    // Validaciónes Login
    Route::post('procesar_login','procesarLogin')->name('pro_log');
    Route::post('procesar_registro_usuario','procesarRegistroUsuario')->name('pro_reg_usu');

    // Validaciones Registro de Usuario
    Route::post('agregar_comic','agregarComic')->name('agr_com');
    Route::get('eliminar_comic','eliminarComic')->name('eli_com');

    // Validaciones Registro de Articulo
    Route::post('agregar_articulo', 'AgregarArticulo') -> name('agr_art');
    Route::get('eliminar_articulo','eliminarArticulo')->name('eli_art');

    // Validaciones Agenda de Proveedores
    Route::get('eliminar_proveedor','eliminarProveedor')->name('eli_pro');

    // Validaciones de Pedidos
    Route::post('agregar_articulo_pedido','agregarArticuloPedido')->name('agr_art_ped');
    Route::get('eliminar_articulo_pedido','eliminarArticuloPedido');
    Route::post('generar_pedido','generarPedido')->name('gen_ped');

    // Validaciones Proveedores
    // Route::post('agregar_proveedor','agregarProveedor')->name('agr_pro');
});

//
// Route::post('guardarRegistro',[ControladorVistas::class,'ProcesarRegistro'])->name('Sing');

// Usuarios
Route::controller(ControladorUsuariosBD::class)->group(function(){
    Route::get('usuario','create')->name('usuario.create');
    Route::post('usuario/store','store')->name('usuario.store');
});

// Comics
Route::controller(ControladorComicsBD::class)->group(function(){
    Route::get('comic','create')->name('comic.create');
    Route::post('comic/store','store')->name('comic.store');
    Route::delete('comic/destroy','destroy')->name('comic.destroy');
});

// Articulos
Route::controller(ControladorArticulosBD::class)->group(function(){
    Route::get('articulo','create')->name('articulo.create');
    Route::post('articulo/store','store')->name('articulo.store');
});

// Proveedores
Route::controller(ControladorProveedoresBD::class)->group(function(){
    Route::get('proveedor','create')->name('proveedor.create');
    Route::post('proveedor/store','store')->name('proveedor.store');
    Route::get('proveedor_index','index')->name('proveedor.index');

    Route::delete('proveedor/{id}/destroy','destroy')->name('proveedor.destroy');
});


Route::get('ventas/PDF', [ControladorVentasBD::class, 'pdf'])->name('ventas.pdf');
//Tienda

Route::get('carrito/index', [ControladorVentasBD::class, 'index'])->name('ventas.index');
Route::get('carrito/store', [ControladorVentasBD::class, 'store'])->name('ventas.store');
