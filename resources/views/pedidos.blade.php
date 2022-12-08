@extends('layouts.plantilla')

@section('diseño')
<link rel="stylesheet" href="estilos/estilos.css">
@endsection

@section('contenido')

@if(session()->has('generado'))

    <script>
        Swal.fire(
            'Pedido Generado!',
            'El pedido de ha generado exitosamente!',
            'success'
        )
    </script>

@elseif(session()->has('sin_generar'))

    <script>
        Swal.fire(
            'No hay Articulos!',
            'No se han agregado articulos al pedido!',
            'error'
        )
    </script>

@elseif(session()->has('agregado'))

    <script>
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Se ha agregado el articulo',
          showConfirmButton: false,
          timer: 1500
        })
    </script>

@elseif(session()->has('excedido'))

<script>
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'Ya has agregado el articulo',
      showConfirmButton: false,
      timer: 1500
    })
</script>

@elseif(session()->has('eliminado'))

<script>
    Swal.fire(
        'Eliminado!',
        'El articulo ha sido eliminado!',
        'success'
    )
</script>

@elseif(session()->has('generar_pedido'))

    <script>
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Estas seguro?',
        //   text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, Generar Pedido!',
          cancelButtonText: 'No, cancelar!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
              'Generado!',
              'Tu pedido ha sido genrado.',
              'success'
            )
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Cancelado',
              'El pedido ha sido cancelado :)',
              'error'
            )
          }
        })
    </script>

@endif

    <main class="main-pedidos">
        <div class="form-pedidos">
            <div>
                @csrf
                <header class="header-pedidos">
                    <form action="{{ route('articulo.buscar', [$id_proveedor, $id_usuario]) }}" method="post">
                        @csrf
                        <div class="header-pedidos__titulo">
                            <h1>Ingresar Articulos</h1>
                        </div>
                        <div class="header-pedidos__buscador">
                            <input name="txtNombre" type="text" placeholder="Ingrese_nombre" value="{{$nombre == "todos" ? "" : $nombre}}">
                        </div>
                        @if($errors->first('txtNombre'))
                        <div class="alert">
                            <p> {{ $errors->first('txtNombre') }} </p>
                        </div>
                        @endif
                        <div class="header-pedidos__buscador">
                            <select name="txtTipo" id="">
                                <option value="vacio" disabled
                                @if($tipo == "vacio")
                                    selected=""
                                @endif
                                >Tipo</option>
                                <option value="comics" 
                                @if($tipo == "comics")
                                    selected=""
                                @endif
                                >Comics</option>
                                <option value="articulos"
                                @if($tipo == "articulos")
                                    selected=""
                                @endif
                                >Articulos</option>
                            </select>
                        </div>
                        <div class="header-pedidos__btn">
                            <input type="submit" value="Buscar">
                        </div>
                    </form>
                    <div class="pedidos-proveedores">
                        <table class="pedidos-tabla">
                            <thead>
                                <tr>
                                    <th>Nombre 
                                        @if($tipo == 'comics')
                                            Comics
                                        @elseif($tipo == 'articulos')
                                            Articulos
                                        @endif
                                    </th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Agregar</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($comics as $comic)
                                    <form action="{{ route('pedido.agregar', [$id_proveedor, $id_usuario, $nombre, $tipo]) }}" method="post">
                                        @csrf
                                    <tr>
                                        <td>
                                            <input name="txtNombre" type="hidden" value="{{$comic->nombre_comic}}">
                                            {{$comic->nombre_comic}}
                                        </td>
                                        <td>
                                            <input name="txtCantidad" type="hidden" value="{{$comic->cantidad_comics}}">
                                            {{$comic->cantidad_comics}}
                                        </td>
                                        <td>
                                            <input name="txtPrecio" type="hidden" value="{{$comic->precio_compra}}">
                                            ${{$comic->precio_compra * $comic->cantidad_comics}}
                                        </td>
                                        <td class="columna-btn__agregar">
                                            <button>
                                                <img src="/img/agregar.png" alt="">
                                            </button>
                                        </td>
                                    </tr>
                                    </form>
                                    @endforeach
                                    @foreach($articulos as $articulo)
                                    <form action="{{ route('pedido.agregar', [$id_proveedor, $id_usuario, $nombre, $tipo]) }}" method="post">
                                        @csrf
                                    <tr>
                                        <td>
                                            <input name="txtNombre" type="hidden" value="{{$articulo->nombre_articulo}}">
                                            {{$articulo->nombre_articulo}}
                                        </td>
                                        <td>
                                            <input name="txtCantidad" type="hidden" value="{{$articulo->cantidad_articulos}}">
                                            {{$articulo->cantidad_articulos}}
                                        </td>
                                        <td>
                                            <input name="txtPrecio" type="hidden" value="{{$articulo->precio_compra}}">
                                            ${{$articulo->precio_compra * $articulo->cantidad_articulos}}
                                        </td>
                                        <td class="columna-btn__agregar">
                                            <button>
                                                <img src="/img/agregar.png" alt="">
                                            </button>
                                        </td>
                                    </tr>
                                    </form>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </header>
            </div>
            <div class="contenido-pedidos">
                <header class="contenido-pedidos__header">
                    <div class="c-p__header-foto">
                        <img src="/img/siu.png" alt="">
                    </div>
                    <div class="c-p__header-datos">
                        @foreach($usuarioId as $usuario)
                        <label for="">Vendedor: {{$usuario->nombre_usuario}} {{$usuario->apellido_p}} {{$usuario->apellido_m}}</label>
                        <label for="">Fecha</label>
                        <label for="">ID_venta</label>
                        @endforeach
                    </div>
                </header>
                <div class="c-p__articulos-header">
                    <div>
                        <label for="">Nombre Comic</label>
                    </div>
                    <div>
                        <label for="">Cantidad</label>
                    </div>
                    <div>
                        <label for="">Precio</label>    
                    </div>
                </div>
                    <div class="contenido-pedidos__scroll">
                        @foreach($consultas as $consulta)
                        <div class="contenido-pedidos__articulos">
                            <div class="c-p__articulos-datos">
                                <div>
                                    <label for="">{{ $consulta->nombre }}</label>
                                </div>
                                <div>
                                    <label for="">{{ $consulta->cantidad }}</label>
                                </div>
                                <div>
                                    <label for="">${{ $consulta->precio }}</label>
                                </div>
                                <div>
                                    <form action=" {{ route('pedido.destroy', [$id_proveedor, $id_usuario, $nombre, $tipo, $consulta->id_carrito_pedido]) }} " method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"> <img src="/img/eliminar.png" alt=""> </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @for($i = 1; $i <= 0; $i++)
                        <div class="contenido-pedidos__articulos">
                            <div class="c-p__articulos-datos">
                                <div>
                                    <label for="">Nombre</label>
                                </div>
                                <div>
                                    <label for="">5</label>
                                </div>
                                <div>
                                    <label for="">$400</label>
                                </div>
                                <div>
                                    <form action=" {{ route('pedido.destroy', [$id_proveedor, $id_usuario, $nombre, $tipo, $consulta->id_carrito_pedido]) }} " method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"> <img src="/img/eliminar.png" alt=""> </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                
                <footer class="contenido-pedidos__footer">
                    <div class="c-p__footer-total">
                        <label for="">Total:</label>
                        <?php
                        $total = 0;
                        ?>
                        @foreach($consultas as $consulta)
                        <?php
                        $total += $consulta->precio;
                        ?>
                        @endforeach
                        <label for="">${{$total}}</label>
                    </div>
                    <form class="c-p__footer-generar" action=" {{ route('pedido.store', [$id_proveedor, $id_usuario, $nombre, $tipo]) }} " method="post">
                        @csrf
                            <button> <a>Generar Pedido</a> </button>
                    </form>
                </footer>
            </div>
        </div>
        <div class="fondo-pedidos"></div>
    </main>
@endsection