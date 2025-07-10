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
                                <a href="{{ route('ordenes.solicitud.status') }}" 
                                    class='submenu-link'>Status de Solicitud</a>
                                
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
                    <div class="submenu-group-wrapper">
                        
                        <ul class="submenu-group">
                            
                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Usuarios</a>
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.usuarios.crear.usuarios') }}" class="subsubmenu-link">Crear Usuario</a>
                                    </li>

                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.usuarios.registros.obtener') }}" class="subsubmenu-link">Lista de Usuarios</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Proovedores</a>
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.proveedores.agregar.proveedores') }}" class="subsubmenu-link">Agregar Proovedor</a>
                                    </li>

                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.proveedores.registros.obtener') }}" class="subsubmenu-link">Lista de Proveedores</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Empresas</a>
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.empresas.agregar.empresas') }}" class="subsubmenu-link">Agregar Empresa</a>
                                    </li>

                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.empresas.registros.obtener') }}" class="subsubmenu-link">Lista de Empresas</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Sucursales</a>
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.sucursales.agregar') }}" class="subsubmenu-link">Agregar Sucursal</a>
                                    </li>

                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.sucursales.registros') }}" class="subsubmenu-link">Lista de Sucursales</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Direcciones</a>
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.direcciones.agregar.direcciones') }}" class="subsubmenu-link">Agregar Dirección</a>
                                    </li>

                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.direcciones.registros.obtener') }}" class="subsubmenu-link">Lista de Direcciones</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Gerencias</a>
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.gerencias.agregar.gerencias') }}" class="subsubmenu-link">Agregar Gerencia</a>
                                    </li>

                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.gerencias.registros') }}" class="subsubmenu-link">Lista de Gerencias</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Departamentos</a>
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.departamentos.agregar.departamentos') }}" class="subsubmenu-link">Agregar Departamento</a>
                                    </li>

                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('gestiones.departamentos.registros.obtener') }}" class="subsubmenu-link">Lista de Departamentos</a>
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
    
@endpush
