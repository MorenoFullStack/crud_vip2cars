<header class="bg-black text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('vehiculos.index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="VIP2CARS" class="logo-img">
        </a>
        <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('vehiculos.index') }}">Vehículos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('contactos.contactos-list') }}">Contactos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end ms-0 p-2" aria-labelledby="navbarDropdown">
                        @if(session('user'))
                            <li>
                                <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                </form>
                            </li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">Iniciar sesión</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header