<!doctype html>
<html lang="en">

<head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(public_path('estilos/estilos.css')); ?>" type="text/css">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h5 class=" font-weight-bold">Reporte de articulos existentes</h5>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precio de compra</th>
                    <th>Precio de venta</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consulta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($consulta->id_articulo); ?></td>
                    <td><?php echo e($consulta->tipo); ?></td>
                    <td><?php echo e($consulta->marca); ?></td>
                    <td><?php echo e($consulta->descripcion); ?></td>
                    <td><?php echo e($consulta->cantidad_articulos); ?></td>
                    <td><?php echo e($consulta->precio_compra); ?></td>
                    <td><?php echo e($consulta->precio_venta); ?></td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php /**PATH C:\laragon\www\Weirdocomicshd\resources\views/pdf.blade.php ENDPATH**/ ?>