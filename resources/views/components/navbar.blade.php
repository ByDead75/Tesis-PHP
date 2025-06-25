<nav class="main-navbar active" >
    <div class="container">
        <ul>
            <li class="menu-item active">
                <a href="{{ url('dashboard') }}" class='menu-link'>
                    <span><i class="bi bi-grid-fill"></i> Dashboard</span>
                </a>
            </li>
            
            <li class="menu-item has-sub">
                <a href="#" class='menu-link'>
                    <span><i class="bi bi-stack"></i> Órdenes</span>
                </a>
                <div class="submenu">
                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                    <div class="submenu-group-wrapper">
                        
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="{{ route('ordenes.solicitud.crear') }}"
                                    class='submenu-link'>Crear Solicitud</a>
                                
                            </li>
                            
                            <li class="submenu-item">
                                <a href="{{ route('ordenes.solicitud.registros') }}"
                                    class='submenu-link'>Editar Solicitud</a>
                                
                            </li>

                            <li
                                class="submenu-item">
                                <a href="/#" class='submenu-link'>Cambiar Status de Solicitud</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </li>
            
            <li class="menu-item has-sub">
                <a href="#" class='menu-link'>
                    <span><i class="bi bi-grid-1x2-fill"></i> Registro Historico</span>
                </a>
                <div class="submenu">
                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                    <div class="submenu-group-wrapper">
                        
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="{{ route('historial.index') }}" class='submenu-link'>Historial</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            
            <li class="menu-item has-sub">
                <a href="#" class='menu-link'>
                    <span><i class="bi bi-file-earmark-medical-fill"></i> Gestiones</span>
                </a>
                <div class="submenu">
                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                    <div class="submenu-group-wrapper">
                        
                        <ul class="submenu-group">
                            
                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Usuarios</a>

                                <!-- 3 Level Submenu -->
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="/#" class="subsubmenu-link">Crear Usuario</a>
                                    </li>
                                    
                                    <li class="subsubmenu-item ">
                                        <a href="/#" class="subsubmenu-link">Editar Usuario</a>
                                    </li>
                                </ul>
                                
                            </li>
                            
                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Proovedores</a>
                                
                                <!-- 3 Level Submenu -->
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="/#" class="subsubmenu-link">Agregar Proovedor</a>
                                    </li>

                                    <li class="subsubmenu-item ">
                                        <a href="/#" class="subsubmenu-link">Editar Proovedor</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Departamentos</a>
                                
                                <!-- 3 Level Submenu -->
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="/#" class="subsubmenu-link">Agregar Departamento</a>
                                    </li>
                                    
                                    <li class="subsubmenu-item ">
                                        <a href="/#" class="subsubmenu-link">Editar Departamento</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Empresas</a>
                                
                                <!-- 3 Level Submenu -->
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="/#" class="subsubmenu-link">Agregar Empresa</a>
                                    </li>
                                    
                                    <li class="subsubmenu-item ">
                                        <a href="/#" class="subsubmenu-link">Editar Empresa</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

@push('js')
    <!--Funcionalidad de Perfil de Usuario (Navbar) -->
    <script src="{{asset('assets/compiled/js/app.js')}}"></script>
@endpush
