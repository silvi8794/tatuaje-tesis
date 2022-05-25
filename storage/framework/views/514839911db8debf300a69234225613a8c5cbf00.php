<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- right column -->
    <div class="col-md-12">
        <div class="row col-12 mt-1 mb-3">
            <h3 class="titleModule">Crear Sucursal</h3>
        </div>
        <?php echo Form::open(['route' => 'sucursal.store', 'enctype' => 'multipart/form-data']); ?>

            <?php echo $__env->make('administracion.sucursal.partials.forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section class="main-header navbar navbar-expand" style="position: fixed; left: 0; right: 0; bottom: 0px; z-index: 1; background-color: white; height:60px;">
                <div class="container-fluid">
                    <div class="col-6 mt-4"></div>
                        <div class="col-6" style="text-align:right;">
                            <button type="submit" value="save" name="save" class="btn btn-info separateBto">Guardar</button>
                            <button type="submit" value="saveAdd" name="saveAdd" class="btn btn-success separateBto">Guardar y agregar</button>
                            <?php echo link_to_route('sucursal.index', $title = 'Cancelar', $parameters = [], $attributes = ['class' => 'btn btn-secondary separateBto']);; ?>

                        </div>
                    </div><!-- /.container-fluid -->
            </section>
         <?php echo Form::close(); ?>




    </div>
    <!--/.col (right) -->
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administracion.menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/sucursal/create.blade.php ENDPATH**/ ?>