<?php $__env->startSection('content'); ?>
<section class="ftco-section">
                <?php if((!empty($tatuajesCategorias)) && (!empty($tatuajesLugares))): ?>

                    <?php if((count($tatuajesCategorias)<=0) && (count($tatuajesLugares)<=0)): ?>
                    <div class="container">
                        <span>Lo sentimos no existen Categorias o Lugares con la palabra: <?php echo e($search); ?></span>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>


                <?php if(!empty($tatuajesCategorias)): ?>
                    <?php if(count($tatuajesCategorias)>0): ?>
                <div class="container">
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-7 heading-section text-center ftco-animate">
                            <h2 class="mb-3">Por Categoria</h2>
                        </div>
                    </div>
                    <div class="row no-gutters">

                            <?php $__currentLoopData = $tatuajesCategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemTatuCate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="col-lg-6 mt-5 mb-5 d-flex">
                                <div class="coach d-sm-flex align-items-stretch">
                                    <?php if(!@empty($itemTatuCate->imagen)): ?>
                                        <div class="img" style="background-image: url(<?php echo e($itemTatuCate->imagen); ?>) "></div>
                                    <?php else: ?>
                                        <div class="img order-xl-last" style="background-image: url(image/images/trainer-3.jpg);"></div>
                                    <?php endif; ?>
                                    <div class="text py-4 px-5 ftco-animate">
                                        <span class="subheading">Tatuaje</span>
                                        <h3><a href="#"><?php echo e($itemTatuCate->nombre); ?></a></h3>
                                        <p><span class="subTitle">Descripción:  <?php echo e($itemTatuCate->descripcion); ?> </span></p>
                                        <!-- <p><span class="subTitle">Tamaño:  <?php echo e($itemTatuCate->tamaño); ?> </span></p> -->
                                        <p><span class="subTitle">Fuente: <?php echo e($itemTatuCate->fuente); ?></span></p>
                                        <p><span class="subTitle">Categoria
                                            <ul>
                                                <?php $__currentLoopData = $itemTatuCate->categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemCategoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($itemCategoria->nombre); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            </span>
                                        </p>
                                        <p><span class="subTitle">Sexo
                                            <ul>
                                                <?php $__currentLoopData = $itemTatuCate->sexos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemSexo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($itemSexo->nombre); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            </span>
                                        </p>

                                        <!-- <ul class="ftco-social-media d-flex mt-4">
                                            <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a></li>
                                        </ul> -->
                                            
                                    </div>
                                </div>
                            </div>





                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>
                    </div>

                        <?php endif; ?>
                <?php endif; ?>
                <?php if(!empty($tatuajesLugares)): ?>
                    <?php if(count($tatuajesLugares)>0): ?>
                    <div class="container">
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-7 heading-section text-center ftco-animate">
                                <h2 class="mb-3">Por Lugar</h2>
                            </div>
                        </div>
                        <div class="row no-gutters">



                            <?php $__currentLoopData = $tatuajesLugares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tatuaje): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6 mt-5 mb-5 d-flex">
                                        <div class="coach d-sm-flex align-items-stretch">
                                            <?php if(!@empty($tatuaje->imagen)): ?>
                                                <div class="img" style="background-image: url(<?php echo e($tatuaje->imagen); ?>) "></div>
                                            <?php else: ?>
                                                <div class="img order-xl-last" style="background-image: url(image/images/trainer-3.jpg);"></div>
                                            <?php endif; ?>
                                            <div class="text py-4 px-5 ftco-animate">
                                                <span class="subheading">Tatuaje</span>
                                                <h3><a href="#"><?php echo e($tatuaje->nombre); ?></a></h3>
                                                <p><span class="subTitle">Descripción:  <?php echo e($tatuaje->descripcion); ?> </span></p>
                                               <!--  <p><span class="subTitle">Tamaño:  <?php echo e($tatuaje->tamaño); ?> </span></p> -->
                                                <p><span class="subTitle">Fuente: <?php echo e($tatuaje->fuente); ?></span></p>

                                                <p><span class="subTitle">Sexo
                                                    <ul>
                                                        <?php $__currentLoopData = $tatuaje->sexos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemSexo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($itemSexo->nombre); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    </span>
                                                </p>
                                                <p><span class="subTitle">Lugares
                                                    <ul>
                                                        <?php $__currentLoopData = $tatuaje->lugares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemLugar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($itemLugar->nombre); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    </span>
                                                </p>
                                                <!-- <ul class="ftco-social-media d-flex mt-4">
                                                    <li class="ftco-animate"><a href="#" class="mr-2 d-flex justify-content-center align-items-center"><span class="icon-twitter"></span></a></li>
                                                </ul> -->
                                                    <p></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <?php endif; ?>
                        <?php endif; ?>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('cliente.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('cliente.layouts.app_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/cliente/tatuaje/index.blade.php ENDPATH**/ ?>