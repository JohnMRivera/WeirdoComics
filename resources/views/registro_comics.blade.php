@extends('layouts.plantilla')

@section('titulo_documento', 'Registro de comics')

@section('contenido')

@if(session()->has('eliminar_comic'))

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

@endif

{{-- @if(session()->has('agregar'))
{!! "<script> Swal.fire({
    icon: 'success',
    title: 'Comic " . session()->get("agregar") . " se a guardado exitosamente',
    showConfirmButton: false,
    timer: 2000
  }) </script>"!!}
@endif --}}

<main class="main-comics">
    <form class="form-comics" action=" {{ route('agr_com') }} " method="post">
        @csrf
        <header class="header-comics">
            <h1>Nuevo Comic</h1>
        </header>
        <div class="datos-comics__scroll">
            <div class="datos-comics">
                <div>
                    <div class="input">
                        <input name="txtIdComic" type="text" value="{{ old('txtIdComic') }}">
                        <label for="">Id</label>
                    </div>
                </div>
                @if($errors->first('txtIdComic'))
                    <div class="alert">
                        <p> {{ $errors->first('txtIdComic') }} </p>
                    </div>
                @endif
                <div>
                    <div class="input">
                        <input name="txtNombreComic" type="text" value="{{ old('txtNombreComic') }}">
                        <label for="">Nombre</label>
                    </div>
                </div>
                @if($errors->first('txtNombreComic'))
                    <div class="alert">
                        <p> {{ $errors->first('txtNombreComic') }} </p>
                    </div>
                @endif
                <div>
                    <div class="input">
                        <input name="txtCompañiaComic" type="text" value="{{ old('txtCompañiaComic') }}">
                        <label for="">Compañia</label>
                    </div>
                </div>
                @if($errors->first('txtCompañiaComic'))
                    <div class="alert">
                        <p> {{ $errors->first('txtCompañiaComic') }} </p>
                    </div>
                @endif
                <div>
                    <div class="input">
                        <input name="txtCantidadComic" type="text" value="{{ old('txtCantidadComic') }}">
                        <label for="">Cantidad</label>
                    </div>
                </div>
                @if($errors->first('txtCantidadComic'))
                    <div class="alert">
                        <p> {{ $errors->first('txtCantidadComic') }} </p>
                    </div>
                @endif
                <div>
                    <div class="input">
                        <input name="txtFechaComic" type="date" value="{{ old('txtFechaComic') }}">
                        <label for="">Fecha</label>
                    </div>
                </div>
                @if($errors->first('txtFechaComic'))
                    <div class="alert">
                        <p> {{ $errors->first('txtFechaComic') }} </p>
                    </div>
                @endif
                <div>
                    <div class="input">
                        <input name="txtPrecioCompraComic" type="text" value="{{ old('txtPrecioCompraComic') }}">
                        <label for="">Precio Compra</label>
                    </div>
                </div>
                @if($errors->first('txtPrecioCompraComic'))
                    <div class="alert">
                        <p> {{ $errors->first('txtPrecioCompraComic') }} </p>
                    </div>
                @endif
                <div>
                    <div class="input">
                        <input name="txtPrecioVentaComic" type="text" value="{{ old('txtPrecioVentaComic') }}">
                        <label for="">Precio Venta</label>
                    </div>
                </div>
                @if($errors->first('txtPrecioVentaComic'))
                    <div class="alert">
                        <p> {{ $errors->first('txtPrecioVentaComic') }} </p>
                    </div>
                @endif
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
            @for($i = 1; $i <= 7; $i++)
            <div class="contenido-comics__seccion">
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
            </div>
            @endfor
        </div>
    </div>
</main>

@endsection