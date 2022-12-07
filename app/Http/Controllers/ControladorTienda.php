<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests\ValidadorTienda;

class ControladorTienda extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_usuario, $nombre, $tipo)
    {   
        // $nombre = "";
        // $tipo = "todos";
        if($nombre == "todos"){
            $nombre = "";
        }

        $comics = [];
        $articulos = [];

        // echo $nombre;
        // echo $tipo;
        // echo $id_usuario;

        if($tipo == "todos"){
            $comics = DB::table('comics')->where('nombre_comic', 'like', '%' . $nombre . '%')->get();
            $articulos = DB::table('articulos')->where('nombre_articulo', 'like', '%' . $nombre . '%')->get();
        } else if($tipo == "comics"){
            $comics = DB::table('comics')->where('nombre_comic', 'like', '%' . $nombre . '%')->get();
        } else if($tipo == "articulos"){
            $articulos = DB::table('articulos')->where('nombre_articulo', 'like', '%' . $nombre . '%')->get();
        }
        // $comics = DB::table('comics')->get();
        // $articulos = DB::table('articulos')->get();
        
        return view('tienda', compact('comics','articulos','nombre','tipo','id_usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id_usuario)
    {
        $nombre = $request->input('txtNombreArticulo');
        $tipo = $request->input('txtTipo');

        if($nombre == ""){
            $nombre = "todos";
        }

        return redirect()->route('tienda.index', [$id_usuario, $nombre, $tipo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
