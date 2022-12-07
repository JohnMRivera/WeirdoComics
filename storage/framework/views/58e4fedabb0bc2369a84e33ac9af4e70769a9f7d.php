<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos/estilos.css">

    <?php echo $__env->yieldContent('diseño'); ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title><?php echo $__env->yieldContent('titulo_documento'); ?></title>
</head>
<body>
    <header class="encabezado">
        <nav class="menu">
            <label class="menu-barra" for="check">
                <img src="img/barra-menu.png" alt="">
            </label>
            <input class="menu-input" id="check" type="checkbox">
            <ul class="menu-op">
                <li class="menu-op__titulo"><a href=" <?php echo e(route('ini')); ?> ">Weirdo Comics</a></li>
                <li class="menu-op__item"><a href=" <?php echo e(route('comic.create')); ?> ">Comics</a>
                </li>
                <li class="menu-op__item"><a href=" <?php echo e(route('articulo.create')); ?> ">Articulos</a>
                </li>
                <li class="menu-op__item"><a href=" <?php echo e(route('shop')); ?> ">En Tienda</a></li>
                <li class="menu-op__item"><a href="">Proveedores</a>
                    <ul>
                        <li><a href=" <?php echo e(route('proveedor.index')); ?> ">Consultar</a></li>
                        <li><a href=" <?php echo e(route('proveedor.create')); ?> ">Registrar</a></li>
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
    <?php echo $__env->yieldContent('contenido'); ?>

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
</html><?php /**PATH C:\laragon\www\WeirdoComics\resources\views/layouts/plantilla.blade.php ENDPATH**/ ?>