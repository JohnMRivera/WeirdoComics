<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilos.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
