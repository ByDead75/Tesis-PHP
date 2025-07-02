@extends('template')

@section('title', 'Crear Usuario')

@push('css')
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
@endpush

@section('content')
    <div id="main-content" class="">
        <div>
            <h2 class="card-title text-center mb-4 pb-2">Registro de Nuevos Usuarios</h2>
        </div>
        <form class="form">
            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <div class="col-md-8 col-12 mx-auto">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-vertical">
                                        <div class="form-body">

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nombre_apellido_usuario">Nombre y Apellido</label>
                                                        <input type="text" id="nombre_apellido_usuario" class="form-control"
                                                            name="nombre_apellido_usuario" placeholder="Ingrese el Nombre y Apellido del usuario">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="cedula">Cedula</label>
                                                        <input type="text" id="cedula" class="form-control"
                                                            name="cedula" placeholder="Ingrese la cédula del usuario">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fecha_nacimiento">Fecha de Nacimiento</label>
                                                        <input type="date" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fecha_ingreso">Fecha de Ingreso</label>
                                                        <input type="date" id="fecha_ingreso" class="form-control" name="fecha_ingreso">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="empresa">Empresa</label>
                                                        <input type="text" id="empresa" class="form-control"
                                                            name="empresa" placeholder="Click para seleccionar su Empresa">
                                                        <input type="hidden" id="empresa_codigo" class="form-control"  name="empresa_codigo">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="sucursal">Sucursal</label>
                                                        <input type="text" id="sucursal" class="form-control"
                                                            name="sucursal" placeholder="Click para seleccionar su Sucursal">
                                                            <input type="hidden" id="sucursal_codigo" class="form-control"  name="sucursal_codigo">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="direccion">Dirección</label>
                                                        <input type="text" id="direccion" class="form-control"
                                                            name="direccion" placeholder="Click para seleccionar su Dirección">
                                                            <input type="hidden" id="direccion_codigo" class="form-control"  name="direccion_codigo">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="gerencia">Gerencia</label>
                                                        <input type="text" id="gerencia" class="form-control"
                                                            name="gerencia" placeholder="Click para seleccionar su Gerencia">
                                                        <input type="hidden" id="gerencia_codigo" class="form-control"  name="gerencia_codigo">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="departamento">Departamento</label>
                                                        <input type="text" id="departamento" class="form-control"
                                                            name="departamento" placeholder="Click para seleccionar su Departamento">
                                                        <input type="hidden" id="departamento_codigo" class="form-control"  name="departamento_codigo">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="centro_costo">Centro de Costo</label>
                                                        <input type="text" id="centro_costo" class="form-control"
                                                            name="centro_costo" placeholder="Click para seleccionar su Centro de Costo">
                                                        <input type="hidden" id="centro_costo_codigo" class="form-control" name="centro_costo_codigo">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_master">Cargo</label>
                                                        <select class="form-select" id="user_master">
                                                            <option value="">---</option>
                                                            <option value="0">Empleado</option>
                                                            <option value="1">Supervisor</option>
                                                            <option value="2">Gerente</option>
                                                            <option value="3">Administrador</option>
                                                            <option value="4">---</option>
                                                            <option value="6">---</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="tipo_usuario">Tipo de Usuario</label>
                                                        <select class="form-select" id="tipo_usuario">
                                                            <option value="">---</option>
                                                            <option value="1">Empleado</option>
                                                            <option value="2">Supervisor</option>
                                                            <option value="3">Gerente</option>
                                                            <option value="4">Administrador</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="password-vertical">Contraseña</label>
                                                        <input type="password" id="password" class="form-control"
                                                            name="contact" placeholder="Ingrese la Contraseña">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="password-vertical">Confirmar Contraseña</label>
                                                        <input type="password" id="password_confirmar" class="form-control"
                                                            name="contact" placeholder="Confirme la Contraseña">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-12 d-flex justify-content-end offset-md-4 col-md-8">
                                                    <button type="button" class="btn btn-secondary me-1 mb-1" id="btn_regresar" name="btn_regresar">Regresar</button>
                                                    <button type="submit"class="btn btn-primary me-1 mb-1">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>

    @include('components.modal')

@endsection

@push('js')
    <script src="{{asset('assets/compiled/js/empresas_modal.js')}}"></script>
    <script src="{{asset('assets/compiled/js/sucursales_modal.js')}}"></script>
    <script src="{{asset('assets/compiled/js/direccion_modal.js')}}"></script>
    <script src="{{asset('assets/compiled/js/gerencia_modal.js')}}"></script>
    <script src="{{asset('assets/compiled/js/departamento_modal.js')}}"></script>
    <script src="{{asset('assets/compiled/js/centro_costo_modal.js')}}"></script>
nombre_apellido_usuario, fecha_nacimiento, fecha_ingreso, empresa, sucursal, 
direccion, gerencia, departamento, centro_costo, user_master, tipo_usuario, 
    <script>
    $('#crearUsuario').validate({
        rules: { // <-- Alertas para cada input según su ID
            nombre_apellido_usuario: {
                required: true
            },
            cedula: {
                required: true
            },
            empresa: {
                required: true
            },
            sucursal: {
                required: true
            },
            direccion: {
                required: true
            },
            gerencia: {
                required: true
            },
            departamento: {
                required: true
            },
            centro_costo: {
                required: true
            },
            user_master: {
                required: true
            },
            tipo_usuario: {
                required: true
            },
            password: {
                required: true
            },
            password_confirmar: {
                required: true
            },
        },
        messages: { // <-- Mensajes personalizados para cada alerta según su ID
            nombre_apellido_usuario: {
                required: "Nombre y Apellido requeridos"
            },
            cedula: {
                required: "Cédula requerida"
            },
            empresa: {
                required: "Empresa requerida"
            },
            sucursal: {
                required: "Sucursal requerida"
            },
            direccion: {
                required: "Dirección requerida"
            },
            gerencia: {
                required: "Gerencia requerida"
            },
            departamento: {
                required: "Departamento requerido"
            },
            centro_costo: {
                required: "Centro de Costo requerido"
            },
            user_master: {
                required: "Rol requerido"
            },
            tipo_usuario: {
                required: "Tipo de Usuario requerido"
            },
            password: {
                required: "Contraseña requerida"
            },
            password_confirmar: {
                required: "Confirmación requerida"
            },
        }
    });
    </script>

    <script>
        $('#empresa').on('click', function () {
            empresas('{{ route("buscar.empresas") }}')  
        })
    </script>

    <script>
        $('#sucursal').on('click', function () {
            if ($('#empresa').val() === "") {
                alert('Debes seleccionar una empresa primero');
                empresas('{{ route("buscar.empresas") }}')   
                return
            }
            sucursales('{{ route("buscar.sucursales.empresa") }}')
        })
    </script>

    <script>
        $('#direccion').on('click', function () {
            if ($('#empresa').val() === "") {
                alert('Debes seleccionar una empresa primero');
                empresas('{{ route("buscar.empresas") }}')   
                return
            }
            direccion('{{ route("buscar.direccion.empresa") }}')
        })
    </script>

    <script>
        $('#gerencia').on('click', function () {
            if ($('#empresa').val() === "") {
                alert('Debes seleccionar una empresa primero');
                empresas('{{ route("buscar.empresas") }}')   
                return;
            } else if ($('#direccion').val() === "") {
                alert('Debes seleccionar una dirección primero');
                direccion('{{ route("buscar.direccion.empresa") }}')   
                return;
            }
            gerencia('{{ route("buscar.gerencia.direccion") }}')
        })
    </script>

    <script>
        $('#departamento').on('click', function () {
            if ($('#empresa').val() === "") {
                alert('Debes seleccionar una empresa primero');
                empresas('{{ route("buscar.empresas") }}')   
                return;
            } else if ($('#direccion').val() === "") {
                alert('Debes seleccionar una dirección primero');
                direccion('{{ route("buscar.direccion.empresa") }}')   
                return;
            } else if ($('#gerencia').val() === "") {
                alert('Debes seleccionar una gerencia primero');
                gerencia('{{ route("buscar.gerencia.direccion") }}') 
                return;
            }
            departamento('{{ route("buscar.departamento.gerencia") }}')
        })
    </script>

    <script>
        $('#centro_costo').on('click', function () {
            if ($('#empresa').val() === "") {
                alert('Debes seleccionar una empresa primero');
                empresas('{{ route("buscar.empresas") }}')   
                return;
            } else if ($('#direccion').val() === "") {
                alert('Debes seleccionar una dirección primero');
                direccion('{{ route("buscar.direccion.empresa") }}')   
                return;
            } else if ($('#gerencia').val() === "") {
                alert('Debes seleccionar una gerencia primero');
                gerencia('{{ route("buscar.gerencia.direccion") }}') 
                return;
            }
            centro_costo('{{ route("buscar.centrocosto.gerencia") }}')
        })
    </script>
@endpush