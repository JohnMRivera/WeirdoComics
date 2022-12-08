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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comics = DB::table('comics')->get();

        return view('registro_comics', compact('comics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $comicId = DB::table('comics')->where('id_comic', $id)->get();

        return view('editar_comics', compact('comicId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidadorRegistroComics $request, $id)
    {
        $precio_compra = $request->input('txtPrecioCompraComic');

        DB::table('comics')->where('id_comic', $id)->update([
            'nombre_comic' => $request->input('txtNombreComic'),
            'edicion' => $request->input('txtEdicionComic'),
            'compañia' => $request->input('txtCompañiaComic'),
            'cantidad_comics' => $request->input('txtCantidadComic'),
            'precio_compra' => $precio_compra,
            'precio_venta' => $precio_compra * 1.4,
            'imagen' => $request->input('img'),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('comic.create')->with('editado','x');
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
