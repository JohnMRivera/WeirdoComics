@extends('layouts.plantilla')

@section('titulo_documento', 'Registro de articulos')

@section('diseño')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilos-b.css">
@endsection

@section('contenido')

@if(session()->has('agregar'))
{!! "<script> Swal.fire({
    icon: 'success',
    title: 'Articulo " . session()->get("agregar") . " se a guardado exitosamente',
    showConfirmButton: false,
    timer: 2000
  }) </script>"!!}
@endif

<form action="{{route('addArti')}}" method="POST" class="form-articulos">
    @csrf
    <div class="cont-form color-form">
        <div class="titulo-arti">
            <h2>Articulo</h2>
        </div>
        <div>
            <div class="form-floating mb-3 inputs-articulos">
                <input name="fecha-arti" value="{{old('fecha-arti')}}" type="date" class="form-control" id="floatingInput" placeholder="10/12/2022">
                <label for="floatingInput">Fecha</label>
            </div>
            <p class="text-danger fst-italic p">{{$errors -> first('fecha-arti')}}</p>

            <div class="form-floating mb-3 inputs-articulos">
                <input name="id-arti" value="{{old('id-arti')}}" type="text" class="form-control" id="floatingInput" placeholder="1254685">
                <label for="floatingInput">id de articulo</label>
            </div>
            <p class="text-danger fst-italic p">{{$errors -> first('id-arti')}}</p>

            <div class="form-floating mb-3 inputs-articulos">
                <input name="nombre-arti" value="{{old('nombre-arti')}}" type="text" class="form-control" id="floatingInput" placeholder="Spider-Man">
                <label for="floatingInput">Nombre</label>
            </div>
            <p class="text-danger fst-italic p">{{$errors -> first('nombre-arti')}}</p>

            <div class="form-floating mb-3 inputs-articulos">
                <input name="compañia-arti" value="{{old('compañia-arti')}}" type="text" class="form-control" id="floatingInput" placeholder="Marvel">
                <label for="floatingInput">Compañia</label>
            </div>
            <p class="text-danger fst-italic p">{{$errors -> first('compañia-arti')}}</p>

            <div class="form-floating mb-3 inputs-articulos">
                <input name="precio-compra-arti" value="{{old('precio-compra-arti')}}" type="text" class="form-control" id="floatingInput" placeholder="12">
                <label for="floatingInput">Precio de compra</label>
            </div>
            <p class="text-danger fst-italic p">{{$errors -> first('precio-compra-arti')}}</p>

            <fieldset disabled>
                <div class="form-floating mb-3 inputs-articulos">
                    <input name="precio-venta-arti" value="{{old('precio-venta-arti')}}" type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                    <label for="floatingInput">Precio de venta</label>
                </div>
            </fieldset>
            <p class="text-danger fst-italic p">{{$errors -> first('precio-venta-arti')}}</p>

        </div>
        <div class="cont-boton-arti">
            <button type="submit" class="btn btn-outline-success boton-arti">Guardar</button>
        </div>
    </div>
    {{-- imagen --}}
    <img src="/img/articulos.jpg" alt="Imagen de articulos">
</form>

@stop



