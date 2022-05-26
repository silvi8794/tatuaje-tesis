 <?php $__env->startSection('navbar'); ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Tatuajes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="<?php echo e(url('/home')); ?>" class="nav-link">Inicio</a></li>
                <form action="/searchTatuaje" method="get">
                    <input type="text" name="inputSearch" class="inputSearch" placeholder="Buscar" aria-describedby="basic-addon2" maxlength="14" size="14">
                    <button class="btn btn-outline-secondary buttonSearch" type="submit"><i class="fas fa-search"></i></button>
                </form>

                <!-- target="_blank" dentro del href p q se abra en otra pestaña -->
                <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item"><a href="home/#nuestrosTrabajos" class="nav-link">Nuestros Trabajos</a></li>
                        <li class="nav-item"><a href="/#comoCuidarse" class="nav-link">Como Cuidarse</a></li>
                        <li class="nav-item"><a href="/turnos/turno" class="nav-link">Turno</a> </li> 
                        <li class="nav-item"><a href="/users_cli/editar" class="nav-link">Perfil</a></li>
                        <li class="nav-item">
                            <a class="nav-link logoutBtn" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                <span><?php echo e(__('Cerrar Sesion')); ?></span>
                            </a>
                        </li>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                <?php else: ?>
                        <li class="nav-item"><a href="/#acercaDeNosotros" class="nav-link">Acerca de Nosotros</a></li>
                        <li class="nav-item"><a href="/#nuestrosTrabajos" class="nav-link">Nuestros Trabajos</a></li>
                        <li class="nav-item"><a href="/#comoCuidarse" class="nav-link">Como Cuidarse</a></li>
                        <li class="nav-item"><a href="/#contacto" class="nav-link">Contacto</a></li>
                        
                        <li class="nav-item"><a href="/login" class="nav-link">Acceso al Sistema</a></li>

                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>


    </div>
</nav>

<?php $__env->stopSection(); ?>

<?php /**PATH C:\laragon\www\tatuaje-tesis\resources\views/cliente/navbar/navbar.blade.php ENDPATH**/ ?>