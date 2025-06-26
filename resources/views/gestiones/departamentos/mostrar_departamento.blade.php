@extends('template')

@section('title', 'Listado de Departamentos')

@push('css')
    
@endpush

@section('content')

<div id="main-content" class="">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Registro de Departamentos Existentes</h3>
            </div>
            <div class="card-body pb-0">
                <form class="mb-4">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="" >Cedula del Usuario</label>
                                <input type="text" id="" class="form-control" placeholder="Ingrese la Cédula del Usuario" name="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="" >Nombre de Usuario</label>
                                <input type="text" id="" class="form-control" placeholder="Ingrese el nombre del Usuario" name="">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="user_master">Cargo en la Empresa</label>
                                <select class="form-select" id="user_master">
                                    <option value="">---</option>
                                    <option value="0">---</option>
                                    <option value="1">---</option>
                                    <option value="2">---</option>
                                    <option value="3">---</option>
                                    <option value="4">---</option>
                                    <option value="6">---</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="fecha_ingreso">Fecha de Ingreso</label>
                                <input type="date" id="fecha_ingreso" class="form-control"name="fecha_ingreso">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="fecha_egreso">Fecha de Egreso</label>
                                <input type="date" id="fecha_egreso" class="form-control" name="fecha_egreso">
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
                        <table class="table table-striped" id="tabla_departamentos">
                            <thead >
                                <tr>
                                    <th class="text-center">Acciones</th>
                                    <th class="text-center">Cédula</th>
                                    <th class="text-center">Nombre y Apellido</th>
                                    <th class="text-center">Fecha de Nacimiento</th>
                                    <th class="text-center">Cargo en la Empresa</th>
                                    <th class="text-center">Rol</th>
                                    <th class="text-center">Fecha de Ingreso</th>
                                    <th class="text-center">Fecha de Egreso</th>
                                    <th class="text-center">Departamento</th>
                                    <th class="text-center">Empresa</th>
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

<script src="{{asset('assets/compiled/js/tabla-usuarios.js')}}"></script>

@endpush 