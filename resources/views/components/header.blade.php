
<header class="mb-1">
    <div class="header-top">
        <div class="container">
            <div class="logo"> 
                <a href="/"><img src="{{asset('assets/compiled/svg/humanitas_gris.svg')}}" alt="Logo"></a>
            </div>
            <div class="header-top-right">
                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2" >
                            <img src="{{asset('assets/compiled/jpg/1.jpg')}}" alt="Avatar">
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name">Admin</h6>
                            <p class="user-dropdown-status text-sm text-muted">Usuario</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        <li><a class="dropdown-item" href="#">Mi Cuenta</a></li>
                        <li><a class="dropdown-item" href="#">Configuración</a></li>
                        <li><a class="dropdown-item" href="#">Cambiar Contraseña</a></li>
                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a  class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>

                            <form id="logout-form" action="{{ route('usuario.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    
    <x-navbar/>

</header>

@push('js')
    <!--Funcionalidad de Perfil de Usuario (Header) -->
    <script src="{{asset('assets/compiled/js/app.js')}}"></script>
@endpush