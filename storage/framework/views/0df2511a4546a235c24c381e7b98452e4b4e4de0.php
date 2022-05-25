<?php $__env->startSection('content'); ?>






<div class="content-wrapper">

   <!--  <section class="main-header navbar navbar-expand" style="position: fixed; left: 0; right: 0; top: 57px; z-index: 1; background-color: white; height:60px;"> -->

    <!-- <div class="row rowFixed"> -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row mb-4">
                    <div class="card-header">
                        <h3 class="card-title titleModule">Listado de Categorias</h3>
                    </div>


                    <div class="col-lg-9">

                            <a href="<?php echo e(route('categoria.create')); ?>" class="btn btn-info float-right" role="button" style=" border-bottom: 10px solid #ffffff margin-left: 5px; margin-top: 15px; margin-bottom: 5px; margin-right: 5px ">Crear Categoria</a>
                    </div>



                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="listadoCategoria" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:90%; text-align:left">Nombre</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <tr>
                                    <td style=" text-align:left">
                                        <?php if(!empty($categoria->nombre)): ?>
                                            <?php echo e($categoria->nombre); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center">

                                            <button type="button" class="btn paddBto" data-user="<?php echo e($categoria); ?>" data-toggle="modal" data-target="#showCategoria<?php echo e($categoria->id); ?>">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <form action="<?php echo e($categoria->id); ?>/edit" method="GET">
                                                <button type="submit" class="btn">
                                                        <i class="far fa-edit"></i>
                                                </button>
                                            </form>
                                                <?php echo Form::open(['route' => 'categoria.delete','id'=>'formDelete', 'name'=>'formDelete']); ?>

                                                    <?php echo method_field('DELETE'); ?>
                                                    
                                                    <input type="hidden" name="id" id="idCategoria">
                                                        <button type="button" class="btn" onclick="borrarCategoria(<?php echo e($categoria->id); ?>)">
                                                            <i class="far fa-trash-alt" style="color:red;"></i>
                                                        </button>
                                                <?php echo Form::close(); ?>


                                        </div>
                                    </td>
                                </tr>
                                <?php echo $__env->make('administracion/categoria/partials/actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
        $('#listadoCategoria').DataTable({
            language: {
                url: '../js/es-ar.json' //Ubicacion del archivo con el json del idioma.
            }
        });
    });
    function borrarCategoria(idCategoria){
        Swal.fire({
            title: '<strong style="color:red;">¿Esta seguro de eliminar la Categoria?</strong>',
            icon: 'danger',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'Aceptar',
            cancelButtonText:'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                $('#idCategoria').val(idCategoria);
                $( "#formDelete" ).submit();
            }
            })
    }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administracion.menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/categoria/list.blade.php ENDPATH**/ ?>