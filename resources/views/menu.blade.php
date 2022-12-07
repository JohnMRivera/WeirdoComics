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

<div class="cont-menu">
    <h1 class="titulo-menu"><strong>WeirdoComics</strong></h1>
    <picture class="cont-img-menu">
        {{-- <img src="/img/Menu.jpeg" alt=""> --}}
    </picture>
    <div class="cont-text-menu">
        <h2 class="text"><strong>Bienvenido a WeirdoComics</strong></h2>
        <h3 class="text">Somos una empresa formada por un grupo de jovenes</h3>
        <h3 class="text">Nos dedicamos a crear software para la administracion</h3>
        <h3 class="text">de negocios grandes y pequeños</h3>
    </div>
</div>
@endsection