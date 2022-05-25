<?php $__env->startSection('content'); ?>



<div class="content-wrapper">




  <!--   <section class="main-header navbar navbar-expand" style="position: fixed; left: 0; right: 0; top: 57px; z-index: 1; background-color: white; height:60px;"> -->
       <!--  <div class="container-fluid">

        </div> -->
        <!-- /.container-fluid -->
    <!-- </section> -->

    <div class="row">
    <!-- <div class="row rowFixed"> -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title titleModule">Listado de Turnos</h2>
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    <table id="listadoTatuador" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:25%; text-align:center">Apellido y Nombre</th>
                                <th style="width:20%; text-align:center">Estado</th>
                                <th style="width:10%; text-align:center">Tatuaje</th>
                                <th style="width:10%; text-align:center">Fecha</th>
                                <th style="width:25%; text-align:center">Turno</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <tr id="tr<?php echo e($turno->id); ?>">
                                   <td style=" text-align:left">
                                       <?php if(!empty($turno->cliente->nombre) && !empty($turno->cliente->apellido)): ?>
                                           <?php echo e($turno->cliente->apellido); ?>,<?php echo e($turno->cliente->nombre); ?>

                                       <?php endif; ?>
                                   </td>
                                   <td style=" text-align:center">
                                      <?php if(!$turno->estado): ?>
                                            <span id="turno_<?php echo e($turno->id); ?>" style="color: red">No Atendido</span>
                                        <?php else: ?>
                                            <span style="color: green" id="turno_<?php echo e($turno->id); ?>">Atendido</span>
                                      <?php endif; ?>
                                   </td>
                                   <td style=" text-align:center">
                                        <?php if($turno->tatuaje->imagen): ?>
                                            <img src="<?php echo e(url($turno->tatuaje->imagen)); ?>" class="elevation-2 userImage" alt="User Image" >
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('/dist/img/user2-160x160.jpg')); ?>"  class="elevation-2 userImage" alt="User Image">
                                        <?php endif; ?>
                                   </td>
                                   <td style=" text-align:center">
                                        <?php if(!empty($turno->fecha)): ?>
                                            <?php echo e(\Carbon\Carbon::parse($turno->fecha)->format('d/m/Y')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td style=" text-align:center">
                                        <?php if(!empty($turno->fecha)): ?>
                                            <?php
                                                $date = new DateTime($turno->fecha);
                                            ?>
                                            <?php echo e(\Carbon\Carbon::parse($turno->fecha)->isoFormat('HH:mm:ss')); ?> - <?php echo e($date->modify('+120 minute')->format('H:i:s')); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn paddBto" data-user="<?php echo e($turno); ?>" data-toggle="modal" data-target="#showTurno<?php echo e($turno->id); ?>">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <?php if(is_null($turno->deleted_at) && !$turno->estado): ?>
                                                <button type="button" class="btn paddBto" id="btoAtender_<?php echo e($turno->id); ?>" data-user="<?php echo e($turno); ?>" data-toggle="modal" data-target="#showAtencion<?php echo e($turno->id); ?>">
                                                    <i class="fas fa-check" style="color:green;"></i>
                                                </button>
                                            <?php endif; ?>
                                            


                                            <?php echo Form::open(['route' => 'turnos.delete','id'=>'formDelete', 'name'=>'formDelete']); ?>

                                                <?php echo method_field('DELETE'); ?>
                                                
                                                <input type="hidden" name="id" id="idTurno">
                                                <button type="button" class="btn" onclick="borrarTurno(<?php echo e($turno->id); ?>)">
                                                        <i class="far fa-trash-alt" style="color:red;"></i>
                                                    </button>
                                            <?php echo Form::close(); ?>



                                        </div>
                                    </td>
                                </tr>
                                <?php echo $__env->make('administracion/tatuador/partials/actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
        $('#listadoTatuador').DataTable({
            language: {
                url: '../js/es-ar.json' //Ubicacion del archivo con el json del idioma.
            }
        });
    });
   /* function atenderTurno(idTurno){
        console.log(idTurno)
        $.ajax({
                type: "POST",
                dataType: "json",
                url: '/tatuador/atender',
                data: {
                    idTurno,
                    '_token':"<?php echo e(csrf_token()); ?>"
                    },
                success: function(data){
                    if(data.status===200){
                        $(`#turno_${idTurno}`).css('color','green').text('Atendido');
                        $(`#btoAtender_${idTurno}`).css('display','none');
                        toastr.success("Turno Atendido");
                    }else{
                        $(`#turno_${idTurno}`).css('color','red').text('No Atendido');
                        $(`#btoAtender_${idTurno}`).css('display','inline-block');
                        toastr.error("Turno no Atendido");
                    }
                }
            });
    }*/

     function atenderTurno(turno) {
            let now = new Date().getTime();
            let appointmentDate = new Date(turno.fecha).getTime();
            if (now > appointmentDate) {
                let idTurno = turno.id
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '/tatuador/atender',
                    data: {
                        idTurno,
                        '_token': "<?php echo e(csrf_token()); ?>"
                    },
                    success: function (data) {
                        if (data.status === 200) {
                            $(`#turno_${idTurno}`).css('color', 'green').text('Atendido');
                            $(`#btoAtender_${idTurno}`).css('display', 'none');
                            $("#tr" + turno.id).fadeOut("slow");
                            toastr.success("Turno Atendido");
                        } else {
                            $(`#turno_${idTurno}`).css('color', 'red').text('No Atendido');
                            $(`#btoAtender_${idTurno}`).css('display', 'inline-block');
                            toastr.error("Turno no atendido");
                        }
                    }
                });
            } else {
                 toastr.error("No puede marcar un turno antes del día y hora fijada");
            }
        }


    function borrarTurno(idTurno){
        Swal.fire({
            //title: '<p class="text-danger">¿Está seguro de eliminar el turno?</p>',
            title: '<strong style="color:red;">¿Está seguro de eliminar el turno?</strong>',
            icon: 'danger',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'Aceptar',
            cancelButtonText:'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                $('#idTurno').val(idTurno);
                $( "#formDelete" ).submit();

            }
            })
    }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administracion.menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/tatuador/list.blade.php ENDPATH**/ ?>