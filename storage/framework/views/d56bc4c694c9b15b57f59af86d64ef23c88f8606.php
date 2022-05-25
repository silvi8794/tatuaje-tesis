<div class="row">

    <div class="col-12">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">

        </div>
        <div class="card-body">


            <div class="row" >
                <div class="col-2 mb-4 mt-2" style="text-align: right;">
                    <?php if(empty($tatuaje)): ?>
                        <img src="<?php echo e(asset('dist/img/logo-tattoo.jpg')); ?>"  class="img-circle elevation-2" alt="User Image" style="width:80px; height:80px" id="img-circle-avatar">
                    <?php else: ?>
                        <?php if(!empty($tatuaje->imagen)): ?>
                            <img src="<?php echo e(url($tatuaje->imagen)); ?>" class="img-circle elevation-2" alt="User Image" style="width:80px; height:80px" id="img-circle-avatar">
                        <?php else: ?>
                            <img src="<?php echo e(asset('dist/img/logo-tattoo.jpg')); ?>"  class="img-circle elevation-2" alt="User Image" style="width:80px; height:80px" id="img-circle-avatar">
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                    <div class="col-4" style="text-align: left; margin-top: 3%;">
                    <input type="file" name="image" class="form-control colorInput" accept=".png, .jpg, .jpeg" id="avatar" required>
                    <?php if($errors->has('image')): ?>
                    <p class="text-danger"><?php echo e($errors->first('image')); ?></p>
                            <?php endif; ?>
                </div>





            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Fuente</label>
                        <div class="col-8">
                             <?php echo e(Form::text('fuente', old('fuente',$tatuaje->fuente ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Fuente', 'maxlength' => '30', 'size' => '30', 'required' => true]))); ?>

                            <?php if($errors->has('fuente')): ?>
                                <p class="text-danger"><?php echo e($errors->first('fuente')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Tamaño</label>
                        <div class="col-8">
                            <?php echo e(Form::text('tamaño', old('tamaño',$tatuaje->tamaño ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Tamaño', 'maxlength' => '10', 'size' => '10', 'required' => true]))); ?>

                        <?php if($errors->has('tamaño')): ?>
                            <p class="text-danger"><?php echo e($errors->first('tamaño')); ?></p>
                        <?php endif; ?>

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                        <div class="col-8">
                            <?php echo e(Form::text('nombre', old('nombre',$tatuaje->nombre ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Nombre', 'maxlength' => '50', 'size' => '50', 'required' => true]))); ?>

                            <?php if($errors->has('nombre')): ?>
                                <p class="text-danger"><?php echo e($errors->first('nombre')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Categoria</label>
                        <div class="col-8">
                           <div class="select2-blue">
                            <select name="selectCategoria[]" id="selectCat" class="select2 form-control colorInput"  multiple="multiple" data-placeholder="Categoria" data-dropdown-css-class="select2">
                                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if(!empty($tatuaje->categorias)): ?>
                                        <option value="<?php echo e($categoria->id); ?>" <?php if($tatuaje->categorias->containsStrict('id', $categoria->id)): ?> selected="selected" <?php endif; ?>><?php echo e($categoria->nombre); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($categoria->id); ?>" ><?php echo e($categoria->nombre); ?></option>
                                    <?php endif; ?>

                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                            <?php if($errors->has('selectCategoria')): ?>
                                <p class="text-danger"><?php echo e($errors->first('selectCategoria')); ?></p>
                            <?php endif; ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>





            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Sexo</label>
                        <div class="col-8">
                            <div class="select2-blue">
                            <select name="selectSexo[]" id="selectSexo" class="select2 form-control colorInput"  multiple="multiple" data-placeholder="Sexo" data-dropdown-css-class="select2">
                                <?php $__currentLoopData = $sexos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sexo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if(!empty($tatuaje->sexos)): ?>
                                        <option value="<?php echo e($sexo->id); ?>" <?php if($tatuaje->sexos->containsStrict('id', $sexo->id)): ?> selected="selected" <?php endif; ?>><?php echo e($sexo->nombre); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($sexo->id); ?>" ><?php echo e($sexo->nombre); ?></option>
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

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Lugares</label>
                        <div class="col-8">
                          <div class="select2-blue">
                            <select name="selectLugar[]" id="selectLugar" class="select2 form-control colorInput"  multiple="multiple" data-placeholder="Lugares" data-dropdown-css-class="select2">
                                <?php $__currentLoopData = $lugares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lugar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if(!empty($tatuaje->lugares)): ?>
                                        <option value="<?php echo e($lugar->id); ?>" <?php if($tatuaje->lugares->containsStrict('id', $lugar->id)): ?> selected="selected" <?php endif; ?>><?php echo e($lugar->nombre); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($lugar->id); ?>" ><?php echo e($lugar->nombre); ?></option>
                                    <?php endif; ?>

                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           <?php if($errors->has('selectLugar')): ?>
                                <p class="text-danger"><?php echo e($errors->first('selectLugar')); ?></p>
                            <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Descripcion</label>
                        <div class="col-8">
                            <?php echo e(Form::text('descripcion', old('descripcion',$tatuaje->descripcion ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Descripcion', 'maxlength' => '50', 'size' => '50', 'required' => true]))); ?>

                            <?php if($errors->has('descripcion')): ?>
                                <p class="text-danger"><?php echo e($errors->first('descripcion')); ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="title" class="col-form-label text-right colorLabel">Precio Base</label>
                        <div class="col-8">
                           <?php echo e(Form::text('precio_base', old('precio_base',$tatuaje->precio_base ?? ''), array_merge(['class' => 'form-control ', 'placeholder' => 'Precio Base', 'maxlength' => '50', 'size' => '50', 'required' => true]))); ?>

                            <?php if($errors->has('precio_base')): ?>
                                <p class="text-danger"><?php echo e($errors->first('precio_base')); ?></p>
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

//Initialize Select2 Elements
$('#selectCat').select2()
$('#selectLugar').select2()
$('#selectSexo').select2()


});


  </script>
  <?php $__env->stopSection(); ?>


<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/tatuaje/partials/forms.blade.php ENDPATH**/ ?>