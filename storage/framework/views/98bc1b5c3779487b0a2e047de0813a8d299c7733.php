<?php $__env->startSection('content'); ?>






<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row mb-4">
                <div class="card-header">
                    <h3 class="card-title titleModule">Listado de Administradores </h3>
                </div>

                <div class="col-lg-9">
                        <a href="<?php echo e(route('admin.create')); ?>" class="btn btn-info float-right" role="button" style=" border-bottom: 10px solid #ffffff margin-left: 5px; margin-top: 15px; margin-bottom: 5px; margin-right: 5px ">Crear Administrador</a>
                </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <!-- <div class="col-2">
                        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-info" role="button">Crear Usuario</a>
                    </div> -->

                    <table id="listadoAdministrador" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:50%; text-align:center">Nombre y Apellido</th>
                                <th style="width:10%; text-align:center">Email</th>
                                <th style="width:10%; text-align:center">DNI</th>
                                <th style="width:20%; text-align:center">Tipo Usuario</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

                                    <td style=" text-align:center">
                                        <?php if(!empty($user->user->user_type)): ?>
                                            <?php echo e($user->user->user_type->nombre); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center">

                                            <button type="button" class="btn paddBto" data-user="<?php echo e($user); ?>" data-toggle="modal" data-target="#showUser<?php echo e($user->id); ?>">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <form action="<?php echo e($user->id); ?>/edit" method="GET">
                                                <button type="submit" class="btn">
                                                        <i class="far fa-edit"></i>
                                                </button>
                                            </form>
                                                <?php echo Form::open(['route' => 'admin.delete','id'=>'formDelete', 'name'=>'formDelete']); ?>

                                                    <?php echo method_field('DELETE'); ?>
                                                    
                                                    <input type="hidden" name="id" id="idUser">
                                                    
                                                        <button type="button" class="btn" onclick="borrarUsuario(<?php echo e($user->id); ?>)">
                                                            <i class="far fa-trash-alt" style="color:red;"></i>
                                                        </button>
                                                <?php echo Form::close(); ?>


                                            

                                        </div>
                                    </td>
                                </tr>
                                <?php echo $__env->make('administracion/admin/partials/actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
        $('#listadoAdministrador').DataTable({
            language: {
                url: '../js/es-ar.json' //Ubicacion del archivo con el json del idioma.
            }
        });
    });




    function resetearContrasenia(userId){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '/admin/sendemail',
            data: {
                userId,
                '_token':"<?php echo e(csrf_token()); ?>"
            },
            success: function(data){
              if(data.success === 200){
              }else{

              }
            }


        });
    }




    function borrarUsuario(idUser){
        Swal.fire({
            title: '<strong style="color:red;">¿Está seguro de eliminar el administrador?',
            icon: 'danger',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'Aceptar',
            cancelButtonText:'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                $('#idUser').val(idUser)
                $( "#formDelete" ).submit();
            }
            })
    }


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administracion.menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/admin/list.blade.php ENDPATH**/ ?>