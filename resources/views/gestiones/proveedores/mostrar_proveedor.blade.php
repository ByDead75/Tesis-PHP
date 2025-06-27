@extends('template')

@section('title', 'Listado de Proveedores')

@push('css')
    
@endpush

@section('content')

<div id="main-content" class="">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Registro de Proveedores Existentes</h3>
            </div>
            <div class="card-body pb-0">
                <form class="mb-4">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="">Nombre del Proveedor</label>
                                <input type="text" id="" class="form-control" placeholder="Ingrese el Nombre del Proveedor" name="">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="">Tipo de Proveedor</label>
                                <select class="form-select" id="">
                                    <option value="">---</option>
                                    <option value="0">PROSER</option>
                                    <option value="1">COMIS</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="" >RIF del Proveedor</label>
                                <input type="text" id="" class="form-control" placeholder="Ingrese el RIF del Proveedor" name="">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="" >NIT del Proveedor</label>
                                <input type="text" id="" class="form-control" placeholder="Ingrese el NIT del Proveedor" name="">
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
                        <table class="table table-striped" id="tabla_proveedores">
                            <thead >
                                <tr>
                                    <th class="text-center">Acciones</th>
                                    <th class="text-center">Nombre del Proveedor</th>
                                    <th class="text-center">Código del Proveedor</th>
                                    <th class="text-center">RIF</th>
                                    <th class="text-center">NIT</th>
                                    <th class="text-center">Tipo de Proveedor</th>
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