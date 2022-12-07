

<?php $__env->startSection('titulo_documento', 'Registro de proveedores'); ?>

<?php $__env->startSection('contenido'); ?>

<?php if(session()->has('registrado')): ?>

    <?php echo "<script> Swal.fire({
          icon: 'success',
          title: 'Proveedor " . session()->get("agregar") . " se ha guardado exitosamente',
          showConfirmButton: false,
          timer: 2000
        }) </script>"; ?>


<?php endif; ?>

<main class="main-reg_pro">
    <div>
        <form class="form-reg_pro" action=" <?php echo e(route('proveedor.store')); ?> " method="post">
            <?php echo csrf_field(); ?>
            <div class="header-reg_pro">
                <h1>Registrar Proveedor</h1>
            </div>
            <div class="datos-reg_pro__scroll">
                <div class="datos-reg_pro">
                    <section class="datos-reg_pro__seccion">
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtEmpresaProveedor" type="text" value="<?php echo e(old('txtEmpresaProveedor')); ?>" placeholder="Empresa">
                                <label for="">Nombre</label>
                            </div>
                            <?php if($errors->first('txtEmpresaProveedor')): ?>
                                <div class="alert2">
                                    <p> <?php echo e($errors->first('txtEmpresaProveedor')); ?> </p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtDireccionProveedor" type="text" value="<?php echo e(old('txtDireccionProveedor')); ?>" placeholder="Dirección">
                                <label for="">Dirección</label>
                            </div>
                            <?php if($errors->first('txtDireccionProveedor')): ?>
                                <div style="color: red">
                                    <p> <?php echo e($errors->first('txtDireccionProveedor')); ?> </p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtPaisProveedor" type="text" value="<?php echo e(old('txtPaisProveedor')); ?>" placeholder="País">
                                <label for="">País</label>
                            </div>
                            <?php if($errors->first('txtPaisProveedor')): ?>
                                <div style="color: red">
                                    <p> <?php echo e($errors->first('txtPaisProveedor')); ?> </p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtContactoProveedor" type="text" value="<?php echo e(old('txtContactoProveedor')); ?>" placeholder="Contacto">
                                <label for="">Contacto</label>
                            </div>
                            <?php if($errors->first('txtContactoProveedor')): ?>
                                <div style="color: red">
                                    <p> <?php echo e($errors->first('txtContactoProveedor')); ?> </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                    <section class="datos-reg_pro__seccion">
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtNoFijoProveedor" type="text" value="<?php echo e(old('txtNoFijoProveedor')); ?>" placeholder="No. Fijo">
                                <label for="">No. Fijo</label>
                            </div>
                            <?php if($errors->first('txtNoFijoProveedor')): ?>
                                <div style="color: red">
                                    <p> <?php echo e($errors->first('txtNoFijoProveedor')); ?> </p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtNoCelularProveedor" type="text" value="<?php echo e(old('txtNoCelularProveedor')); ?>" placeholder="No. Celular">
                                <label for="">No. Celular</label>
                            </div>
                            <?php if($errors->first('txtNoCelularProveedor')): ?>
                                <div style="color: red">
                                    <p> <?php echo e($errors->first('txtNoCelularProveedor')); ?> </p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <div class="input-reg_pro">
                                <input name="txtCorreoProveedor" type="text" value="<?php echo e(old('txtCorreoProveedor')); ?>" placeholder="Correo">
                                <label for="">Correo</label>
                            </div>
                            <?php if($errors->first('txtCorreoProveedor')): ?>
                                <div style="color: red">
                                    <p> <?php echo e($errors->first('txtCorreoProveedor')); ?> </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                </div>
            </div>
            <div class="btn-reg_pro">
                <button>
                    Registrar
                </button>
            </div>
        </form>
        <div class="fondo-reg_pro"></div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\WeirdoComics\resources\views/registro_proveedores.blade.php ENDPATH**/ ?>