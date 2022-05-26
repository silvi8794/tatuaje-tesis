<?php $__env->startSection('content'); ?>



<div class="content-wrapper">
   <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row mb-4">
                <div class="card-header">
                    <h3 class="card-title titleModule">Listado de Tatuajes </h3>
                </div>
                
                <div class="col-lg-9">
                        <a href="<?php echo e(route('tatuaje.create')); ?>" class="btn btn-info float-right" role="button" style=" border-bottom: 10px solid #ffffff margin-left: 5px; margin-top: 15px; margin-bottom: 5px; margin-right: 5px ">Crear Tatuaje</a>
                </div>
                </div>


                <!-- /.card-header -->
                <div class="card-body">
                    <!-- <div class="col-4">
                        <a href="<?php echo e(route('tatuaje.create')); ?>" class="btn btn-info" role="button" >Crear Tatuaje</a>
                    </div> -->

                    <table id="listadoUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10%; text-align:left"></th>
                                <th style="width:40%; text-align:left">Nombre</th>
                                <th style="width:30%; text-align:left">Fuente</th>
                                <th style="width:10%; text-align:left">Tamaño</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tatuajes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tatuaje): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <tr>
                                    <td style=" text-align:center">
                                        <?php if($tatuaje->imagen): ?>
                                            <img src="<?php echo e(url($tatuaje->imagen)); ?>" class="elevation-2 userImage" alt="Imagen" >
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('/dist/img/user2-160x160.jpg')); ?>"  class="elevation-2 userImage" alt="Imagen">
                                        <?php endif; ?>
                                    </td>
                                    <td style=" text-align:left">
                                        <?php if(!empty($tatuaje->nombre)): ?>
                                            <?php echo e($tatuaje->nombre); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td style=" text-align:left">
                                        <?php if(!empty($tatuaje->fuente)): ?>
                                            <?php echo e($tatuaje->fuente); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td style=" text-align:left">
                                        <?php if(!empty($tatuaje->tamaño)): ?>
                                            <?php echo e($tatuaje->tamaño); ?>

                                        <?php endif; ?>
                                    </td>


                                    <td>
                                        <div class="d-flex justify-content-center">

                                            <button type="button" class="btn paddBto" data-user="<?php echo e($tatuaje); ?>" data-toggle="modal" data-target="#showTatuaje<?php echo e($tatuaje->id); ?>">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <form action="<?php echo e($tatuaje->id); ?>/edit" method="GET">
                                                <button type="submit" class="btn">
                                                        <i class="far fa-edit"></i>
                                                </button>
                                            </form>
                                                <?php echo Form::open(['route' => 'tatuaje.delete','id'=>'formDelete', 'name'=>'formDelete']); ?>

                                                    <?php echo method_field('DELETE'); ?>
                                                   
                                                    <input type="hidden" name="id" id="idTatuaje">
                                                    <button type="button" class="btn" onclick="borrarTatuaje(<?php echo e($tatuaje->id); ?>)">
                                                            <i class="far fa-trash-alt" style="color:red;"></i>
                                                        </button>
                                                <?php echo Form::close(); ?>


                                        </div>
                                    </td>
                                </tr>
                                <?php echo $__env->make('administracion/tatuaje/partials/actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
        $('#listadoUsuario').DataTable({
            language: {
                url: '../js/es-ar.json' //Ubicacion del archivo con el json del idioma.
            }
        });
    });
    function borrarTatuaje(idTatuaje){
        Swal.fire({
            title: '<strong style="color:red;">¿Está seguro de eliminar el Tatuaje?</strong>',
            icon: 'danger',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'Aceptar',
            cancelButtonText:'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                $('#idTatuaje').val(idTatuaje);
                $( "#formDelete" ).submit();
            }
            })
    }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administracion.menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatuaje-tesis\resources\views/administracion/tatuaje/list.blade.php ENDPATH**/ ?>