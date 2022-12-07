<?php $__env->startSection('titulo_documento', 'Registro de articulos'); ?>

<?php $__env->startSection('contenido'); ?>

<?php if(session()->has('registrado')): ?>

    <script>
        Swal.fire(
            'Registro Exitoso!',
            'Articulo registrado con exito!',
            'success'
        )
    </script>

<?php elseif(session()->has('agregar_articulo')): ?>

    <?php echo "<script> Swal.fire({
            icon: 'success',
            title: 'Articulo " . session()->get("agregar") . " se a guardado exitosamente',
            showConfirmButton: false,
            timer: 2000
        }) </script>"; ?>


<?php endif; ?>

  <main class="main-articulos">
    <form class="form-articulos" action=" <?php echo e(route('articulo.store')); ?> " method="post">
        <?php echo csrf_field(); ?>
        <header class="header-comics">
            <h1>Nuevo Articulo</h1>
        </header>
        <div class="datos-articulos__scroll">
            <div class="datos-articulos">
                
                <div>
                    <div class="input">
                        <input name="txtTipoArticulo" type="text" value="<?php echo e(old('txtTipoArticulo')); ?>" placeholder="Tipo">
                        <label for="">Tipo</label>
                    </div>
                </div>
                <?php if($errors->first('txtTipoArticulo')): ?>
                    <div class="alert">
                        <p> <?php echo e($errors->first('txtTipoArticulo')); ?> </p>
                    </div>
                <?php endif; ?>
                <div>
                    <div class="input">
                        <input name="txtMarcaArticulo" type="text" value="<?php echo e(old('txtMarcaArticulo')); ?>"  placeholder="Marca">
                        <label for="">Marca</label>
                    </div>
                </div>
                <?php if($errors->first('txtMarcaArticulo')): ?>
                    <div class="alert">
                        <p> <?php echo e($errors->first('txtMarcaArticulo')); ?> </p>
                    </div>
                <?php endif; ?>
                <div>
                    <div class="input">
                        <input name="txtDescripcionArticulo" type="text" value="<?php echo e(old('txtDescripcionArticulo')); ?>" placeholder="Descripcion">
                        <label for="">Descripcion</label>
                    </div>
                </div>
                <?php if($errors->first('txtDescripcionArticulo')): ?>
                    <div class="alert">
                        <p> <?php echo e($errors->first('txtDescripcionArticulo')); ?> </p>
                    </div>
                <?php endif; ?>
                <div>
                    <div class="input">
                        <input name="txtCantidadArticulo" type="text" value="<?php echo e(old('txtCantidadArticulo')); ?>" placeholder="Cantidad">
                        <label for="">Cantidad</label>
                    </div>
                </div>
                <?php if($errors->first('txtCantidadArticulo')): ?>
                    <div class="alert">
                        <p> <?php echo e($errors->first('txtCantidadArticulo')); ?> </p>
                    </div>
                <?php endif; ?>
                
                <div>
                    <div class="input">
                        <input name="txtPrecioCompraArticulo" type="text" value="<?php echo e(old('txtPrecioCompraArticulo')); ?>" placeholder="Precio Compra">
                        <label for="">Precio Compra</label>
                    </div>
                </div>
                <?php if($errors->first('txtPrecioCompraArticulo')): ?>
                    <div class="alert">
                        <p> <?php echo e($errors->first('txtPrecioCompraArticulo')); ?> </p>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
        <div class="btn-comics">
            <button>
                ¡Agregar!
            </button>
            <a href="<?php echo e(route('articulos.pdf')); ?>" class="btn btn-success btn-sm">Export to PDF</a>
        </div>
    </form>
    <div class="contenido-articulos__scroll">
        <div class="contenido-articulos">
            
                <?php for($i = 1; $i <= 7; $i++): ?>
                    <?php for($j = 1; $j <= 2; $j++): ?>
                    <div class="c-a__seccion-carta">
                        <div class="c-a__seccion-carta__img">
                            <img src="img/cell.jpeg" alt="">
                        </div>
                        <div class="c-a__seccion-carta__contenido">
                            <div class="c-a__s-c__contenido-datos">
                                <label for="">Nombre Articulo</label>
                                <label for="">Cantidad</label>
                            </div>
                            <div class="c-a__s-c__contenido-op">
                                <a href="">
                                    <img src="img/eliminar.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="c-a__seccion-carta">
                        <div class="c-a__seccion-carta__img">
                            <img src="img/DocStrange.jpeg" alt="">
                        </div>
                        <div class="c-a__seccion-carta__contenido">
                            <div class="c-a__s-c__contenido-datos">
                                <label for="">Nombre Articulo</label>
                                <label for="">Cantidad</label>
                            </div>
                            <div class="c-a__s-c__contenido-op">
                                <a href="">
                                    <img src="img/eliminar.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>
                <?php endfor; ?>
            
        </div>
    </div>
  </main>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Weirdocomicshd\resources\views/registro_articulos.blade.php ENDPATH**/ ?>