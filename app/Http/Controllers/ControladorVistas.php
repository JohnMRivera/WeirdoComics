<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidadorPedidos;
use App\Http\Requests\ValidadorLogin;
use App\Http\Requests\ValidadorRegistroUsuario;
use App\Http\Requests\ValidadorRegistroComics;
use App\Http\Requests\VistaSingUp;

class ControladorVistas extends Controller
{
    
    public function vistaMenu(Request $request){
        return view('menu');
    }

    public function vistaProveedores(){
        return view('agenda_proveedores');
    }

    public function vistaConsultaCA(){
        return view('consulta_comics_articulos');
    }

    public function vistaPedidos(){
        return view('pedidos');
    }

    public function vistaLogin(){
        return view('login');
    }

    public function vistaRegistroA(){
        return view('registro_articulos');
    }

    public function vistaRegistroC(){
        return view('registro_comics');
    }
    
    public function vistaVentasM(){
        return view('ventas_mostrador');
    }

    public function registroUsuario(){
        return view('registro_usuario');
    }

    public function eliminarProveedor(){
        return redirect()->route('pro')->with('eliminar_proveedor','Se elimino el proveedor correctamente');
    }

    public function agregarArticuloPedido(ValidadorPedidos $request){
        return redirect()->route('ped')->with('agregar_articulo','Se agrego el articulo');
    }

    public function eliminarArticulo(){
        return redirect()->route('ped')->with('eliminar_articulo','Se elimino el articulo correctamente');
    }

    public function vistaCarrito(){
        return view('carrito');
    }

    public function vistaTienda(){
        return view('tienda');
    }

    public function vistaRegistroPro(){
        return view('registro_Proveedores');
    }
    
    public function procesarLogin(ValidadorLogin $request){
        $usuario = $_POST['txtUsuario'];
        // $usuario = $request->input('txtUsuario');

        return redirect()->route('ini')->with('logeo_confirmado',$usuario);
    }

    public function procesarRegistroUsuario(ValidadorRegistroUsuario $request){
        return redirect()->route('reg_usu')->with('registro_usuario_confirmado','El registro de Usario ha sido exitoso');
    }

    public function eliminarComic(){
        return redirect()->route('reg_com')->with('eliminar_comic','El comic ha sido eliminado');
    }

    public function agregarComic(ValidadorRegistroComics $request){
        $nombre = $request->input('txtNombreComic');

        return redirect()->route('reg_com')->with('agregar_comic',$nombre);
    }




    public function generarPedido(){
        return redirect()->route('ped')->with('generar_pedido','El pedido ha sido generado');
    }

    // public function vistaSingUp(){
    //     return view('singup');
    // }

    // public function VistaSesion(){
    //     return view('Sesion');
    // }

    // public function AgregarArticulo(validarRegistroArticulos $req){
    //     $nombre = $req->input('nombre-arti');
    //     return redirect()->route('rega')->with('agregar', $nombre);
    // }

    // public function AgregarComic(validarRegistroComics $req){
    //     $nombre = $req->input('nombre-comic');
    //     return redirect()->route('regc')->with('agregar', $nombre);
    // }

    // public function AgregarProveedor(validarProveedor $req){
    //     $nombre = $req->input('nom-empresa');
    //     return redirect()->route('regpro')->with('agregar', $nombre);
    // }
    
    // public function ProcesarRegistro(VistaSingUp $req){
    //     $Usuario=$req->input('TxtUsuario');
    //     return redirect()->route('Up')->with('confirmacion',$Usuario);
    // }
}