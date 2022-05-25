<!-- Modal Views-->
<div class="modal fade" id="showTurno<?php echo e($turno->id); ?>"  tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header headerModel borderHeader">
                Cliente
            </div>
            <div class="modal-body">


                        <div class="row" style="margin-top: 0px !important;">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                            </div>
                            <div class="col-4">
                                <?php if(!empty($turno->cliente->nombre)): ?>
                                    <input type="text" class="form-control colorInput" value="<?php echo e($turno->cliente->nombre); ?>" disabled>
                                <?php else: ?>
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                <?php endif; ?>


                            </div>
                            <div class="col-2" style="text-align: right;">
                                <label class="col-form-label colorLabel">Apellido</label>
                            </div>
                            <div class="col-3" style="text-align: left;">
                                <?php if(!empty($turno->cliente->apellido)): ?>
                                    <input type="text" class="form-control colorInput" value="<?php echo e($turno->cliente->apellido); ?>" disabled>
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
                                    <?php if((!empty($turno->cliente->email))): ?>
                                        <input type="text" class="form-control colorInput" value="<?php echo e($turno->cliente->email); ?>" disabled>
                                    <?php else: ?>
                                        <input type="text" class="form-control colorInput" value="" disabled>
                                    <?php endif; ?>

                                </div>

                                <div class="col-2" style="text-align: right;">
                                    <label class="col-form-label colorLabel">DNI</label>
                                </div>
                                <div class="col-3" style="text-align: left;">
                                    <?php if(!empty($turno->cliente->dni)): ?>
                                        <input type="text" class="form-control colorInput" value="<?php echo e($turno->cliente->dni); ?>" disabled>
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
<!-- Modal Views-->
<div class="modal fade" id="showAtencion<?php echo e($turno->id); ?>"  tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

                <div class="modal-header headerModel borderHeader">
                    Atencion del Cliente
                </div>


                <div class="modal-body">

                        <div class="row" style="margin-top: 0px !important;">
                            <div class="col-2" style="text-align: right;">
                                <label for="title" class="col-form-label text-right colorLabel">Nombre</label>
                            </div>
                            <div class="col-4">
                                <?php if(!empty($turno->cliente->nombre)): ?>
                                    <input type="text" class="form-control colorInput" value="<?php echo e($turno->cliente->nombre); ?>" disabled>
                                <?php else: ?>
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                <?php endif; ?>


                            </div>
                            <div class="col-2" style="text-align: right;">
                                <label class="col-form-label colorLabel">Apellido</label>
                            </div>
                            <div class="col-3" style="text-align: left;">
                                <?php if(!empty($turno->cliente->apellido)): ?>
                                    <input type="text" class="form-control colorInput" value="<?php echo e($turno->cliente->apellido); ?>" disabled>
                                <?php else: ?>
                                    <input type="text" class="form-control colorInput" value="" disabled>
                                <?php endif; ?>

                            </div>
                        </div>






            <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal" onclick="atenderTurno(<?php echo e($turno); ?>)">Atendido</button>
                   <!--
                    <button class="btn btn-primary" type="button" data-dismiss="modal" onclick="atenderTurno(<?php echo e($turno->id); ?>)">Atendido</button> -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>
<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/tatuador/partials/actions.blade.php ENDPATH**/ ?>