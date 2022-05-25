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
                            <?php echo e(Form::text('nombre', old('nombre',$user->nombre ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Nombre', 'id'=>'nombre', 'maxlength'=>'30', 'size' => '30','required' => true]))); ?>

                            <?php if($errors->has('nombre')): ?>
                                <p class="text-danger"><?php echo e($errors->first('nombre')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Apellido</label>
                        <div class="col-8">
                           <?php echo e(Form::text('apellido', old('apellido', $user->apellido ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Apellido', 'id'=>'apellido', 'maxlength'=>'30', 'size' => '30', 'required' => true]))); ?>

                        <?php if($errors->has('apellido')): ?>
                            <p class="text-danger"><?php echo e($errors->first('apellido')); ?></p>
                        <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">D.N.I</label>
                        <div class="col-8">
                            <?php if(!empty($user->dni)): ?>
                            <input type="text" class="form-control" value="<?php echo e($user->dni); ?>" disabled>
                        <?php else: ?>
                            <?php echo e(Form::text('dni', old('dni',$user->dni ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'DNI', 'id'=>'dni', 'maxlength'=>'8', 'size' => '8','required' => true]))); ?>

                            <?php if($errors->has('dni')): ?>
                                <p class="text-danger"><?php echo e($errors->first('dni')); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Email</label>
                        <div class="col-8">
                            <?php if(!empty($user->email)): ?>
                            <input type="text" class="form-control" value="<?php echo e($user->email); ?>" disabled>
                        <?php else: ?>
                            <?php echo e(Form::text('email', old('email', $user->email ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Email', 'onchange' => 'buscarEmail(this.value);','required' => true]))); ?>

                            <?php if($errors->has('email')): ?>
                                <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                            <?php endif; ?>
                            <span class="buscarEmailAlert"></span>
                        <?php endif; ?>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Especialidad</label>
                        <div class="col-8">
                            <?php echo e(Form::textarea('especialidad', old('especialidad',$user->especialidad ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Especialidad', 'required' => true,'rows'=>'3','maxlength'=>'70']))); ?>

                            <?php if($errors->has('especialidad')): ?>
                                <p class="text-danger"><?php echo e($errors->first('especialidad')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Sucursal</label>
                        <div class="col-8">
                            <?php if(!empty($user->sucursal_id)): ?>
                            <select name="selectSucursal" id="selectSucursal" class="form-control colorInput" required>
                        <?php else: ?>
                            <select name="selectSucursal" id="selectSucursal" class="form-control colorInput" required>
                        <?php endif; ?>

                            <option style='background-color:#ebecff' value="" selected disabled ></option>
                            <?php $__currentLoopData = $sucursales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sucursal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if(!empty($user)): ?>
                                    <option value="<?php echo e($sucursal->id); ?>" <?php echo e(($user->sucursal_id === $sucursal->id ? 'selected' : '') ? 'selected':''); ?> > <?php echo e($sucursal->nombre); ?></option>
                                <?php else: ?>
                                    <option <?php echo e(old('selectSucursal') == $sucursal->id ? 'selected' : ''); ?> value="<?php echo e($sucursal->id); ?>"> <?php echo e($sucursal->nombre); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('selectSucursal')): ?>
                            <p class="text-danger"><?php echo e($errors->first('selectSucursal')); ?></p>
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
                           <?php if(!empty($user->localidad_id)): ?>
                            <select name="selectLocalidad" id="selectLocalidad" class="form-control colorInput" onchange="buscarProvincia()" required>
                            <?php else: ?>
                            <select name="selectLocalidad" id="selectLocalidad" class="form-control colorInput" onchange="buscarProvincia()" required>
                            <?php endif; ?>

                            <option style='background-color:#ebecff' value="" selected disabled ></option>
                        <?php $__currentLoopData = $localidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if(!empty($user)): ?>
                                <option value="<?php echo e($localidad->id); ?>" <?php echo e(($user->localidad_id === $localidad->id ? 'selected' : '') ? 'selected':''); ?> > <?php echo e($localidad->nombre); ?> - <?php echo e($localidad->provincia->nombre); ?></option>
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
                        <label for="title" class="col-form-label text-right colorLabel">Sexo</label>
                        <div class="col-8">
                            <?php if(!empty($user->sexo_id)): ?>
                            <select name="selectSexo" id="selectSexo" class="form-control colorInput" required>
                            <?php else: ?>
                            <select name="selectSexo" id="selectSexo" class="form-control colorInput" required>
                            <?php endif; ?>

                            <option style='background-color:#ebecff' value="" selected disabled ></option>
                            <?php $__currentLoopData = $sexos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sexo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if(!empty($user)): ?>
                                    <option value="<?php echo e($sexo->id); ?>" <?php echo e(($user->sexo_id === $sexo->id ? 'selected' : '') ? 'selected':''); ?> > <?php echo e($sexo->nombre); ?></option>
                                <?php else: ?>
                                    <option <?php echo e(old('selectSexo') == $sexo->id ? 'selected' : ''); ?> value="<?php echo e($sexo->id); ?>"> <?php echo e($sexo->nombre); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('selectSexo')): ?>
                            <p class="text-danger"><?php echo e($errors->first('selectSexo')); ?></p>
                        <?php endif; ?>

                        </div>

                    </div>
                </div>

            </div>

             <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Provincia</label>
                        <div class="col-4">
                            <input type="text" id="inputProvincia" class="form-control" disabled>
                        </div>

                    </div>
                </div>

            </div>

             <div class="row">
                <?php if(!isset($user)): ?>
                    <div class="col">
                        <div class="form-group">
                            <label for="title" class="col-form-label text-right colorLabel">Contraseña</label>
                            <div class="col-8">
                                <?php echo Form::password('password', ['class' => 'form-control awesome colorInput', 'placeholder' => 'Password', 'size' => 10, 'maxlength' => 10, 'required' => true, 'id'=>'myPassword']); ?>

                                <?php if($errors->has('password')): ?>
                                    <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!isset($user)): ?>
                        <div class="col">
                            <div class="form-group">
                            <label for="title" class="col-form-label text-right colorLabel">Confirmar Contraseña</label>
                                <div class="col-8">
                                        <?php echo Form::password('password_confirmation', ['class' => 'form-control awesome colorInput', 'placeholder' => 'Confirm Password', 'size' => 10, 'maxlength'=> 10, 'required' => true, 'id'=>'myPassword']); ?>

                                        <?php if($errors->has('password_confirmation')): ?>
                                            <p class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></p>
                                        <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

            </div>

        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>




  <?php $__env->startSection('scripts'); ?>
  <script>
        $(document).ready(function($) {

            $('#dni').mask('00000000');
            $('#nombre').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {'translation': {
                    A: {pattern: /[A-Za-z\s]/},
                }
            });
            $('#apellido').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {'translation': {
                    A: {pattern: /[A-Za-z\s]/},
                }
            });

            if ($('#selectLocalidad').text() != "") {
                buscarProvincia();
            }


        });

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



        function buscarEmail(email){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '/users/buscar/email',
                data: {
                    email,
                    '_token':"<?php echo e(csrf_token()); ?>"
                    },
                success: function(data){
                    if(data.status === 200){
                        $('.buscarEmailAlert').removeClass('text-danger').addClass('text-success').css({'display':'grid'}).text('Email Valido');
                    }else{
                        $('.buscarEmailAlert').removeClass('text-success').addClass('text-danger').css({'display':'grid'}).text('El Email ya existe');
                    }
                }
            });
        }


  </script>
  <?php $__env->stopSection(); ?>


<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/users/partials/forms.blade.php ENDPATH**/ ?>