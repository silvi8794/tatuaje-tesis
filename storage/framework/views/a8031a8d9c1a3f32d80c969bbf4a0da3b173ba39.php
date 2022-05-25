



<!-- Modal Views-->
<div class="modal fade" id="showUser<?php echo e($user->id); ?>"  tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header headerModel borderHeader">
                Usuario
            </div>
            <div class="modal-body">


                        <div class="row" style="margin-top: 0px !important;">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                            </div>
                            <div class="col-4">
                                <?php if(!empty($user->nombre)): ?>
                                    <input type="text" class="form-control colorInput" value="<?php echo e($user->nombre); ?>" disabled>
                                <?php else: ?>
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                <?php endif; ?>


                            </div>
                            <div class="col-2" style="text-align: right;">
                                <label class="col-form-label colorLabel">Apellido</label>
                            </div>
                            <div class="col-3" style="text-align: left;">
                                <?php if(!empty($user->apellido)): ?>
                                    <input type="text" class="form-control colorInput" value="<?php echo e($user->apellido); ?>" disabled>
                                <?php else: ?>
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                <?php endif; ?>

                            </div>
                        </div>


                        <div class="row">
                                <div class="col-2" style="text-align: right;">
                                    <label for="title" class="col-form-label text-right colorLabel">Email</label>
                                </div>
                                <div class="col-4 mb-4">
                                    <?php if((!empty($user->email))): ?>
                                        <input type="text" class="form-control colorInput" value="<?php echo e($user->email); ?>" disabled>
                                    <?php else: ?>
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    <?php endif; ?>

                                </div>

                                <div class="col-2" style="text-align: right;">
                                    <label class="col-form-label colorLabel">DNI</label>
                                </div>
                                <div class="col-3" style="text-align: left;">
                                    <?php if(!empty($user->dni)): ?>
                                        <input type="text" class="form-control colorInput" value="<?php echo e($user->dni); ?>" disabled>
                                    <?php else: ?>
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    <?php endif; ?>

                                </div>
                        </div>
                        <div class="row">
                                <div class="col-2" style="text-align: right;">
                                    <label for="title" class="col-form-label text-right colorLabel">Especialidad</label>
                                </div>
                                <div class="col-4 mb-4">
                                    <?php if((!empty($user->especialidad))): ?>
                                        <input type="text" class="form-control colorInput" value="<?php echo e($user->especialidad); ?>" disabled>
                                    <?php else: ?>
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    <?php endif; ?>

                                </div>

                                <div class="col-2" style="text-align: right;">
                                    <label class="col-form-label colorLabel">Sexo</label>
                                </div>
                                <div class="col-3" style="text-align: left;">
                                    <?php if(!empty($user->sexo)): ?>
                                        <input type="text" class="form-control colorInput" value="<?php echo e($user->sexo->nombre); ?>" disabled>
                                    <?php else: ?>
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    <?php endif; ?>

                                </div>
                        </div>
                        <div class="row">
                                <div class="col-2" style="text-align: right;">
                                    <label for="title" class="col-form-label text-right colorLabel">Localidad</label>
                                </div>
                                <div class="col-4 mb-4">
                                    <?php if((!empty($user->localidad))): ?>
                                        <input type="text" class="form-control colorInput" value="<?php echo e($user->localidad->nombre); ?>" disabled>
                                    <?php else: ?>
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    <?php endif; ?>

                                </div>

                                <div class="col-2" style="text-align: right;">
                                    <label class="col-form-label colorLabel">Provincia</label>
                                </div>
                                <div class="col-3" style="text-align: left;">
                                    <?php if(!empty($user->localidad)): ?>
                                        <input type="text" class="form-control colorInput" value="<?php echo e($user->localidad->provincia->nombre); ?>" disabled>
                                    <?php else: ?>
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    <?php endif; ?>

                                </div>
                        </div>
                        <div class="row">
                                <div class="col-2" style="text-align: right;">
                                    <label for="title" class="col-form-label text-right colorLabel">Sucursal</label>
                                </div>
                                <div class="col-4 mb-4">
                                    <?php if((!empty($user->sucursal))): ?>
                                        <input type="text" class="form-control colorInput" value="<?php echo e($user->sucursal->nombre); ?>" disabled>
                                    <?php else: ?>
                                        <input type="text" class="form-control colorInput" value="" disabled>
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







 <!-- Modal Delete User-->



<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/users/partials/actions.blade.php ENDPATH**/ ?>