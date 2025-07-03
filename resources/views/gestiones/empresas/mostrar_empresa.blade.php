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
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="" >Código de la Empresa</label>
                                <input type="text" id="" class="form-control" placeholder="Ingrese el Código de la Empresa" name="">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="" >Razon Social</label>
                                <input type="text" id="" class="form-control" placeholder="Ingrese la Razon Social" name="">
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

<script>
    var route_empresa = '{{ route("empresa.data") }}'
</script>

<script src="{{asset('assets/compiled/js/tabla-empresa.js')}}"></script>

@endpush 