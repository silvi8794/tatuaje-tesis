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
                            <?php echo e(Form::text('nombre', old('nombre',$lugar->nombre ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Nombre', 'maxlength' => '10', 'size' => '10', 'id' => 'lugarId', 'required' => true]))); ?>

                            <?php if($errors->has('nombre')): ?>
                                <p class="text-danger"><?php echo e($errors->first('nombre')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>


            </div>













        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>




  <?php $__env->startSection('scripts'); ?>
  <script>


    $(document).ready(function($) {
            $('#lugarId').mask('AAAAAAAAAA', {'translation': {
                    A: {pattern: /[A-Za-z\s]/},
                }
            });
    });


  </script>
  <?php $__env->stopSection(); ?>


<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/lugar/partials/forms.blade.php ENDPATH**/ ?>