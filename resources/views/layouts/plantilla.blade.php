<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/estilos/estilos.css">

    @yield('diseño')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>@yield('titulo_documento')</title>
</head>
<body>
    <header class="encabezado">
        <nav class="menu">
            <label class="menu-barra" for="check">
                <img src="/img/barra-menu.png" alt="">
            </label>
            <input class="menu-input" id="check" type="checkbox">
            <ul class="menu-op">
                <li class="menu-op__titulo"><a href=" {{ route('ini') }} ">Weirdo Comics</a></li>
                <li class="menu-op__item"><a href=" {{ route('comic.create') }} ">Comics</a>
                </li>
                <li class="menu-op__item"><a href=" {{ route('articulo.create') }} ">Articulos</a>
                </li>
                <li class="menu-op__item"><a href=" {{ route('tienda.index',[$_SESSION['id'],'todos','todos']) }} ">En Tienda</a></li>
                <li class="menu-op__item"><a href="">Proveedores</a>
                    <ul>
                        <li><a href=" {{ route('proveedor.index') }} ">Consultar</a></li>
                        <li><a href=" {{ route('proveedor.create') }} ">Registrar</a></li>
                    </ul>
                </li>
                <li class="menu-op__sesion">
                    <label class="sesion_usuario" for="">
                        {{$_SESSION['nombre']}}
                    </label>
                    <a href="{{route('log')}}">
                        <img src="/img/cerrar-sesion.png" alt="">
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="fondo">

    </div>

    @yield('contenido')

    {{-- @include('tienda',['id' => $_SESSION['id']]) --}}

    <div class="prueba">

    </div>

    <script>
        // alert('Siu')

        const menu = document.querySelector('.menu');

        window.addEventListener('scroll', function(){
            menu.classList.toggle('active', window.scrollY > 0);
        });
    </script>
</body>
</html>