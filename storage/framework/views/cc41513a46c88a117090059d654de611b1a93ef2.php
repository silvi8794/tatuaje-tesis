
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


</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="/">Tatuajes</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="/" class="nav-link">Inicio</a></li>
                        <form action="/searchTatuaje" method="get">
                            <input type="text" style="background-color: white" name="inputSearch" class="inputSearch" placeholder="Buscar" aria-describedby="basic-addon2" maxlength="14" size="14" >
                            <button class="btn btn-outline-secondary buttonSearch"  type="submit"><i class="fas fa-search"></i></button>
                        </form>
                        <li class="nav-item"><a href="/#acercaDeNosotros" class="nav-link">Acerca de Nosotros</a></li>
                        <li class="nav-item"><a href="/#nuestrosTrabajos" class="nav-link">Nuestros Trabajos</a></li>
                        <li class="nav-item"><a href="/#comoCuidarse" class="nav-link">Como Cuidarse</a></li>
                        <li class="nav-item"><a href="/#contacto" class="nav-link">Contacto</a></li>


                        <?php if(Route::has('login')): ?>
                            <?php if(auth()->guard()->check()): ?>
                                <li class="nav-item"><a class="nav-link logoutBtn" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                    <span><?php echo e(__('Cerrar Sesion')); ?></span>
                                </a></li>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                        <?php else: ?>
                                
                                <li class="nav-item"><a href="/login" class="nav-link">Acceso al Sistema</a></li>

                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>


            </div>
        </nav>

        <main class="py-4">


<!--             <div class="container" style="margin-top: 200px">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"><?php echo e(__('Login')); ?></div>

                            <div class="card-body">
                                <form method="POST" action="<?php echo e(route('login')); ?>">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                                <label class="form-check-label" for="remember">
                                                    <?php echo e(__('Remember Me')); ?>

                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                <?php echo e(__('Login')); ?>

                                            </button>

                                            <?php if(Route::has('password.request')): ?>
                                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                                    <?php echo e(__('Forgot Your Password?')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->




            <div class="container" style="margin-top: 200px">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header styleCardLogin">

                                <div class="modal-header nav nav-tabs" id="tabContent">
                                            <div class="col-6">
                                                <a href="#" class="styleTagA" data-toggle="tab" onclick="functionAddClass('tabs-login')">Acceso al sistema</a>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href="#" class="styleTagA" data-toggle="tab" onclick="functionAddClass('tabs-register')">Registrarse</a>
                                            </div>
                                </div>


                            </div>

                            <div class="card-body styleCardLogin">



                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tabs-login" role="tabpanel" aria-labelledby="tabs-login-tab">
                                    <?php if($errors->any()): ?>

                                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php endif; ?>
                                    <form method="POST" action="/login" class="contact-form">
                                        <?php echo csrf_field(); ?>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right styleLabel"><?php echo e(__('E-Mail')); ?> </label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control login_11 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete ="email" autofocus >


                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right styleLabel"><?php echo e(__('Contraseña')); ?></label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                                            </div>
                                        </div>



                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn colorButton">
                                                    <?php echo e(__('Iniciar Sesión')); ?>

                                                </button>

                                                <?php if(Route::has('password.request')): ?>
                                                    <a class="btn btn-link styleTagA" href="<?php echo e(route('password.request')); ?>">
                                                        <?php echo e(__('¿Olvidaste tu contraseña?')); ?>

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </form>





                                </div>
                                <div class="tab-pane fade" id="tabs-register" role="tabpanel" aria-labelledby="tabs-register-tab">
                                    <form method="POST" action="<?php echo e(route('register')); ?>" class="contact-form">
                                        <?php echo csrf_field(); ?>


                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right styleLabel"><?php echo e(__('E-Mail')); ?></label>

                                            <div class="col-md-6">
                                                <input id="email" type="email"  maxlength="40" size="40" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right styleLabel"><?php echo e(__('Contraseña')); ?></label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right styleLabel"><?php echo e(__('Confirmar Contraseña')); ?></label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="nombre" class="col-md-4 col-form-label text-md-right styleLabel"><?php echo e(__('Nombre')); ?></label>

                                            <div class="col-md-6">
                                                <input id="nombre" type="text" class="form-control" name="nombre" maxlength="30" size="30" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="apellido" class="col-md-4 col-form-label text-md-right styleLabel"><?php echo e(__('Apellido')); ?></label>

                                            <div class="col-md-6">
                                                <input id="apellido" type="text" class="form-control" name="apellido" maxlength="40" size="40" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="dni" class="col-md-4 col-form-label text-md-right styleLabel"><?php echo e(__('Dni')); ?></label>

                                            <div class="col-md-6">
                                                <input id="dni" type="text" class="form-control" name="dni" maxlength="10" size="8" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="selectSexo" class="col-md-4 col-form-label text-md-right styleLabel"><?php echo e(__('Sexo')); ?></label>

                                            <div class="col-md-6">
                                                <select name="selectSexo" id="selectSexo" class="form-control" style="color: black" required>
                                                    <option style="color: black" value="" selected>Seleccione</option>
                                                    <?php $__currentLoopData = $sexos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sexo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option style="color: black" <?php echo e(old('selectSexo') == $sexo->id ? 'selected' : ''); ?> value="<?php echo e($sexo->id); ?>"> <?php echo e($sexo->nombre); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('selectSexo')): ?>
                                                    <p class="text-danger"><?php echo e($errors->first('selectSexo')); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="selectLocalidad" class="col-md-4 col-form-label text-md-right styleLabel"><?php echo e(__('Localidad')); ?></label>

                                            <div class="col-md-6">
                                                <select name="selectLocalidad" id="selectLocalidad" class="form-control" onchange="buscarProvincia()" required>
                                                    <option style="color: black" value="" selected>Seleccione</option>
                                                    <?php $__currentLoopData = $localidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option style="color: black" <?php echo e(old('selectLocalidad') == $localidad->id ? 'selected' : ''); ?> value="<?php echo e($localidad->id); ?>"  > <?php echo e($localidad->nombre); ?> - <?php echo e($localidad->provincia->nombre); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                    <?php if($errors->has('selectLocalidad')): ?>
                                                        <p class="text-danger"><?php echo e($errors->first('selectLocalidad')); ?></p>
                                                    <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="provincia" class="col-md-4 col-form-label text-md-right styleLabel"><?php echo e(__('Provincia')); ?></label>

                                            <div class="col-md-6">
                                                <input type="text" id="inputProvincia" disabled class="form-control">
                                            </div>
                                        </div>



                                        <div class="form-group row mb-0 mt-5">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn colorButton">
                                                    <?php echo e(__('Registrarse')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>



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
<script src="<?php echo e(asset('js/jquery.mask.js')); ?>"></script>
</body>

    <script>
        function functionAddClass(idSelector){
            $(`#tabs-login, #tabs-register`).removeClass(' show active');
            $(`#${idSelector}`).addClass(' show active');
        }
    </script>




<script>
    function buscarProvincia(){
        let idLocalidad = $('#selectLocalidad').val();
        if(idLocalidad != ''){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/buscar/provincia',
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
        $('#dni').mask('00000000');

    });
</script>





</html>
<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views//auth/login.blade.php ENDPATH**/ ?>