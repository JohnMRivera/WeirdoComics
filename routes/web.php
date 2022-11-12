<?php

use App\Http\Controllers\ControladorVistas;
use Illuminate\Support\Facades\Route;

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
    Route::get('proveedores','vistaProveedores')->name('pro');
    Route::get('consultaCA','vistaCA')->name('cca');
    Route::get('pedidos','vistaPedidos')->name('ped');
    Route::get('/','vistaLogin')->name('log');
    Route::get('/registro_usuario','registroUsuario')->name('reg_usu');
    Route::get('registro_articulos','vistaRegistroA')->name('rega');
    Route::get('registro_comics','vistaRegistroC')->name('regc');
    // Route::get('ventas_mostrador','vistaVentasM')->name('venm');
    Route::get('registro_Proveedores', 'vistaRegistroPro')->name('regpro');
    Route::get('tienda','vistaTienda')->name('shop');
    Route::get('carrito', 'vistaCarrito')->name('shCar');
    Route::post('agregar', 'AgregarArticulo') -> name('addArti');
    // Route::post('agregar_comic', 'AgregarComic')->name('addCom');
    // Route::post('agregar_proveedor', 'AgregarProveedor')->name('addProv');
    // // Route::get('sesion','VistaSesion')->name('ses');
    
    // Procesos de validación
    Route::post('agregar_articulo_pedido','agregarArticuloPedido')->name('agr_art');
    Route::post('procesar_login','procesarLogin')->name('pro_log');
    Route::post('procesar_registro_usuario','procesarRegistroUsuario')->name('pro_reg_usu');
    Route::get('eliminar_proveedor','eliminarProveedor')->name('eli_pro');
    Route::get('eliminar_articulo','eliminarArticulo')->name('eli_art');
    Route::post('generar_pedido','generarPedido')->name('gen_ped');
});

// 
// Route::post('guardarRegistro',[ControladorVistas::class,'ProcesarRegistro'])->name('Sing');