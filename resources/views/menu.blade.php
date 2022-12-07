@extends('layouts.plantilla')

@section('titulo_documento', 'Inicio')

@section('contenido')

@if(session()->has('ingresado'))

    {!!
    "<script>
        Swal.fire({
          title: '¡Bienvenido!',
          text: '" . session()->get('logeo_confirmado') . "',
          imageUrl: 'https://unsplash.it/400/200',
          imageWidth: 400,
          imageHeight: 200,
          imageAlt: 'Custom image',
        })
    </script>"
    !!}

@endif

<main class="main-menu">
    <div class="bienvenida-menu">
        <div class="bienvenida-img">
            {{-- <img src="/img/fondo5.jpeg" alt=""> --}}
        </div>
        <h1 class="menu-titulo">Bienvenido a WeirdoComics</h1>
    </div>
    <div class="menu-contenido">
        <div class="menu-descripcion">
            <h3 class="text">Somos una empresa formada por un grupo de jovenes</h3>
        <h3 class="text">Nos dedicamos a crear software para la administracion</h3>
        <h3 class="text">de negocios grandes y pequeños</h3>
        </div>
        <div class="menu-recomendados">
            @foreach($comics as $comic)

                {{-- {{
                    $contador = 0;
                }} --}}

                    <div class="menu-recomendados__articulo">
                        <div class="m-r__articulo-img">
                            <img src="img/spiderman.jpeg" alt="">
                        </div>
                        <div class="m-r__articulo-datos">
                            <label for="">Nombre: {{ $comic->nombre_comic }}</label>
                            <label for="">Compañia: {{ $comic->compañia }}</label>
                        </div>
                    </div>

            @endforeach
        </div>
    </div>
</main>
@endsection