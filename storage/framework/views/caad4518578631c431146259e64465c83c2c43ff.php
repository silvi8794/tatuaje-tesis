<?php $__env->startSection('content'); ?>






<div class="content-wrapper">




    <!-- <section class="main-header navbar navbar-expand" style="position: fixed; left: 0; right: 0; top: 57px; z-index: 1; background-color: white; height:60px;"> -->
        <div class="container-fluid">
           


           
        </div><!-- /.container-fluid -->
    <!-- </section> -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title titleModule">Listado de Usuarios</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="listadoUsuario" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:50%; text-align:center">Nombre y Apellido</th>
                                <th style="width:10%; text-align:center">Email</th>
                                <th style="width:10%; text-align:center">DNI</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <tr>
                                    <td style=" text-align:center">
                                        <?php if(!empty($user)): ?>
                                            <?php echo e($user->nombre); ?>, <?php echo e($user->apellido); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td style=" text-align:center">
                                        <?php if(!empty($user)): ?>
                                            <?php echo e($user->email); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td style=" text-align:center">
                                        <?php if(!empty($user)): ?>
                                            <?php echo e($user->dni); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                                <button type="button" class="btn paddBto" id="btoRestore_<?php echo e($user->id); ?>" onclick="activarUser(<?php echo e($user->id); ?>)" >
                                                    <i class="fas fa-check" style="color:green;"></i>
                                                </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php echo $__env->make('administracion/users/partials/actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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



    function activarUser(userId){
        $.ajax({
                type: "POST",
                dataType: "json",
                url: '/users/restore',
                data: {
                    userId,
                    '_token':"<?php echo e(csrf_token()); ?>"
                    },
                success: function(data){
                    if(data.status===200){
                        $(`#btoRestore_${userId}`).css('display','none');
                        toastr.success("Usuario Activado");
                    }else{
                        $(`#btoRestore_${userId}`).css('display','inline-block');
                        toastr.error("Usuario No Activado");
                    }
                }
            });
    }




    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administracion.menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/users/list_restore.blade.php ENDPATH**/ ?>