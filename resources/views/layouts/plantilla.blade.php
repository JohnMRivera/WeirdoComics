<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('diseño')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>@yield('titulo_documento')</title>
</head>
<body>
    <header class="encabezado">
        <nav class="menu">
            <label class="menu-barra" for="check">
                <img src="img/barra-menu.png" alt="">
            </label>
            <input class="menu-input" id="check" type="checkbox">
            <ul class="menu-op">
                <li class="menu-op__titulo"><a href="http://weirdocomics.test">Weirdo Comics</a></li>
                <li class="menu-op__item"><a href=" {{ route('regc') }} ">Comics</a>
                </li>
                <li class="menu-op__item"><a href=" {{ route('rega') }} ">Articulos</a>
                </li>
                <li class="menu-op__item"><a href=" {{ route('shop') }} ">En Tienda</a></li>
                <li class="menu-op__item"><a href="">Proveedores</a>
                    <ul>
                        <li><a href="/proveedores">Consultar</a></li>
                        <li><a href="/registro_Proveedores">Registrar</a></li>
                    </ul>
                </li>
                
                <li class="menu-op__sesion">
                    <a href="">
                        <img src="img/registro-usuario.png" alt="">
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="fondo">

    </div>
    @yield('contenido')

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