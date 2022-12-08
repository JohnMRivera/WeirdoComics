@extends('layouts.plantilla')

@section('contenido')

    <main class="main-editar">
        @foreach($comicId as $comic)
        <form action="{{ route('comic.update', $comic->id_comic) }}" method="post">
            @csrf
            @method('put')
            <div class="editar-titulo">
                <h1>Editar Comic</h1>
            </div>
            <div class="editar-inputs">
                <div>
                    <div class="input-reg_pro">
                        <input name="txtNombreComic" type="text" value="{{ $comic->nombre_comic }}" placeholder="Nombre">
                        <label for="">Nombre</label>
                    </div>
                    <div>
                        {{-- <p class="alert">Siiiiiiiuuuuuuuuuu</p> --}}
                    @if($errors->first('txtNombreComic'))
                        <p class="alert2"> {{ $errors->first('txtNombreComic') }} </p>
                    @endif
                    </div>
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtEdicionComic" type="text" value="{{ $comic->edicion }}" placeholder="Edición">
                        <label for="">Edición</label>
                    </div>
                    <div>
                    @if($errors->first('txtEdicionComic'))
                        <p class="alert2"> {{ $errors->first('txtEdicionComic') }} </p>
                    @endif
                    </div>
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtCompañiaComic" type="text" value="{{ $comic->compañia }}" placeholder="Compañia">
                        <label for="">Compañia</label>
                    </div>
                    <div>
                    @if($errors->first('txtCompañiaComic'))
                        <p class="alert2"> {{ $errors->first('txtCompañiaComic') }} </p>
                    @endif
                    </div>
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtCantidadComic" type="text" value="{{ $comic->cantidad_comics }}" placeholder="Cantidad">
                        <label for="">Cantidad</label>
                    </div>
                    <div>
                    @if($errors->first('txtCantidadComic'))
                        <p class="alert2">
                            {{ $errors->first('txtCantidadComic') }}
                        </p>
                    @endif
                    </div>
                </div>
                <div>
                    <div class="input-reg_pro">
                        <input name="txtPrecioCompraComic" type="text" value="{{ $comic->precio_compra }}" placeholder="Precio Compra">
                        <label for="">Precio Compra</label>
                    </div>
                    <div>
                    @if($errors->first('txtPrecioCompraComic'))
                        <p class="alert2"> {{ $errors->first('txtPrecioCompraComic') }} </p>
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