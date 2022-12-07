@extends('layouts.plantilla')

@section('titulo_documento', 'Registro de articulos')

@section('contenido')

@if(session()->has('registrado'))

    <script>
        Swal.fire(
            'Registro Exitoso!',
            'Articulo registrado con exito!',
            'success'
        )
    </script>

@elseif(session()->has('agregar_articulo'))

    {!!
        "<script> Swal.fire({
            icon: 'success',
            title: 'Articulo " . session()->get("agregar") . " se a guardado exitosamente',
            showConfirmButton: false,
            timer: 2000
        }) </script>"
    !!}

@endif

  <main class="main-articulos">
    <form class="form-articulos" action=" {{ route('articulo.store') }} " method="post">
        @csrf
        <header class="header-comics">
            <h1>Nuevo Articulo</h1>
        </header>
        <div class="datos-articulos__scroll">
            <div class="datos-articulos">
                {{-- <div>
                    <div class="input">
                        <input name="txtNombreArticulo" type="text" value="{{ old('txtNombreArticulo') }}" placeholder="Nombre">
                        <label for="">Nombre</label>
                    </div>
                </div>
                @if($errors->first('txtNombreArticulo'))
                    <div class="alert">
                        <p> {{ $errors->first('txtNombreArticulo') }} </p>
                    </div>
                @endif --}}
                <div>
                    <div class="input">
                        <input name="txtTipoArticulo" type="text" value="{{ old('txtTipoArticulo') }}" placeholder="Tipo">
                        <label for="">Tipo</label>
                    </div>
                </div>
                @if($errors->first('txtTipoArticulo'))
                    <div class="alert">
                        <p> {{ $errors->first('txtTipoArticulo') }} </p>
                    </div>
                @endif
                <div>
                    <div class="input">
                        <input name="txtMarcaArticulo" type="text" value="{{ old('txtMarcaArticulo') }}"  placeholder="Marca">
                        <label for="">Marca</label>
                    </div>
                </div>
                @if($errors->first('txtMarcaArticulo'))
                    <div class="alert">
                        <p> {{ $errors->first('txtMarcaArticulo') }} </p>
                    </div>
                @endif
                <div>
                    <div class="input">
                        <input name="txtDescripcionArticulo" type="text" value="{{ old('txtDescripcionArticulo') }}" placeholder="Descripcion">
                        <label for="">Descripcion</label>
                    </div>
                </div>
                @if($errors->first('txtDescripcionArticulo'))
                    <div class="alert">
                        <p> {{ $errors->first('txtDescripcionArticulo') }} </p>
                    </div>
                @endif
                <div>
                    <div class="input">
                        <input name="txtCantidadArticulo" type="text" value="{{ old('txtCantidadArticulo') }}" placeholder="Cantidad">
                        <label for="">Cantidad</label>
                    </div>
                </div>
                @if($errors->first('txtCantidadArticulo'))
                    <div class="alert">
                        <p> {{ $errors->first('txtCantidadArticulo') }} </p>
                    </div>
                @endif
                {{-- <div>
                    <div class="input">
                        <input name="txtFechaArticulo" type="date" value="{{ old('txtFechaArticulo') }}" placeholder="Fecha">
                        <label for="">Fecha</label>
                    </div>
                </div>
                @if($errors->first('txtFechaArticulo'))
                    <div class="alert">
                        <p> {{ $errors->first('txtFechaArticulo') }} </p>
                    </div>
                @endif --}}
                <div>
                    <div class="input">
                        <input name="txtPrecioCompraArticulo" type="text" value="{{ old('txtPrecioCompraArticulo') }}" placeholder="Precio Compra">
                        <label for="">Precio Compra</label>
                    </div>
                </div>
                @if($errors->first('txtPrecioCompraArticulo'))
                    <div class="alert">
                        <p> {{ $errors->first('txtPrecioCompraArticulo') }} </p>
                    </div>
                @endif
                {{-- <div>
                    <div class="input">
                        <input name="txtPrecioVentaArticulo" type="text" value="{{ old('txtPrecioVentaArticulo') }}" placeholder="Precio Venta">
                        <label for="">Precio Venta</label>
                    </div>
                </div>
                @if($errors->first('txtPrecioVentaArticulo'))
                    <div class="alert">
                        <p> {{ $errors->first('txtPrecioVentaArticulo') }} </p>
                    </div>
                @endif --}}
            </div>
        </div>
        <div class="btn-comics">
            <button>
                ¡Agregar!
            </button>
        </div>
    </form>
    <div class="contenido-articulos__scroll">
        <div class="contenido-articulos">
            {{-- <div class="contenido-articulos__seccion"> --}}
                @for($i = 1; $i <= 7; $i++)
                    @for($j = 1; $j <= 2; $j++)
                    <div class="c-a__seccion-carta">
                        <div class="c-a__seccion-carta__img">
                            <img src="img/cell.jpeg" alt="">
                        </div>
                        <div class="c-a__seccion-carta__contenido">
                            <div class="c-a__s-c__contenido-datos">
                                <label for="">Nombre Articulo</label>
                                <label for="">Cantidad</label>
                            </div>
                            <div class="c-a__s-c__contenido-op">
                                <a href="">
                                    <img src="img/eliminar.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="c-a__seccion-carta">
                        <div class="c-a__seccion-carta__img">
                            <img src="img/DocStrange.jpeg" alt="">
                        </div>
                        <div class="c-a__seccion-carta__contenido">
                            <div class="c-a__s-c__contenido-datos">
                                <label for="">Nombre Articulo</label>
                                <label for="">Cantidad</label>
                            </div>
                            <div class="c-a__s-c__contenido-op">
                                <a href="">
                                    <img src="img/eliminar.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endfor
            {{-- </div> --}}
        </div>
    </div>
  </main>

@stop



