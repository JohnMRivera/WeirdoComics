<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulos = DB::table('articulos')->get();

        return view('registro_articulos', compact('articulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidadorRegistroArticulos $request)
    {
        DB::table('articulos')->insert([
            'nombre_articulo' => $request->input('txtNombreArticulo'),
            'tipo' => $request->input('txtTipoArticulo'),
            'marca' => $request->input('txtMarcaArticulo'),
            'descripcion' => $request->input('txtDescripcionArticulo'),
            'cantidad_articulos' => $request->input('txtCantidadArticulo'),
            'precio_compra' => $request->input('txtPrecioCompraArticulo'),
            'precio_venta' => $request->input('txtPrecioCompraArticulo') * 1.4,
            'imagen' => $request->input('img'),
            'fecha' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('articulo')->with('registrado','xxxx');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articuloId = DB::table('articulos')->where('id_articulo', $id)->get();

        return view('editar_articulos', compact('articuloId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidadorRegistroArticulos $request, $id)
    {
        $precio_compra = $request->input('txtPrecioCompraArticulo');

        DB::table('articulos')->where('id_articulo', $id)->update([
            'nombre_articulo' => $request->input('txtNombreArticulo'),
            'tipo' => $request->input('txtTipoArticulo'),
            'marca' => $request->input('txtMarcaArticulo'),
            'descripcion' => $request->input('txtDescripcionArticulo'),
            'cantidad_articulos' => $request->input('txtCantidadArticulo'),
            'precio_compra' => $request->input('txtPrecioCompraArticulo'),
            'precio_venta' => $request->input('txtPrecioCompraArticulo') * 1.4,
            'imagen' => $request->input('img'),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('articulo.create')->with('editado','x');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('articulos')->where('id_articulo', $id)->delete();

        return redirect('articulo')->with('eliminado','xxxx');
    }
}
