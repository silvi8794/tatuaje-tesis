<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('front_end/js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/open-iconic-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/animate.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/magnific-popup.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/aos.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/ionicons.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/jquery.timepicker.css')); ?>">


    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/icomoon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front_end/css/style.css')); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">

    
    <link rel="stylesheet" href="<?php echo e(asset('js/lib/main.css')); ?>"/>

   <!-- Librery Toast -->
    <link href="<?php echo e(asset('css/toastr.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/sweetalert2.css')); ?>" rel="stylesheet">

</head>
<body>
    <div id="app">

        <?php echo $__env->yieldContent('navbar'); ?>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>


</body>
<footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Sobre nosotros</h2>
                    <p> Sould Tattoo permite a los fans encontrar el estudio de tatuajes o artista más cercano de su ciudad. Los fans podrán inspirarse gracias a las galerías de fotos clasificadas. Contamos con materiales 100% desechables e higiénicos. Miles de diseños y trabajo personalizado. Full color , black and gray , tribal, retratos, mariposas.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">¿TENGO QUE PEDIR TURNO?</h2>
                    <div class="block-21 mb-4 d-flex">
                        <div class="text">
                            <h3 class="heading">Para el caso de los tattoos, cuando se trate de diseños pequeños se realizan en el momento tambien (tratando de no venir sobre el horario de cierre del local), pero para diseños grandes es conveniente reservar un turno, para no correr el riesgo de venir hasta el local y que no haya ningun tatuador disponible.</h3>
                            
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">¿CÓMO DEBO HACER SI SOY MENOR DE 18 AÑOS?</h2>
                    <ul class="list-unstyled">
                        <li><a class="py-2 d-block">Los menores de 18 años, deberan venir acompañados por alguno de sus padres, y todos con DNI, para firmar la autorización correspondiente. </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">¿TIENES ALGUNA PREGUNTA?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">Av. Artigas 1294, 3400 Corrientes, Provincia de Corrientes, Argentina</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+54 379 446-5737</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">viccfantasma@gmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &ql.php?server=1&db=tatuaje_tesis&table=sexo_tatuajes&pos=0copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg>
    </div>


    <script src="<?php echo e(asset('front_end/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/jquery-migrate-3.0.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/jquery.stellar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/jquery.animateNumber.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/jquery.timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/scrollax.min.js')); ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="<?php echo e(asset('front_end/js/google-map.js')); ?>"></script>
    <script src="<?php echo e(asset('front_end/js/main.js')); ?>"></script>

    <script src="<?php echo e(asset('js/moment.js')); ?>"></script>
    
    <script src="<?php echo e(asset('js/lib/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/es.js')); ?>"></script>


    <script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/jquery.mask.js')); ?>"></script>


    <script>
        /* TOAST GENERAL */
      <?php if(Session::has('notification')): ?>

          var type = "<?php echo e(Session::get('notification.alert-type', 'info')); ?>";
          switch(type){
              case 'info':
                  toastr.info("<?php echo e(Session::get('notification.message')); ?>");
                  break;

              case 'warning':
                  toastr.warning("<?php echo e(Session::get('notification.message')); ?>");
                  break;
              case 'success':
                  toastr.success("<?php echo e(Session::get('notification.message')); ?>");
                  break;
              case 'error':
                  toastr.error("<?php echo e(Session::get('notification.message')); ?>");
                  break;
          }
      <?php endif; ?>
      </script>


        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "5000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

        </script>
        

    <?php echo $__env->yieldContent('scripts'); ?>
</html>
<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/cliente/layouts/app_client.blade.php ENDPATH**/ ?>