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
                        <div class="col-8">
                            <?php echo e(Form::text('nombre', old('nombre',$sucursal->nombre ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Nombre', 'required' => true]))); ?>

                            <?php if($errors->has('nombre')): ?>
                                <p class="text-danger"><?php echo e($errors->first('nombre')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Direccion</label>
                        <div class="col-8">
                           <?php echo e(Form::text('direccion', old('direccion', $sucursal->direccion ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Dirección', 'required' => true]))); ?>

                        <?php if($errors->has('direccion')): ?>
                            <p class="text-danger"><?php echo e($errors->first('direccion')); ?></p>
                        <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Horario de Apertura</label>
                        <div class="col-8">
                            <?php echo e(Form::time('horario_inicio', old('horario_inicio',$sucursal->horario_inicio ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Horario de Apertura', 'required' => true]))); ?>

                            <?php if($errors->has('horario_inicio')): ?>
                                <p class="text-danger"><?php echo e($errors->first('horario_inicio')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Horario de Cierre</label>
                        <div class="col-8">
                           <?php echo e(Form::time('horario_fin', old('horario_fin', $sucursal->horario_fin ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Horario de Cierre', 'onchange' => 'buscarhorario_fin(this.value);','required' => true]))); ?>

                            <?php if($errors->has('horario_fin')): ?>
                                <p class="text-danger"><?php echo e($errors->first('horario_fin')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>




              <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Localidad</label>
                        <div class="col-8">
                            <?php if(!empty($sucursal->localidad_id)): ?>
                            <select name="selectLocalidad" id="selectLocalidad" class="form-control colorInput" onchange="buscarProvincia()" required>
                        <?php else: ?>
                            <select name="selectLocalidad" id="selectLocalidad" class="form-control colorInput" onchange="buscarProvincia()" required>
                        <?php endif; ?>

                        <option style='background-color:#ebecff' value="" selected disabled ></option>

                        <?php $__currentLoopData = $localidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if(!empty($sucursal)): ?>
                                <option value="<?php echo e($localidad->id); ?>" <?php echo e(($sucursal->localidad_id === $localidad->id ? 'selected' : '') ? 'selected':''); ?> > <?php echo e($localidad->nombre); ?></option>
                            <?php else: ?>
                                <option <?php echo e(old('selectLocalidad') == $localidad->id ? 'selected' : ''); ?> value="<?php echo e($localidad->id); ?>"  > <?php echo e($localidad->nombre); ?> - <?php echo e($localidad->provincia->nombre); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->has('selectLocalidad')): ?>
                        <p class="text-danger"><?php echo e($errors->first('selectLocalidad')); ?></p>
                    <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Provincia</label>
                        <div class="col-8">
                           <input type="text" id="inputProvincia" class="form-control" disabled>
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


      function buscarProvincia(){
          let idLocalidad = $('#selectLocalidad').val();
          if(idLocalidad != ''){
              $.ajax({
                  type: "POST",
                  dataType: "json",
                  url: '/users/buscar/provincia',
                  data: {
                        idLocalidad,
                        '_token':"<?php echo e(csrf_token()); ?>"
                      },
                  success: function(data){
                      if(data.status === 200){
                            $('#inputProvincia').val(data.provincia);
                      }else{
                          $('#inputProvincia').empty();
                      }
                  }
              });
          }else{
            $('#inputProvincia').empty();
          }
      }

          $(document).ready(function($) {

            if ($('#selectLocalidad').text() != "") {
                buscarProvincia();
            }


          });




  </script>
  <?php $__env->stopSection(); ?>


<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/sucursal/partials/forms.blade.php ENDPATH**/ ?>