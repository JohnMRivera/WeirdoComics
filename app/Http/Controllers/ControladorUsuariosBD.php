<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidadorRegistroUsuario;
use DB;
use Carbon\Carbon;

class ControladorUsuariosBD extends Controller
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
        return view('registro_usuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidadorRegistroUsuario $request)
    {
        $correo = $request->input('txtCorreo');

        $datos = DB::table('usuarios')->where('correo', $correo)->get();

        if(count($datos) == 0){
            DB::table('usuarios')->insert([
                'nombre_usuario' => $request->input('txtNombre'),
                'apellido_p' => $request->input('txtApellidoP'),
                'apellido_m' => $request->input('txtApellidoM'),
                'rol' => $request->input('txtRol'),
                'correo' => $request->input('txtCorreo'),
                'contra' => $request->input('txtContra'),
                'telefono' => $request->input('txtTelefono'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect('/')->with('registrado','xxxx');
        } else {
            return redirect('/usuario')->with('correo_no_disponible','xxxx');
        }
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
        //
    }
}
