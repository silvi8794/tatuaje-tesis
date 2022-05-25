<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')); ?>">

    <!-- jsGrid -->
    

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')); ?>">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">

    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.css')); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/jqvmap/jqvmap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.css')); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">





    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

    <!-- Librery Toast -->
    <link href="<?php echo e(asset('css/toastr.min.css')); ?>" rel="stylesheet">

    
    <link href="<?php echo e(asset('css/strength.css')); ?>" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href=""<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.tagsinput.min.css')); ?>">

    <link href="<?php echo e(asset('css/sweetalert2.css')); ?>" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">

  

        <main class="py-4">
            <div class="wrapper">
                <?php echo $__env->yieldContent('navbar'); ?>

                <?php echo $__env->yieldContent('menu_slider'); ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>




    <footer class="main-footer">
        <?php echo $__env->yieldContent('footerCaldwell'); ?>
    </footer>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->





    <!-- jQuery -->
    <script src="<?php echo e(asset('plugins/jquery/jquery.js')); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>



        <!-- Bootstrap 4 -->
        <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.js')); ?>"></script>
        <!-- ChartJS -->
        <script src="<?php echo e(asset('plugins/chart.js/Chart.min.js')); ?>"></script>
        <!-- Sparkline -->
        <script src="<?php echo e(asset('plugins/sparklines/sparkline.js')); ?>"></script>
        <!-- JQVMap -->
        <script src="<?php echo e(asset('plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo e(asset('plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
        <!-- daterangepicker -->
        <script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>


        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>

        <!-- Select2 -->
        <script src="<?php echo e(asset('plugins/select2/js/select2.full.min.js')); ?>"></script>

        <!-- Bootstrap Switch -->
        <script src="<?php echo e(asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>"></script>

        <!-- Summernote -->
        <script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo e(asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

        <!-- AdminLTE for demo purposes -->



        <!-- InputMask -->
        <script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')); ?>"></script>

        <script src="<?php echo e(asset('js/jquery.mask.js')); ?>"></script>


        <!-- date-range-picker -->
        <script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>

        <script src="<?php echo e(asset('js/toastr.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/moment.js')); ?>"></script>

        <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>

        
        <script src="<?php echo e(asset('js/strength.js')); ?>"></script>

        <!-- DataTables -->
        <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')); ?>"></script>

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



@toastr_js
@toastr_render



        <?php echo $__env->yieldContent('scripts'); ?>




</body>
</html>



<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/layouts/app.blade.php ENDPATH**/ ?>