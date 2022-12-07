@extends('layouts.plantilla')

@section('titulo_documento', 'Registro de comics')

@section('contenido')

@if(session()->has('registrado'))

    <script>
        Swal.fire(
            'Registro Exitoso!',
            'Comic registrado con exito!',
            'success'
        )
    </script>

@elseif(session()->has('eliminar_comic'))

    <script>
        Swal.fire({
          title: '¿Estás seguro?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, eliminarlo!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Eliminado!',
              'El Comic ha sido eliminado.',
              'success'
            )
          }
        })
    </script>

@elseif(session()->has('agregar_comic'))

    {!! "<script> Swal.fire({
        position: 'top-end',
      icon: 'success',
      title: 'Comic " . session()->get("agregar_comic") . " se ha guardado exitosamente',
      showConfirmButton: false,
      timer: 2000
    }) </script>" !!}

@endif

<main class="main-comics">
    <form class="form-comics" action=" {{ route('comic.store') }} " method="post">
        @csrf
        <header class="header-comics">
            <h1>Nuevo Comic</h1>
        </header>
        <div class="datos-comics__scroll">
            <div class="datos-comics">
                <div>
                    <div class="input">
                        <input name="txtNombreComic" type="text" value="{{ old('txtNombreComic') }}" placeholder="Nombre">
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
                    <div class="input">
                        <input name="txtEdicionComic" type="text" value="{{ old('txtEdicionComic') }}" placeholder="Edición">
                        <label for="">Edición</label>
                    </div>
                    <div>
                    @if($errors->first('txtEdicionComic'))
                        <p class="alert2"> {{ $errors->first('txtEdicionComic') }} </p>
                    @endif
                    </div>
                </div>
                <div>
                    <div class="input">
                        <input name="txtCompañiaComic" type="text" value="{{ old('txtCompañiaComic') }}" placeholder="Compañia">
                        <label for="">Compañia</label>
                    </div>
                    <div>
                    @if($errors->first('txtCompañiaComic'))
                        <p class="alert2"> {{ $errors->first('txtCompañiaComic') }} </p>
                    @endif
                    </div>
                </div>
                <div>
                    <div class="input">
                        <input name="txtCantidadComic" type="text" value="{{ old('txtCantidadComic') }}" placeholder="Cantidad">
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
                    <div class="input">
                        <input name="txtPrecioCompraComic" type="text" value="{{ old('txtPrecioCompraComic') }}" placeholder="Precio Compra">
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
                {{-- <div>
                    <div class="input">
                        <input name="txtPrecioVentaComic" type="text" value="{{ old('txtPrecioVentaComic') }}" placeholder="Precio Venta">
                        <label for="">Precio Venta</label>
                    </div>
                </div>
                @if($errors->first('txtPrecioVentaComic'))
                    <p> {{ $errors->first('txtPrecioVentaComic') }} </p>
                @endif --}}
            </div>
        </div>
        <div class="btn-comics">
            <button>
                ¡Agregar!
            </button>
        </div>
    </form>
    <div class="scroll-comics">
        <div class="contenido-comics">
            @foreach($comics as $comic)

            <form class="c-c__seccion-carta" action=" {{ route('comic.destroy', $comic->id_comic) }} " method="post">
                @csrf
                @method('delete')
                <div class="c-c__seccion-carta__img">
                    {{-- <img src="img/spiderman.jpeg" alt=""> --}}
                    {{-- {{ $comic->imagen }} --}}
                    {{ echo "<img src='data:image/jpeg;base64,".base64_encode($comic->imagen)."'>"; }}
                </div>
                <div class="c-c__seccion-carta__contenido">
                    <div class="c-c__s-c__contenido-datos">
                        <label for="">Nombre: {{ $comic->nombre_comic }}</label>
                        <label for="">Cantidad: {{ $comic->cantidad_comics }}</label>
                    </div>
                    <div class="c-c__s-c__contenido-op">
                        <a href=" {{ route('eli_com') }} ">
                            <img src="img/eliminar.png" alt="">
                        </a>
                    </div>
                </div>
            </form>

            @endforeach

            @for($i = 1; $i <= 0; $i++)
            {{-- <div class="contenido-comics__seccion"> --}}
                <div class="c-c__seccion-carta">
                    <div class="c-c__seccion-carta__img">
                        <img src="img/spiderman.jpeg" alt="">
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
                        <img src="img/spiderman.jpg" alt="">
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
                        <div class="c-c__s-c__contenido-op">
                            <a href=" {{ route('eli_com') }} ">
                                <img src="img/eliminar.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
            @endfor
        </div>
    </div>
</main>

@endsection
