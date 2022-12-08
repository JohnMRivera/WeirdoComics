<?php

use App\Http\Controllers\ControladorVistas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorUsuariosBD;
use App\Http\Controllers\ControladorComicsBD;
use App\Http\Controllers\ControladorArticulosBD;
use App\Http\Controllers\ControladorProveedoresBD;
use App\Http\Controllers\ControladorTienda;
use App\Http\Controllers\ControladorCarritoBD;
use App\Http\Controllers\ControladorPedidosBD;
use App\Mail\SolicitudPedidos;

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
    // Route::get('carrito', 'vistaCarrito')->name('car');

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
    Route::delete('comic/{id}/destroy','destroy')->name('comic.destroy');
    Route::get('comic/edit/{id}','edit')->name('comic.edit');
    Route::put('comic/update/{id}','update')->name('comic.update');
});

// Articulos
Route::controller(ControladorArticulosBD::class)->group(function(){
    Route::get('articulo','create')->name('articulo.create');
    Route::post('articulo/store','store')->name('articulo.store');
    Route::delete('articulo/{id}/destroy','destroy')->name('articulo.destroy');
    Route::get('articulo/edit/{id}','edit')->name('articulo.edit');
    Route::put('articulo/update/{id}','update')->name('articulo.update');
});

// Proveedores
Route::controller(ControladorProveedoresBD::class)->group(function(){
    Route::get('proveedor','create')->name('proveedor.create');
    Route::post('proveedor/store','store')->name('proveedor.store');
    Route::get('proveedor/index/{id_usuario}','index')->name('proveedor.index');
    Route::delete('proveedor/{id}/destroy','destroy')->name('proveedor.destroy');
    Route::get('proveedor/edit/{id}','edit')->name('proveedor.edit');
    Route::put('proveedor/update/{id}','update')->name('proveedor.update');
});

// Tienda
Route::controller(ControladorTienda::class)->group(function(){
    Route::get('tienda/{id_usuario}/{nombre}/{tipo}','index')->name('tienda.index');
    Route::post('tienda/create/{id_usuario}','create')->name('tienda.create');
    Route::post('tienda/reporte/{id_usuario}','generarReporte')->name('tienda.reporte');
});

// Carrito
Route::controller(ControladorCarritoBD::class)->group(function(){
    Route::get('carrito/{id_usuario}','index')->name('carrito.index');
    Route::post('tienda_carrito_comic/{id_usuario}/{id_comic}/{cantidadDisponible}','ingresarComic')->name('tienda.comic');
    Route::post('tienda_carrito_articulo/{id_usuario}/{id_articulo}/{cantidadDisponible}','ingresarArticulo')->name('tienda.articulo');
    Route::post('carrito/create/{id_usuario}','create')->name('carrito.create');
    Route::delete('carrito/destroy/{id_usuario}/{id_carrito}','destroy')->name('carrito.destroy');
    Route::get('ticket/{id_usuario}', 'pdf')->name('ticket.pdf');
});

// Pedidos
Route::controller(ControladorPedidosBD::class)->group(function(){
    Route::get('pedido/{id_proveedor}/{id_usuario}/{nombre}/{tipo}','create')->name('pedido.create');
    Route::post('pedido/{id_proveedor}/{id_usuario}','buscar')->name('articulo.buscar');
    Route::post('pedido/agregar/{id_proveedor}/{id_usuario}/{nombre}/{tipo}','agregar')->name('pedido.agregar');
    Route::post('pedido/store/{id_proveedor}/{id_usuario}/{nombre}/{tipo}','store')->name('pedido.store');
    Route::delete('pedido/destroy/{id_proveedor}/{id_usuario}/{nombre}/{tipo}/{id_carrito_pedido}','destroy')->name('pedido.destroy');
});

// Route::get('proveedor/index',[ControladorProveedoresBD::class, 'index'])->name('proveedor.index');

Route::get('solicitud_pedidos', function(){
    $correo = new SolicitudPedidos();
    
    Mail::to('brian.yunuel.soto.sanchez@gmail.com')->send($correo);

    return "Mensaje enviado";
});