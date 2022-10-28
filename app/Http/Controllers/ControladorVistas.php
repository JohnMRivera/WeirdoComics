<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function vistaLevantamiento(){
        return view('levantamiento');
    }

    public function vistaLogin(){
        return view('login');
    }

    public function vistarRegistroA(){
        return view('registro_articulos');
    }

    public function vistaRegistroC(){
        return view('registro_comics');
    }
    
    public function vistaVentasM(){
        return view('ventas_mostrador');
    }

}