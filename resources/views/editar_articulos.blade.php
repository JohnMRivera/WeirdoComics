@extends('layouts.plantilla')

@section('contenido')

    <main class="main-editar">
        @foreach($articuloId as $articulo)
        <form action="{{ route('articulo.update', $articulo->id_articulo) }}" method="post">
            @csrf
            @method('put')
            <div class="editar-titulo">
                <h1>Editar Articulo</h1>
            </div>
            <div class="editar-inputs">
                <div>
                    <div class="input-reg_pro">
                        <input name="txtNombreArticulo" type="text" value="{{ $articulo->nombre_articulo }}" placeholder="Nombre">
                        <label for="">Nombre</label>
                    </div>
                    <div>
                        @if($errors->first('txtNombreArticulo'))
                            <div class="alert2">
                                <p> {{ $errors->first('txtNombreArticulo') }} </p>
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtTipoArticulo" type="text" value="{{ $articulo->tipo }}" placeholder="Tipo">
                        <label for="">Tipo</label>
                    </div>
                    <div>
                        @if($errors->first('txtTipoArticulo'))
                            <div class="alert2">
                                <p> {{ $errors->first('txtTipoArticulo') }} </p>
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtMarcaArticulo" type="text" value="{{ $articulo->marca }}"  placeholder="Marca">
                        <label for="">Marca</label>
                    </div>
                    <div>
                        @if($errors->first('txtMarcaArticulo'))
                            <div class="alert2">
                                <p> {{ $errors->first('txtMarcaArticulo') }} </p>
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtDescripcionArticulo" type="text" value="{{ $articulo->descripcion }}" placeholder="Descripcion">
                        <label for="">Descripcion</label>
                    </div>
                    <div>
                        @if($errors->first('txtDescripcionArticulo'))
                            <div class="alert2">
                                <p> {{ $errors->first('txtDescripcionArticulo') }} </p>
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtCantidadArticulo" type="text" value="{{ $articulo->cantidad_articulos }}" placeholder="Cantidad">
                        <label for="">Cantidad</label>
                    </div>
                    <div>
                        @if($errors->first('txtCantidadArticulo'))
                            <div class="alert2">
                                <p> {{ $errors->first('txtCantidadArticulo') }} </p>
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtPrecioCompraArticulo" type="text" value="{{ $articulo->precio_compra }}" placeholder="Precio Compra">
                        <label for="">Precio Compra</label>
                    </div>
                    <div>
                        @if($errors->first('txtPrecioCompraArticulo'))
                            <div class="alert2">
                                <p> {{ $errors->first('txtPrecioCompraArticulo') }} </p>
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="in-file">
                        <p class="texto">Añadir imagen</p>
                        <input class="input-file_input" id="img" type="file" name="img">
                    </div>
                    <div>
                    @if($errors->first('img'))
                        <p class="alert2">
                            {{ $errors->first('img') }}
                        </p>
                    @endif
                    </div>
                </div>
            </div>
            <div class="editar-btn">
                <button type="submit">Actualizar</button>
            </div>
        </form>
        @endforeach
    </main>

@endsection