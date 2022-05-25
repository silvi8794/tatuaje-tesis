<div class="row">

    <div class="col-12">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">

        </div>
        <div class="card-body">


                <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                        <div class="col-4">
                            <?php echo e(Form::text('nombre', old('nombre',$categoria->nombre ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Nombre', 'maxlength'=>'15', 'size' => '15', 'id' => 'categoriaId',  'required' => true]))); ?>

                            <?php if($errors->has('nombre')): ?>
                                <p class="text-danger"><?php echo e($errors->first('nombre')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>


            </div>

<!--
              <div class="row mb-4">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                        <div class="col-8">
                            <?php echo e(Form::text('nombre', old('nombre',$categoria->nombre ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Nombre', 'maxlength'=>'15', 'size' => '15', 'id' => 'categoriaId',  'required' => true]))); ?>

                            <?php if($errors->has('nombre')): ?>
                                <p class="text-danger"><?php echo e($errors->first('nombre')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>


              </div> -->












        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>




  <?php $__env->startSection('scripts'); ?>
  <script>

    $(document).ready(function($) {
            $('#categoriaId').mask('AAAAAAAAAAAAAAA', {'translation': {
                    A: {pattern: /[A-Za-z\s]/},
                }
            });
    });


  </script>
  <?php $__env->stopSection(); ?>


<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/categoria/partials/forms.blade.php ENDPATH**/ ?>