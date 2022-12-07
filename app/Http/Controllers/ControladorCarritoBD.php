<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ControladorCarritoBD extends Controller
{
    function ingresarComic(Request $request, $id_usuario, $id_comic, $cantidadDisponible){
        $nombre = $request->input('txtNombreArticulo');
        $tipo = $request->input('txtTipo');
        
        if($nombre == ""){
            $nombre = "todos";
        }

        $consultas = DB::table('carrito')->select(['cantidad'])->where('id_articulo', $id_comic)->where('id_usuario', $id_usuario)->where('tipo','comics')->get();
        
        if($cantidadDisponible == 0){
            return redirect()->route('tienda.index', [$id_usuario, $nombre, $tipo])->with('no_disponible','x');
        } else if(count($consultas) == 0){
            DB::table('carrito')->insert([
                'id_usuario' => $id_usuario,
                'id_articulo' => $id_comic,
                'tipo' => 'comics',
                'cantidad' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            
            return redirect()->route('tienda.index', [$id_usuario, $nombre, $tipo])->with('añadido', 1)->with('cantidad', $cantidadDisponible);
        } else {
            foreach($consultas as $consulta){
                // echo $consulta->cantidad;
                if($consulta->cantidad < $cantidadDisponible){
    
                    DB::table('carrito')->where('id_articulo', $id_comic)->where('id_usuario', $id_usuario)->where('tipo','comics')->update([
                        // 'id_usuario' => $id_usuario,
                        // 'id_articulo' => $id_comic,
                        // 'tipo' => 'comics',
                        'cantidad' => $consulta->cantidad + 1,
                        // 'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                    // 'tienda', compact('comics','articulos','nombre','tipo','id_usuario')
                    return redirect()->route('tienda.index', [$id_usuario, $nombre, $tipo])->with('añadido', $consulta->cantidad + 1)->with('cantidad', $cantidadDisponible);
                } else {
                    return redirect()->route('tienda.index', [$id_usuario, $nombre, $tipo])->with('excedido','x');
                }
            }
        }

    }

    function ingresarArticulo(Request $request, $id_usuario, $id_articulo, $cantidadDisponible){
        $nombre = $request->input('txtNombreArticulo');
        $tipo = $request->input('txtTipoBusqueda');
        // $id_usuario = $request->input('txtIdUsuario');
        // $id_comic = $request->input('txtIdComic');
        // $tipo = $request->input('txtTipo');
        // $cantidad = $request->input('txtCantidad');

        if($nombre == ""){
            $nombre = "todos";
        }

        $consultas = DB::table('carrito')->select(['cantidad'])->where('id_articulo', $id_articulo)->where('id_usuario', $id_usuario)->where('tipo','articulos')->get();
        
        if($cantidadDisponible == 0){
            return redirect()->route('tienda.index', [$id_usuario, $nombre, $tipo])->with('no_disponible','x');
        } else if(count($consultas) == 0){
            DB::table('carrito')->insert([
                'id_usuario' => $id_usuario,
                'id_articulo' => $id_articulo,
                'tipo' => 'articulos',
                'cantidad' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->route('tienda.index', [$id_usuario, $nombre, $tipo])->with('añadido', 1)->with('cantidad', $cantidadDisponible);
        } else {
            foreach($consultas as $consulta){
                // echo $consulta->cantidad;
                if($consulta->cantidad < $cantidadDisponible){
    
                    // echo $consulta->cantidad;
                    // echo $cantidadDisponible;
                    // echo $id_articulo;

                    DB::table('carrito')->where('id_articulo', $id_articulo)->where('id_usuario', $id_usuario)->where('tipo','articulos')->update([
                        // 'id_usuario' => $id_usuario,
                        // 'id_articulo' => $id_articulo,
                        // 'tipo' => 'comics',
                        'cantidad' => $consulta->cantidad + 1,
                        // 'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                    // 'tienda', compact('comics','articulos','nombre','tipo','id_usuario')
                    return redirect()->route('tienda.index', [$id_usuario, $nombre, $tipo])->with('añadido', $consulta->cantidad + 1)->with('cantidad', $cantidadDisponible);
                } else {
                    return redirect()->route('tienda.index', [$id_usuario, $nombre, $tipo])->with('excedido','x');
                }
            }
        }
    }

    public function index($id_usuario){
        $consultas = DB::table('carrito')->where('id_usuario', $id_usuario)->get();

        return view('carrito', compact('consultas','id_usuario'));
    }

    public function create($id_usuario){
        $consultas = DB::table('carrito')->where('id_usuario', $id_usuario)->get();

        if(count($consultas) > 0){
            $total = 0;
            $cantidad = 0;
            $nombre_usuario = "";

            foreach($consultas as $consulta){

                $cantidad += $consulta->cantidad;

                if($consulta->tipo == 'comics'){

                    $comics = DB::table('comics')->where('id_comic', $consulta->id_articulo)->get();

                    foreach($comics as $comic){
                        $total += $comic->precio_venta * $consulta->cantidad;
                        
                        DB::table('comics')->where('id_comic', $consulta->id_articulo)->update([
                            'cantidad_comics' => ($comic->cantidad_comics - $consulta->cantidad)
                        ]);
                    }

                } else if($consulta->tipo == 'articulos'){

                    $articulos = DB::table('articulos')->where('id_articulo', $consulta->id_articulo)->get();

                    foreach($articulos as $articulo){
                        $total += $articulo->precio_venta * $consulta->cantidad;

                        DB::table('articulos')->where('id_articulo', $consulta->id_articulo)->update([
                            'cantidad_articulos' => $articulo->cantidad_articulos - $consulta->cantidad
                        ]);
                    }

                }

            }

            $usuarioId = DB::table('usuarios')->where('id_usuario', $id_usuario)->get();

            foreach($usuarioId AS $usuario){
                $nombre = $usuario->nombre_usuario;
            }

            DB::table('ventas_mostrador')->insert([
                'id_usuario' => $id_usuario,
                'total' => $total,
                'cantidad' => $cantidad,
                'nombre_usuario' => $nombre,
                'fecha' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            DB::table('carrito')->where('id_usuario', $id_usuario)->delete();

            return redirect()->route('carrito.index', $id_usuario)->with('vendido','x');
        } else {
            return redirect()->route('carrito.index', $id_usuario)->with('sin_vender','x');
        }
    }
}
