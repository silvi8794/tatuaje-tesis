
<!-- Modal Views-->
<div class="modal fade" id="showTatuaje<?php echo e($tatuaje->id); ?>"  tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header headerModel borderHeader">
                Tatuaje
            </div>
            <div class="modal-body">

                        <div class="row" style="margin-top: 0px !important;">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Imagen</label>
                            </div>
                            <div class="col-4">
                                <?php if(!empty($tatuaje->imagen)): ?>
                                    <img src="<?php echo e(url($tatuaje->imagen)); ?>" class="img-circle elevation-2" alt="User Image" style="width:80px; height:80px" id="img-circle-avatar">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('dist/img/logo-tattoo.jpg')); ?>"  class="img-circle elevation-2" alt="User Image" style="width:80px; height:80px" id="img-circle-avatar">
                                <?php endif; ?>


                            </div>
                        </div>
                        

                        <div class="row mb-4">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                            </div>
                            <div class="col-4">
                                <?php if(!empty($tatuaje->nombre)): ?>
                                    <input type="text" class="form-control colorInput" value="<?php echo e($tatuaje->nombre); ?>" disabled>
                                <?php else: ?>
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                <?php endif; ?>


                            </div>
                            <div class="col-2" style="text-align: right;">
                                <label class="col-form-label colorLabel">Fuente</label>
                            </div>
                            <div class="col-3" style="text-align: left;">
                                <?php if(!empty($tatuaje->fuente)): ?>
                                    <input type="text" class="form-control colorInput" value="<?php echo e($tatuaje->fuente); ?>" disabled>
                                <?php else: ?>
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                <?php endif; ?>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Tamaño</label>
                            </div>
                            <div class="col-4">
                                <?php if(!empty($tatuaje->tamaño)): ?>
                                    <input type="text" class="form-control colorInput" value="<?php echo e($tatuaje->tamaño); ?>" disabled>
                                <?php else: ?>
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                <?php endif; ?>


                            </div>
                            <div class="col-2" style="text-align: right;">
                                <label class="col-form-label colorLabel">Categorias</label>
                            </div>
                            <div class="col-3" style="text-align: left;">
                                 <?php if(!empty($tatuaje->categorias)): ?>
                                    <?php $__currentLoopData = $tatuaje->categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemCategorias): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span>
                                            <?php echo e($itemCategorias->nombre); ?>

                                            <?php if(!$loop->last): ?>
                                            <?php echo e(', '); ?>

                                            <?php endif; ?>
                                        </span>



                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?> 
                            </div>
                        </div>



                        <div class="row mb-4">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Sexos</label>
                            </div>
                            <div class="col-4">
                                <?php if(!empty($tatuaje->sexos)): ?>
                                    <?php $__currentLoopData = $tatuaje->sexos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemSexos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span>
                                            <?php echo e($itemSexos->nombre); ?>

                                            <?php if(!$loop->last): ?>
                                            <?php echo e(', '); ?>

                                            <?php endif; ?>
                                        </span>



                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?> 


                            </div>
                            <div class="col-2" style="text-align: right;">
                                <label class="col-form-label colorLabel">Lugares</label>
                            </div>
                            <div class="col-3" style="text-align: left;">
                                 <?php if(!empty($tatuaje->lugares)): ?>
                                    <?php $__currentLoopData = $tatuaje->lugares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemLugar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span>
                                            <?php echo e($itemLugar->nombre); ?>

                                            <?php if(!$loop->last): ?>
                                            <?php echo e(', '); ?>

                                            <?php endif; ?>
                                        </span>



                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?> 
                            </div>
                        </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>




<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/tatuaje/partials/actions.blade.php ENDPATH**/ ?>