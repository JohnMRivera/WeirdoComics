<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Agregamos estas extensiones para los validadores y los parametros
use App\Http\Requests\validadorDiario;
use App\Http\Requests\vistalogin;
use App\Http\Requests\VistaSingUp;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ControladorBD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultRec= DB::table('recuerdos')->get();

        return view('recuerdos', compact('resultRec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //desplegar la vista formulario
    public function create()
    {
//Paso 2 agregamos una view
    return view('ingresar');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Paso 8 Agregamos los parametros para poder obtener los datos de los inputs
    public function store(vistalogin $request)
    {
        DB::table('recuerdos')->insert([
            "titulo"=>$request->input('txtTitulo'),
            "recuerdo"=>$request->input('txtRecuerdo'),
            "fecha"=> Carbon::now(),
            "created_at"=> Carbon::now(),
            "updated_at"=> Carbon::now(),

        ]);
        return redirect('recuerdo/create')->with('confirmacion',"Tu recuerdo ah sido guardado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consultaId=DB::table('recuerdos')->where('idRecuerdo',$id)->first();
        return view('Eliminar',compact('consultaId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultaId= DB::table('recuerdos')->where('idRecuerdo',$id)->first();
        return view('Editar',compact('consultaId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VistaSingUp $request, $id)
    {
        DB::table('recuerdos')->where('idRecuerdo',$id)->update([
            "titulo"=>$request->input('txtTitulo'),
            "recuerdo"=>$request->input('txtRecuerdo'),
            "updated_at"=> Carbon::now(),

        ]);
        return redirect('recuerdo')->with('Actualizado',"Tu recuerdo ah sido actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('recuerdos')->where('idRecuerdo',$id)->delete();
        return redirect('recuerdo')->with('Eliminacion',"abc");
    }
}
