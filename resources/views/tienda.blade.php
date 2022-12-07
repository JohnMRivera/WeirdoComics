@extends('layouts.plantilla')

@section('titulo_documento', 'Tienda')

@section('contenido')

{{-- @include('layouts.plantilla') --}}

@if(session()->has('añadido'))

    {!! 
        "<script> Swal.fire({
            icon: 'success',
            title: 'Articulo añadido, cantidad " . session()->get("añadido") . " de " . session()->get("cantidad") . "',
            showConfirmButton: false,
            timer: 2000
        }) </script>"
    !!}

@elseif(session()->has('excedido'))

    <script>
        Swal.fire(
            'Cantidad Excedida!',
            'La cantidad de articulos añadida a alcanzado el limite!',
            'error'
        )
    </script>

@elseif(session()->has('no_disponible'))

    <script>
        Swal.fire(
            'No disponible',
            'El articulo no se encuentra en existencia!',
            'error'
        )
    </script>

@endif

<main class="main-tienda">
    <form class="form-tienda" action="{{ route('tienda.create', [$id_usuario]) }}" method="post">
        @csrf
        <header class="header-tienda">
            <h1>Buscar Articulo</h1>
        </header>
        <div class="datos-tienda__scroll">
            <div class="datos-tienda">
                <div>
                    <div class="input-reg_pro">
                        <input name="txtNombreArticulo" type="text" value="{{ $nombre == "todos" ? '' : $nombre; }}" placeholder="Nombre">
                        <label for="">Nombre</label>
                    </div>
                </div>
                @if($errors->first('txtNombreArticulo'))
                    <div class="alert">
                        <p> {{ $errors->first('txtNombreArticulo') }} </p>
                    </div>
                @endif
                <div>
                    <div class="input-reg_pro">
                        {{-- <input type="text"> --}}
                        <select name="txtTipo" id="tipo">
                            
                            <option value="todos" disabled>Tipo</option>
                            <option value="todos" 
                            @if($tipo == "todos")
                                selected = ""
                            @endif
                            >Todos</option>
                            <option value="comics"
                            @if($tipo == "comics")
                                selected = ""
                            @endif
                            >Comics</option>
                            <option value="articulos"
                            @if($tipo == "articulos")
                                selected = ""
                            @endif
                            >Articulos</option>
                        </select>
                        <label for="tipo">Tipo</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-comics">
            <button name="btnBuscar" type="submit">
                ¡Buscar!
            </button>
            @if(isset($_POST['btnBuscar']))
                @if($nombre == "")
                    {{$nombre = "todos"}}
                @endif
            @endif
        </div>
    </form>
    <div class="contenido-tienda__scroll">
        <div class="contenido-tienda">
            {{-- <div class="contenido-tienda__seccion"> --}}
                @foreach($comics as $comic)
                <form class="c-c__seccion-carta" action="{{route('tienda.comic', [$id_usuario, $comic->id_comic, $comic->cantidad_comics])}}" method="post">
                    @csrf
                    <input type="hidden" name="txtNombreArticulo" value="{{$nombre}}">
                    <input type="hidden" name="txtTipo" value="{{$tipo}}">
                    {{-- <input type="hidden" name="txtIdUsuario" value="{{$id_usuario}}"> --}}
                    {{-- <input type="hidden" name="txtIdComic" value="{{$comic->id_comic}}"> --}}
                    {{-- <input type="hidden" name="txtTipo" value="comics"> --}}
                    {{-- <input type="hidden" name="txtCantidad" value={{$comic->cantidad_comics}}> --}}
                    <div class="c-c__seccion-carta__img">
                        <img src="/img/spiderman.jpeg" alt="">
                    </div>
                    <div class="c-c__seccion-carta__contenido">
                        <div class="c-c__s-c__contenido-datos">
                            <label for="">Nombre: {{$comic->nombre_comic}}</label>
                            <label style="{{$comic->cantidad_comics == 0 ? 'color: red; font-weight: bold' : ''}}" for="">Cantidad: {{$comic->cantidad_comics}}</label>
                        </div>
                        <div>
                            <button>
                                <p>Añadir</p>
                            </button>
                        </div>
                        {{-- <div class="c-c__s-c__contenido-op">
                            <a href=" {{ route('eli_com') }} ">
                                <img src="img/eliminar.png" alt="">
                            </a>
                        </div> --}}
                    </div>
                </form>
                @endforeach
                @foreach($articulos as $articulo)

                <form class="c-t__seccion-carta" action="{{route('tienda.articulo', [$id_usuario, $articulo->id_articulo, $articulo->cantidad_articulos])}}" method="post">
                    @csrf
                    <input type="hidden" name="txtNombreArticulo" value="{{$nombre}}">
                    <input type="hidden" name="txtTipoBusqueda" value="{{$tipo}}">
                    <input type="hidden" name="txtIdUsuario" value="{{$id}}">
                    <input type="hidden" name="txtIdComic" value="{{$articulo->id_articulo}}">
                    {{-- <input type="hidden" name="txtTipo" value="articulos"> --}}
                    <input type="hidden" name="txtCantidad" value={{$articulo->cantidad_articulos}}>
                    <div class="c-t__seccion-carta__img">
                        <img src="/img/cell.jpeg" alt="">
                    </div>
                    <div class="c-t__seccion-carta__contenido">
                        <div class="c-t__s-c__contenido-datos">
                            <label for="">Tipo: {{$articulo->tipo}}</label>
                            <label style="{{$articulo->cantidad_articulos == 0 ? 'color: red; font-weight: bold' : ''}}" for="">Cantidad: {{$articulo->cantidad_articulos}}</label>
                        </div>
                        <div>
                            <button>
                                <p>Añadir</p>
                            </button>
                        </div>
                        {{-- <div class="c-t__s-c__contenido-op">
                            <a href="">
                                <img src="img/eliminar.png" alt="">
                            </a>
                        </div> --}}
                    </div>
                </form>

                @endforeach
                @for($i = 1; $i <= 0; $i++)
                <div class="c-c__seccion-carta">
                    <div class="c-c__seccion-carta__img">
                        <img src="img/spiderman.jpeg" alt="">
                    </div>
                    <div class="c-c__seccion-carta__contenido">
                        <div class="c-c__s-c__contenido-datos">
                            <label for="">Nombre Comic</label>
                            <label for="">Cantidad</label>
                        </div>
                        {{-- <div class="c-c__s-c__contenido-op">
                            <a href=" {{ route('eli_com') }} ">
                                <img src="img/eliminar.png" alt="">
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="c-c__seccion-carta">
                    <div class="c-c__seccion-carta__img">
                        <img src="img/spiderman.jpg" alt="">
                    </div>
                    <div class="c-c__seccion-carta__contenido">
                        <div class="c-c__s-c__contenido-datos">
                            <label for="">Nombre Comic</label>
                            <label for="">Cantidad</label>
                        </div>
                        {{-- <div class="c-c__s-c__contenido-op">
                            <a href=" {{ route('eli_com') }} ">
                                <img src="img/eliminar.png" alt="">
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="c-c__seccion-carta">
                    <div class="c-c__seccion-carta__img">
                        <img src="img/superman.jpeg" alt="">
                    </div>
                    <div class="c-c__seccion-carta__contenido">
                        <div class="c-c__s-c__contenido-datos">
                            <label for="">Nombre Comic</label>
                            <label for="">Cantidad</label>
                        </div>
                        <div class="c-c__s-c__contenido-op">
                            <a href=" {{ route('eli_com') }} ">
                                <img src="img/eliminar.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="c-c__seccion-carta">
                    <div class="c-c__seccion-carta__img">
                        <img src="img/spiderman.jpeg" alt="">
                    </div>
                    <div class="c-c__seccion-carta__contenido">
                        <div class="c-c__s-c__contenido-datos">
                            <label for="">Nombre Comic</label>
                            <label for="">Cantidad</label>
                        </div>
                        {{-- <div class="c-c__s-c__contenido-op">
                            <a href=" {{ route('eli_com') }} ">
                                <img src="img/eliminar.png" alt="">
                            </a>
                        </div> --}}
                    </div>
                </div>
                    @for($j = 1; $j <= 2; $j++)
                    <div class="c-t__seccion-carta">
                        <div class="c-t__seccion-carta__img">
                            <img src="img/cell.jpeg" alt="">
                        </div>
                        <div class="c-t__seccion-carta__contenido">
                            <div class="c-t__s-c__contenido-datos">
                                <label for="">Nombre Articulo</label>
                                <label for="">Cantidad</label>
                            </div>
                            {{-- <div class="c-t__s-c__contenido-op">
                                <a href="">
                                    <img src="img/eliminar.png" alt="">
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="c-t__seccion-carta">
                        <div class="c-t__seccion-carta__img">
                            <img src="img/DocStrange.jpeg" alt="">
                        </div>
                        <div class="c-t__seccion-carta__contenido">
                            <div class="c-t__s-c__contenido-datos">
                                <label for="">Nombre Articulo</label>
                                <label for="">Cantidad</label>
                            </div>
                            {{-- <div class="c-t__s-c__contenido-op">
                                <a href="">
                                    <img src="img/eliminar.png" alt="">
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    @endfor
                @endfor
            {{-- </div> --}}
        </div>
    </div>
    <div class="op-carrito">
        <a href="{{route('carrito.index', $id_usuario)}}">
            <img src="/img/carrito-de-compras.png" alt="">
        </a>
    </div>
</main>
@stop