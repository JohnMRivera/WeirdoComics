<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SolicitudPedidos;
use App\Http\Requests\ValidadorPedidos;
use DB;
use Carbon\Carbon;

class ControladorPedidosBD extends Controller
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
    public function create($id_proveedor, $id_usuario, $nombre, $tipo)
    {

        if($nombre == "todos"){
            $nombre = "";
        }

        $comics = [];
        $articulos = [];
        // $pedidos = [];

        if($tipo == "comics"){
            $comics = DB::table('comics')->where('nombre_comic', 'like', '%' . $nombre . '%')->get();
        } else if($tipo == "articulos"){
            $articulos = DB::table('articulos')->where('nombre_articulo', 'like', '%' . $nombre . '%')->get();
        }

        $usuarioId = DB::table('usuarios')->select(['nombre_usuario', 'apellido_p', 'apellido_m'])->where('id_usuario', $id_usuario)->get();

        $consultas = DB::table('carrito_pedidos')->where('id_usuario', $id_usuario)->where('id_proveedor', $id_proveedor)->get();
        
        if($nombre == ""){
            $nombre = "todos";
        }

        return view('pedidos', compact(['id_proveedor','id_usuario','usuarioId','comics','articulos','nombre','tipo','consultas']));
    }

    public function buscar(ValidadorPedidos $request, $id_proveedor, $id_usuario){
        $nombre = $request->input('txtNombre');
        $tipo = $request->input('txtTipo');

        if($nombre == ""){
            $nombre = "todos";
        }

        return redirect()->route('pedido.create', [$id_proveedor, $id_usuario,$nombre,$tipo]);
    }

    public function agregar(Request $request, $id_proveedor, $id_usuario, $nombre, $tipo){
        $nombre_articulo = $request->input('txtNombre');
        $cantidad = $request->input('txtCantidad');
        $precio = $request->input('txtPrecio');
        
        $consultas = DB::table('carrito_pedidos')->where('id_usuario', $id_usuario)->where('id_proveedor', $id_proveedor)->where('nombre', $nombre_articulo)->get();

        if(count($consultas) == 0){
            DB::table('carrito_pedidos')->insert([
                'id_usuario' => $id_usuario,
                'id_proveedor' => $id_proveedor,
                'nombre' => $nombre_articulo,
                'cantidad' => $cantidad,
                'precio' => $precio * $cantidad,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);

            return redirect()->route('pedido.create', [$id_proveedor, $id_usuario, $nombre, $tipo])->with('agregado','x');
        } else {
            return redirect()->route('pedido.create', [$id_proveedor, $id_usuario,$nombre,$tipo])->with('excedido','x');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_proveedor, $id_usuario, $nombre, $tipo)
    {
        $consultas = DB::table('carrito_pedidos')->where('id_usuario', $id_usuario)->where('id_proveedor', $id_proveedor)->get();
        
        $cantidad = 0;

        if(count($consultas) > 0){
            foreach($consultas as $consulta){
               $cantidad += $consulta->cantidad; 
            }

            DB::table('pedidos')->insert([
                'id_proveedor' => $id_proveedor,
                'tipo_surtido' => 'Vamos hermano',
                'cantidad' => $cantidad,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $correo = new SolicitudPedidos($id_proveedor, $consultas);
    
            Mail::to('brian.yunuel.soto.sanchez@gmail.com')->send($correo);   
            
            DB::table('carrito_pedidos')->where('id_usuario', $id_usuario)->where('id_proveedor', $id_proveedor)->delete();

            return redirect()->route('pedido.create', [$id_proveedor, $id_usuario,$nombre,$tipo])->with('generado','x');
        } else {
            return redirect()->route('pedido.create', [$id_proveedor, $id_usuario,$nombre,$tipo])->with('sin_generar','x');
        }
    }

    public function solicitudPedido(){

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
    public function destroy($id_proveedor, $id_usuario, $nombre, $tipo, $id_carrito_pedido)
    {
        DB::table('carrito_pedidos')->where('id_carrito_pedido', $id_carrito_pedido)->delete();

        return redirect()->route('pedido.create', [$id_proveedor, $id_usuario,$nombre,$tipo])->with('eliminado','x');
    }
}
