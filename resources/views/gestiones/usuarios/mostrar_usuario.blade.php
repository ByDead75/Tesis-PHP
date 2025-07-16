@extends('template')

@section('title', 'Listado de Usuarios')

@push('css')
    
@endpush

@section('content')

<div id="main-content" class="">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Listado de Usuarios</h3>
            </div>
            <div class="card-body pb-0">
                <form class="mb-4">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="cedula" >Cedula del Usuario</label>
                                <input type="text" id="cedula" class="form-control" placeholder="Ingrese la Cédula del Usuario" name="cedula">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nombre" >Nombre de Usuario</label>
                                <input type="text" id="nombre" class="form-control" placeholder="Ingrese el nombre del Usuario" name="nombre">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="user_master">Tipo de Usuario</label>
                                <select class="form-select" id="user_master">
                                    <option value="">Seleccionar</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary me-1" id="buscar">Buscar</button>
                            <a href="" class="btn btn-secondary">Limpiar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="section">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="table">
                        <table class="table table-striped" id="tabla_usuario">
                            <thead >
                                <tr>
                                    <th class="text-center">Acciones</th>
                                    <th class="text-center">Cédula</th>
                                    <th class="text-center">Nombre y Apellido</th>
                                    <th class="text-center">Departamento</th>
                                    <th class="text-center">Fecha de Registro</th>
                                    <th class="text-center">Tipo de Usuario</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Centro de Costo</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>
                        <div class="row">
                            <div>
                                <div>
                                    <div class="col-12 d-flex justify-content-center mt-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
    
@endsection

@push('js')

<script>
    var route_usuario = '{{ route("usuario.data") }}'
</script>

<script src="{{asset('assets/compiled/js/tabla-usuario.js')}}"></script>

    <script>
        function RedireccionEditarUsuario(idUsuario) {

            console.log('Se hizo clic en Editar para el ID del Usuario:', idUsuario);

            const baseUrl = "{{ url('/editar/usuario') }}";
                window.location.href = baseUrl + '/'+idUsuario+'';
    }
    </script>

    <script>
        function RedireccionFirmaDigitalUsuario(idUsuario) {

            console.log('Se hizo clic en Editar para el ID del Usuario:', idUsuario);

            const baseUrl = "{{ url('/agregar/firma/usuario') }}";
                window.location.href = baseUrl + '/'+idUsuario+'';
    }
    </script>

@endpush 