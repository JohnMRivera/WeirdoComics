@extends('layouts.plantilla')

@section('titulo_documento', 'Inicio')

@section('diseño')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="estilos/estilos.css"> --}}
    <link rel="stylesheet" href="estilos/estilos-b.css">
@endsection

@section('contenido')
<div class="cont-menu">
    <h1 class="titulo-menu"><strong>WeirdoComics</strong></h1>
    <picture class="cont-img-menu">
        <img src="/img/Menu.jpeg" alt="">
    </picture>
    <div class="cont-text-menu">
        <h2 class="text"><strong>Bienvenido a WeirdoComics</strong></h2>
        <h3 class="text">Somos una empresa formada por un grupo de jovenes</h3>
        <h3 class="text">Nos dedicamos a crear software para la administracion</h3>
        <h3 class="text">de negocios grandes y pequeños</h3>
    </div>
</div>
@endsection