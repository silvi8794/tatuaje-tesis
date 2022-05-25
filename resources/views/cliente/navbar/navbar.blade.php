 @section('navbar')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Tatuajes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link">Inicio</a></li>
                <form action="/searchTatuaje" method="get">
                    <input type="text" name="inputSearch" class="inputSearch" placeholder="Buscar" aria-describedby="basic-addon2" maxlength="14" size="14">
                    <button class="btn btn-outline-secondary buttonSearch" type="submit"><i class="fas fa-search"></i></button>
                </form>

                <!-- target="_blank" dentro del href p q se abra en otra pestaña -->
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a href="home/#nuestrosTrabajos" class="nav-link">Nuestros Trabajos</a></li>
                        <li class="nav-item"><a href="/#comoCuidarse" class="nav-link">Como Cuidarse</a></li>
                        <li class="nav-item"><a href="/turnos/turno" class="nav-link">Turno</a> </li> 
                        <li class="nav-item"><a href="/users_cli/editar" class="nav-link">Perfil</a></li>
                        <li class="nav-item">
                            <a class="nav-link logoutBtn" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                <span>{{ __('Cerrar Sesion') }}</span>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                @else
                        <li class="nav-item"><a href="/#acercaDeNosotros" class="nav-link">Acerca de Nosotros</a></li>
                        <li class="nav-item"><a href="/#nuestrosTrabajos" class="nav-link">Nuestros Trabajos</a></li>
                        <li class="nav-item"><a href="/#comoCuidarse" class="nav-link">Como Cuidarse</a></li>
                        <li class="nav-item"><a href="/#contacto" class="nav-link">Contacto</a></li>
                        {{-- <li class="nav-item"><a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#exampleModal">Acceso al Sistema</a></li> --}}
                        <li class="nav-item"><a href="/login" class="nav-link">Acceso al Sistema</a></li>

                    @endauth
                @endif
            </ul>
        </div>


    </div>
</nav>

@endsection

