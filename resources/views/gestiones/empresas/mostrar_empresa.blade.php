@extends('template')

@section('title', 'Listado de Empresas')

@push('css')
    
@endpush

@section('content')

<div id="main-content" class="">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Registro de Empresas Existentes</h3>
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
                        <table class="table table-striped" id="tabla_empresas">
                            <thead >
                                <tr>
                                    <th class="text-center">Acciones</th>
                                    <th class="text-center">Codigo de la Empresa</th>
                                    <th class="text-center">Nombre de la Empresa</th>
                                    <th class="text-center">RIF</th>
                                    <th class="text-center">Sucursal</th>
                                    <th class="text-center">Logo de la Empresa</th>
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