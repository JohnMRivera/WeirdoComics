<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidadorRegistroComics;
use DB;
use Carbon\Carbon;

class ControladorComicsBD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = BD::table('comics')->get();

        return view('registro_comics', compact('datos'));
    }

    public function create()
    {
        $comics = DB::table('comics')->get();

        return view('registro_comics', compact('comics'));
    }


    public function store(ValidadorRegistroComics $request)
    {
        $precio_compra = $request->input('txtPrecioCompraComic');

        DB::table('comics')->insert([
            'nombre_comic' => $request->input('txtNombreComic'),
            'edicion' => $request->input('txtEdicionComic'),
            'compañia' => $request->input('txtCompañiaComic'),
            'cantidad_comics' => $request->input('txtCantidadComic'),
            'precio_compra' => $precio_compra,
            'precio_venta' => $precio_compra * 1.4,
            'imagen' => $request->input('img'),
            'fecha' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('comic')->with('registrado','xxxx');
    }


    public function show($id)
    {
        $datos = DB::table('comics')->where('id_comics', $id)->first();

        return view('registro_comics', compact('datos'));
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
    public function update(ValidadorRegistroComics $req, $id)
    {
        DB::table('comics')->where('id_comic', $id)->update([
            'nombre_comic' => $req->input('txtNombreComic'),
            'edicion' => $req->input('txtEdicionComic'),
            'compañia' => $req->input('txtCompañiaComic'),
            'cantidad_comics' => $req->input('txtCantidadComic'),
            'imagen' => $req->input('input-file_input'),
            'precio_compra' => $req->input('txtPrecioCompraComic')
        ]);
        return redirect('comic.index')->with('ediconCompletada', 'xxxx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('comics')->where('id_comic', $id)->delete();

        return redirect('comic')->with('eliminado','xxxx');
    }
}
