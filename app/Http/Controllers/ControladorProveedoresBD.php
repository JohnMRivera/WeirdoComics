<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests\ValidadorRegistroProveedores;

class ControladorProveedoresBD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = DB::table('proveedores')->get();

        return view('agenda_proveedores', compact('proveedores'));
        // return view('agenda_proveedores');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registro_proveedores');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidadorRegistroProveedores $request)
    {
        DB::table('proveedores')->insert([
            'empresa' => $request->input('txtEmpresaProveedor'),
            'direccion' => $request->input('txtDireccionProveedor'),
            'pais' => $request->input('txtPaisProveedor'),
            'contacto' => $request->input('txtContactoProveedor'),
            'no_fijo' => $request->input('txtNoFijoProveedor'),
            'no_celular' => $request->input('txtNoCelularProveedor'),
            'correo' => $request->input('txtCorreoProveedor'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('proveedor')->with('registrado','xxxx');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('proveedores')->where('id_proveedor', $id)->delete();

        // DB::table('proveedores')->get();

        return redirect('proveedor_index')->with('eliminado','xxxx');
    }
}
