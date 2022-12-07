<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Carbon\Carbon;
use App\Http\Requests\ValidadorRegistroArticulos;

class ControladorArticulosBD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('articulos')->get();

        return view('registro_articulos', compact('datos'));
    }

    public function pdf(){
        $datos = DB::table('ventas_mostrador')->get();

        $pdf = PDF::loadView('pdf', ['datos'=>$datos]);
        return $pdf->download('Ventas.pdf');
        // return view('pdf', compact('datos'));
    }

    public function create()
    {
        return view('registro_articulos');
    }


    public function store(Request $request)
    {
        DB::table('articulos')->insert([
            // 'nombre_articulo' => $request->input('txtNombreArticulo'),
            'tipo' => $request->input('txtTipoArticulo'),
            'marca' => $request->input('txtMarcaArticulo'),
            'descripcion' => $request->input('txtDescripcionArticulo'),
            'cantidad_articulos' => $request->input('txtCantidadArticulo'),
            'precio_compra' => $request->input('txtPrecioCompraArticulo'),
            'precio_venta' => $request->input('txtPrecioCompraArticulo') * 1.4,
            'fecha' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('articulo')->with('registrado','xxxx');
    }

    public function buscar($descripcion)
    {
        $datos = DB::table('articulos')->where('descripcion', $descripcion)->first();

        return view('registro_articulos', compact('datos'));
    }

    public function edit($id)
    {
        $datos = DB::table('articulos')->where('id_articulos', $id)->first();

        return view('registro_articulos', compact('datos'));
    }


    public function update(ValidadorRegistroArticulos $request, $id)
    {
        DB::table('articulos')->where('id_articulo', $id)->update([
            'tipo' => $request->input('txtTipoArticulo'),
            'marca' => $request->input('txtMarcaArticulo'),
            'descripcion' => $request->input('txtDescripcionArticulo'),
            'cantidad_articulos' => $request->input('txtCantidadArticulo'),
            'precio_compra' => $request->input('txtPrecioCompraArticulo'),
            'precio_venta' => $request->input('txtPrecioCompraArticulo') * 1.4,
        ]);
        return redirect('articulo')->with('articuloActualizado', 'abc');
    }

    public function destroy($id)
    {
        DB::table('articulos')->where('id_articulo', $id)->delete();
        return redirect('articulo')->with('articuloEliminado', 'abc');
    }
}
