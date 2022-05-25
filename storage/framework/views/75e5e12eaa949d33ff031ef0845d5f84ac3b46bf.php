<?php $__env->startSection('menu_slider'); ?>



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#0c2f43;">
    <!-- Brand Logo -->
    <a href="index3.html" data-widget="pushmenu" class="brand-link">
      <!-- <img src="<?php echo e(asset('dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="color: #86bce0; ont-family: Roboto; " > <Strong>Tatuador</Strong> </span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info ">
            <?php if(session('dataUser')===null): ?>
                <a href="#" class="d-block "  style="color: #86bce0;">Administrador</a>
            <?php else: ?>

                <a href="#" class="d-block "  style="color: #86bce0;"><?php echo e(session('dataUser')->apellido); ?>, <?php echo e(session('dataUser')->nombre); ?></a>
            <?php endif; ?>
        </div>

            <!-- <a href="#" class="d-block"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">    <path d="M 10.490234 2 C 10.011234 2 9.6017656 2.3385938 9.5097656 2.8085938 L 9.1757812 4.5234375 C 8.3550224 4.8338012 7.5961042 5.2674041 6.9296875 5.8144531 L 5.2851562 5.2480469 C 4.8321563 5.0920469 4.33375 5.2793594 4.09375 5.6933594 L 2.5859375 8.3066406 C 2.3469375 8.7216406 2.4339219 9.2485 2.7949219 9.5625 L 4.1132812 10.708984 C 4.0447181 11.130337 4 11.559284 4 12 C 4 12.440716 4.0447181 12.869663 4.1132812 13.291016 L 2.7949219 14.4375 C 2.4339219 14.7515 2.3469375 15.278359 2.5859375 15.693359 L 4.09375 18.306641 C 4.33275 18.721641 4.8321562 18.908906 5.2851562 18.753906 L 6.9296875 18.1875 C 7.5958842 18.734206 8.3553934 19.166339 9.1757812 19.476562 L 9.5097656 21.191406 C 9.6017656 21.661406 10.011234 22 10.490234 22 L 13.509766 22 C 13.988766 22 14.398234 21.661406 14.490234 21.191406 L 14.824219 19.476562 C 15.644978 19.166199 16.403896 18.732596 17.070312 18.185547 L 18.714844 18.751953 C 19.167844 18.907953 19.66625 18.721641 19.90625 18.306641 L 21.414062 15.691406 C 21.653063 15.276406 21.566078 14.7515 21.205078 14.4375 L 19.886719 13.291016 C 19.955282 12.869663 20 12.440716 20 12 C 20 11.559284 19.955282 11.130337 19.886719 10.708984 L 21.205078 9.5625 C 21.566078 9.2485 21.653063 8.7216406 21.414062 8.3066406 L 19.90625 5.6933594 C 19.66725 5.2783594 19.167844 5.0910937 18.714844 5.2460938 L 17.070312 5.8125 C 16.404116 5.2657937 15.644607 4.8336609 14.824219 4.5234375 L 14.490234 2.8085938 C 14.398234 2.3385937 13.988766 2 13.509766 2 L 10.490234 2 z M 12 8 C 14.209 8 16 9.791 16 12 C 16 14.209 14.209 16 12 16 C 9.791 16 8 14.209 8 12 C 8 9.791 9.791 8 12 8 z"/></svg> -->




      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">




                <!--   I commented this because i wasnt sure if we were going to usit  in the future  <li class="nav-header"><a href="<?php echo e(route('home')); ?>" class="nav-link">Personal Administration</a></li> -->





<!-- home -->
             <!-- <li class="nav-item has-treeview">
              <a href="/home" class="nav-link">
                <p id="menuText">
                  Inicio
                </p>
              </a>

            </li> -->

            <?php if(auth()->user()->tipouser_id===1): ?>

          <li class="nav-item has-treeview <?php echo e(request()->is('admin*')? 'menu-open':''); ?>">
              <a href="#" class="nav-link">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="#86bce0" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
              </svg>
              <p id="menuText">
                  Administrador
                <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <!-- <li class="nav-item <?php echo e(request()->is('admin/create')? 'active':''); ?>">
                    <a href="<?php echo e(route('admin.create')); ?>" class="nav-link <?php echo e(request()->is('admin/create')? 'active':''); ?>">
                    <p id="menuText">Crear</p>
                  </a>
                </li>
 -->
                <li class="nav-item <?php echo e(request()->is('admin/index')? 'active':''); ?>">
                  <a href="<?php echo e(route('admin.index')); ?>" class="nav-link <?php echo e(request()->is('admin/index')? 'active':''); ?>">
                    <p id="menuText">Listar</p>
                  </a>
                </li>
                <li class="nav-item <?php echo e(request()->is('admin/restoreList')? 'active':''); ?>">
                  <a href="<?php echo e(route('admin.restoreList')); ?>" class="nav-link <?php echo e(request()->is('admin/restoreList')? 'active':''); ?>">
                    <p id="menuText">Recuperar Administrador</p>
                  </a>
                </li>

              </ul>
            </li>

          <li class="nav-item has-treeview <?php echo e(request()->is('user*')? 'menu-open':''); ?>">
              <a href="#" class="nav-link">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="#86bce0" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
              </svg>
              <p id="menuText">
                  Tatuadores
                <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
               <!--  <li class="nav-item <?php echo e(request()->is('users/create')? 'active':''); ?>">
                    <a href="<?php echo e(route('users.create')); ?>" class="nav-link <?php echo e(request()->is('users/create')? 'active':''); ?>">
                    <p id="menuText">Crear</p>
                  </a>
                </li> -->

                <li class="nav-item <?php echo e(request()->is('users/index')? 'active':''); ?>">
                  <a href="<?php echo e(route('users.index')); ?>" class="nav-link <?php echo e(request()->is('users/index')? 'active':''); ?>">
                    <p id="menuText">Listar</p>
                  </a>
                </li>
                <li class="nav-item <?php echo e(request()->is('users/restoreList')? 'active':''); ?>">
                  <a href="<?php echo e(route('users.restoreList')); ?>" class="nav-link <?php echo e(request()->is('users/restoreList')? 'active':''); ?>">
                    <p id="menuText">Recuperar Tatuador</p>
                  </a>
                </li>

              </ul>
            </li>
          <li class="nav-item has-treeview <?php echo e(request()->is('sucursal*')? 'menu-open':''); ?>">
              <a href="#" class="nav-link">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="#86bce0" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
              </svg>
              <p id="menuText">
                  Sucursales
                <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
               <!--  <li class="nav-item <?php echo e(request()->is('sucursal/create')? 'active':''); ?>">
                    <a href="<?php echo e(route('sucursal.create')); ?>" class="nav-link <?php echo e(request()->is('sucursal/create')? 'active':''); ?>">
                    <p id="menuText">Crear</p>
                  </a>
                </li> -->

                <li class="nav-item <?php echo e(request()->is('sucursal/index')? 'active':''); ?>">
                  <a href="<?php echo e(route('sucursal.index')); ?>" class="nav-link <?php echo e(request()->is('sucursal/index')? 'active':''); ?>">
                    <p id="menuText">Listar</p>
                  </a>
                </li>
                <li class="nav-item <?php echo e(request()->is('sucursal/restoreList')? 'active':''); ?>">
                  <a href="<?php echo e(route('sucursal.restoreList')); ?>" class="nav-link <?php echo e(request()->is('sucursal/restoreList')? 'active':''); ?>">
                    <p id="menuText">Recuperar Sucursal</p>
                  </a>
                </li>


              </ul>
            </li>



            <li class="nav-item has-treeview <?php echo e(request()->is('categoria*')? 'menu-open':''); ?>">
              <a href="#" class="nav-link">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="#86bce0" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
              </svg>
              <p id="menuText">
                  Categorias
                <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <!-- <li class="nav-item <?php echo e(request()->is('categoria/create')? 'active':''); ?>">
                    <a href="<?php echo e(route('categoria.create')); ?>" class="nav-link <?php echo e(request()->is('categoria/create')? 'active':''); ?>">
                    <p id="menuText">Crear</p>
                  </a>
                </li> -->

                <li class="nav-item <?php echo e(request()->is('categoria/index')? 'active':''); ?>">
                  <a href="<?php echo e(route('categoria.index')); ?>" class="nav-link <?php echo e(request()->is('categoria/index')? 'active':''); ?>">
                    <p id="menuText">Listar</p>
                  </a>
                </li>

                <li class="nav-item <?php echo e(request()->is('categoria/restoreList')? 'active':''); ?>">
                  <a href="<?php echo e(route('categoria.restoreList')); ?>" class="nav-link <?php echo e(request()->is('categoria/restoreList')? 'active':''); ?>">
                    <p id="menuText">Recuperar Categoria</p>
                  </a>
                </li>

              </ul>
            </li>




            <li class="nav-item has-treeview <?php echo e(request()->is('lugar*')? 'menu-open':''); ?>">
              <a href="#" class="nav-link">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="#86bce0" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
              </svg>
              <p id="menuText">
                  Lugares
                <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <!-- <li class="nav-item <?php echo e(request()->is('lugar/create')? 'active':''); ?>">
                    <a href="<?php echo e(route('lugar.create')); ?>" class="nav-link <?php echo e(request()->is('lugar/create')? 'active':''); ?>">
                    <p id="menuText">Crear</p>
                  </a>
                </li> -->

                <li class="nav-item <?php echo e(request()->is('lugar/index')? 'active':''); ?>">
                  <a href="<?php echo e(route('lugar.index')); ?>" class="nav-link <?php echo e(request()->is('lugar/index')? 'active':''); ?>">
                    <p id="menuText">Listar</p>
                  </a>
                </li>

                <li class="nav-item <?php echo e(request()->is('lugar/restoreList')? 'active':''); ?>">
                  <a href="<?php echo e(route('lugar.restoreList')); ?>" class="nav-link <?php echo e(request()->is('lugar/restoreList')? 'active':''); ?>">
                    <p id="menuText">Recuperar Lugar</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item has-treeview <?php echo e(request()->is('tatuaje*')? 'menu-open':''); ?>">
                <a href="#" class="nav-link">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="#86bce0" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                </svg>
                <p id="menuText">
                    Tatuajes
                  <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                 <!--  <li class="nav-item <?php echo e(request()->is('tatuaje/create')? 'active':''); ?>">
                      <a href="<?php echo e(route('tatuaje.create')); ?>" class="nav-link <?php echo e(request()->is('tatuaje/create')? 'active':''); ?>">
                      <p id="menuText">Crear</p>
                    </a>
                  </li> -->

                  <li class="nav-item <?php echo e(request()->is('tatuaje/index')? 'active':''); ?>">
                    <a href="<?php echo e(route('tatuaje.index')); ?>" class="nav-link <?php echo e(request()->is('tatuaje/index')? 'active':''); ?>">
                      <p id="menuText">Listar</p>
                    </a>
                  </li>
                </ul>
              </li>


            <?php endif; ?>
            <?php if(auth()->user()->tipouser_id===2): ?>
            <li class="nav-item has-treeview <?php echo e(request()->is('tatuador*')? 'menu-open':''); ?>">
                <a href="#" class="nav-link">
                    <i class="fas fa-user"></i>
                <p id="menuText">
                    Perfil
                  <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">

                  <li class="nav-item <?php echo e(request()->is('tatuador/edit')? 'active':''); ?>">
                    <a href="<?php echo e(route('tatuador.edit')); ?>" class="nav-link <?php echo e(request()->is('tatuador/edit')? 'active':''); ?>">
                      <p id="menuText">Editar</p>
                    </a>
                  </li>
                </ul>
              </li>
            <li class="nav-item has-treeview <?php echo e(request()->is('tatuador*')? 'menu-open':''); ?>">
                <a href="#" class="nav-link">
                    <i class="far fa-calendar-alt"></i>
                <p id="menuText">
                    Turnos Asignados
                  <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item <?php echo e(request()->is('tatuador/index')? 'active':''); ?>">
                        <a href="<?php echo e(route('tatuador.index')); ?>" class="nav-link <?php echo e(request()->is('tatuador/index')? 'active':''); ?>">
                          <p id="menuText">Listar Turnos Pendientes</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(request()->is('tatuador/turnosAtendidos')? 'active':''); ?>">
                        <a href="<?php echo e(route('tatuador.turnosAtendidos')); ?>" class="nav-link <?php echo e(request()->is('tatuador/turnosAtendidos')? 'active':''); ?>">
                          <p id="menuText">Listar Turnos Atendidos</p>
                        </a>
                      </li>
                </ul>
              </li>
            <?php endif; ?>

             
             <li class="nav-item has-treeview">

                <a class="nav-link logoutBtn" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-bar-right" fill="#86bce0" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z"/>
                      <path fill-rule="evenodd" d="M6 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H6.5A.5.5 0 0 1 6 8zm-2.5 6a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 1 0v11a.5.5 0 0 1-.5.5z"/>
                    </svg>
                                         <p id="menuText"><?php echo e(__('Salir')); ?></p>
                        </a>

                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                          <?php echo csrf_field(); ?>
                      </form>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\tatuajes_tesis\resources\views/administracion/menu/menu.blade.php ENDPATH**/ ?>