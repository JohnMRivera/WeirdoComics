<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Carbon\Carbon;

class ControladorVentasBD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('ventas_mostrador')->get();

        return view('carrito', compact('datos'));
    }

    public function create()
    {
        return view('carrito');
    }

    public function pdf(){
        $datos = DB::table('ventas_mostrador')->get();

        $pdf = PDF::loadView('pdf', ['datos'=>$datos]);
        return $pdf->download('Ventas.pdf');
        // return view('pdf', compact('datos'));
    }

    public function store(Request $request)
    {
        DB::table('ventas_mostrador')->insert([
            // 'nombre_articulo' => $request->input('txtNombreArticulo'),
            'total' => $request->input('txtTotal'),
            'cantidad' => $request->input('txtCantidad'),
            'nombre_usuario' => $request->input('txtNom_usuario'),
            'fecha' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('carrito/index')->with('venta','xxxx');
    }

    public function show($id)
    {
        $datos = DB::table('ventas_mostrador')->where('id_venta', $id)->first();
        return view('carrito', compact('datos'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        DB::table('ventas_mostrador')->where('id_venta', $id)->delete();
        return redirect('carrito/index')->with('articuloElimin', 'abc');
    }
}
