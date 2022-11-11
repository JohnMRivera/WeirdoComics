<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidadorPedidos;
use App\Http\Requests\validarProveedor;
use App\Http\Requests\validarRegistroArticulos;
use App\Http\Requests\validarRegistroComics;
use App\Http\Requests\VistaSingUp;
use App\Http\Requests\vistalogin;

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

    // public function vistaLogin(){
    //     return view('login');
    // }

    public function vistaRegistroA(){
        return view('registro_articulos');
    }

    public function vistaRegistroC(){
        return view('registro_comics');
    }
    
    public function vistaVentasM(){
        return view('ventas_mostrador');
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
    
    public function vistaSingUp(){
        return view('singup');
    }

    public function VistaSesion(){
        return view('Sesion');
    }

    public function AgregarArticulo(validarRegistroArticulos $req){
        $nombre = $req->input('nombre-arti');
        return redirect()->route('rega')->with('agregar', $nombre);
    }

    public function AgregarComic(validarRegistroComics $req){
        $nombre = $req->input('nombre-comic');
        return redirect()->route('regc')->with('agregar', $nombre);
    }

    public function AgregarProveedor(validarProveedor $req){
        $nombre = $req->input('nom-empresa');
        return redirect()->route('regpro')->with('agregar', $nombre);
    }
    
    public function ProcesarRegistro(VistaSingUp $req){
        $Usuario=$req->input('TxtUsuario');
        return redirect()->route('Up')->with('confirmacion',$Usuario);
    }

    public function procesarLogin(vistalogin $req){
        return redirect()->route('ini');
    }
}