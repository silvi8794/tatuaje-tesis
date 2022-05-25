<?php $__env->startSection('content'); ?>






<div class="content-wrapper">


          <!-- right column -->
          <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title titleModule">Editar Usuario</h3>
                    </div>
                  <!-- /.card-header -->
                  <div class="card-body">





                    <?php echo Form::model($user,['route' => ['tatuador.update', $user->id], 'method' => 'PUT','class' => 'form-horizontal', 'id' => 'userForm', 'enctype' => 'multipart/form-data']); ?>


                        <?php echo $__env->make('administracion.users.partials.forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





                    <section class="main-header navbar navbar-expand" style="position: fixed; left: 0; right: 0; bottom: 0px; z-index: 1; background-color: white; height:60px;">
                            <div class="container-fluid">
                                  <div class="col-6 mt-4">

                                  </div>
                                  <div class="col-6" style="text-align:right;">


                                      <button type="submit" class="btn btn-warning separateBto"> Actualizar </button>
                                      <?php echo link_to_route('home', $title = 'Cancelar', $parameters = [], $attributes = ['class' => 'btn btn-secondary']);; ?>


                                  </div>
                            </div><!-- /.container-fluid -->
                        </section>


                     <?php echo Form::close(); ?>




                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- general form elements disabled -->


            </div>
            <!--/.col (right) -->

</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administracion.menu.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('administracion.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/users/edit_tatuador.blade.php ENDPATH**/ ?>