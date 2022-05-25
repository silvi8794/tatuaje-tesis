<?php $__env->startSection('content'); ?>






<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title titleModule">Listado de Sucursales</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-2">
                        <a href="<?php echo e(route('sucursal.create')); ?>" class="btn btn-info" role="button" >Crear Sucursal</a>
                    </div>

                    <table id="listadoSucursal" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:25%; text-align:center">Nombre</th>
                                <th style="width:25%; text-align:center">Dirección</th>
                                <th style="width:20%; text-align:center">Horario</th>
                                <th style="width:20%; text-align:center">Localidad</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $sucursales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sucursal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <tr>
                                    <td style=" text-align:center">
                                        <?php if(!empty($sucursal->nombre)): ?>
                                            <?php echo e($sucursal->nombre); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td style=" text-align:center">
                                        <?php if(!empty($sucursal->direccion)): ?>
                                            <?php echo e($sucursal->direccion); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td style=" text-align:center">
                                        <?php if(!empty($sucursal->horario_inicio)): ?>
                                            <?php echo e($sucursal->horario_inicio); ?> - <?php echo e($sucursal->horario_fin); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td style=" text-align:center">
                                        <?php if(!empty($sucursal->localidad)): ?>
                                            <?php echo e($sucursal->localidad->nombre); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center">

                                            <button type="button" class="btn paddBto" data-user="<?php echo e($sucursal); ?>" data-toggle="modal" data-target="#showSucursal<?php echo e($sucursal->id); ?>">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <form action="<?php echo e($sucursal->id); ?>/edit" method="GET">
                                                <button type="submit" class="btn">
                                                        <i class="far fa-edit"></i>
                                                </button>
                                            </form>
                                                <?php echo Form::open(['route' => 'sucursal.delete','id'=>'formDelete', 'name'=>'formDelete']); ?>

                                                    <?php echo method_field('DELETE'); ?>
                                                    
                                                    <input type="hidden" name="id" id="idSucursal">
                                                    <button type="button" class="btn" onclick="borrarSucursal(<?php echo e($sucursal->id); ?>)">
                                                            <i class="far fa-trash-alt" style="color:red;"></i>
                                                        </button>
                                                <?php echo Form::close(); ?>


                                        </div>
                                    </td>
                                </tr>
                                <?php echo $__env->make('administracion/sucursal/partials/actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
    $(document).ready(function($) {
        $('#listadoSucursal').DataTable({
            language: {
                url: '../js/es-ar.json' //Ubicacion del archivo con el json del idioma.
            }
        });
    });

    function borrarSucursal(idSucursal){
        Swal.fire({
            title: '<strong style="color:red;">¿Está seguro de eliminar la Sucursal?</strong>',
            icon: 'danger',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'Aceptar',
            cancelButtonText:'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                $('#idSucursal').val(idSucursal);
                $( "#formDelete" ).submit();
            }
            })
    }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administracion.menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/sucursal/list.blade.php ENDPATH**/ ?>