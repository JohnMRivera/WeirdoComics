<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos/estilos.css">
    <title>@yield('titulo_documento')</title>
</head>
<body>
    <header class="encabezado">
        <nav class="menu">
            <ol class="menu-ol">
                <li><a href="{{ route('ini') }}">Weirdo Comics</a></li>
            </ol>
            <ul class="menu-ul">
                <li><a href="">Comics</a></li>
                <li><a href="">Articulos</a></li>
                <li><a href="">En Tienda</a></li>
                <li><a href="">Proveedores</a></li>
                <li><a href="">Pedidos</a></li>
            </ul>
        </nav>
    </header>
    <div class="fondo">

    </div>
    @yield('contenido')
</body>
</html>