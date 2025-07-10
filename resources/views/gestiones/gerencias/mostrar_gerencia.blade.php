@extends('template')

@section('title', 'Listado de Gerencias')

@push('css')
    
@endpush

@section('content')

<div id="main-content" class="">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Listado de Gerencias</h3>
            </div>
            <div class="card-body pb-0">
                <form class="mb-4">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="codigo_empresa" >Código de la Empresa</label>
                                <input type="number" min="0" id="codigo_empresa" name="codigo_empresa" class="form-control" placeholder="Ingrese el Código de la Empresa">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="codigo_direccion" >Código de la Direccion</label>
                                <input type="number" min="0" id="codigo_direccion" name="codigo_direccion" class="form-control" placeholder="Ingrese el Código de la Direccion">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="codigo_gerencia">Código de la Gerencia</label>
                                <input type="number" min="0" id="codigo_gerencia" name="codigo_gerencia" class="form-control"placeholder="Ingrese el Código de la Gerencia">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nombre_empresa" >Nombre de la Empresa</label>
                                <input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control" placeholder="Ingrese el Nombre de la Empresa">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nombre_direccion" >Nombre de la Direccion</label>
                                <input type="text" id="nombre_direccion" name="nombre_direccion" class="form-control" placeholder="Ingrese el Nombre de la Direccion">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nombre_gerencia">Nombre de la Gerencia</label>
                                <input type="text" id="nombre_gerencia" name="nombre_gerencia" class="form-control"placeholder="Ingrese el Nombre de la Gerencia">
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
                        <table class="table table-striped" id="tabla_gerencia">
                            <thead >
                                <tr>
                                    <th class="text-center">Acciones</th>
                                    <th class="text-center">Código de la Empresa</th>
                                    <th class="text-center">Nombre de la Empresa</th>
                                    <th class="text-center">Código de la Dirección</th>
                                    <th class="text-center">Nombre de la Dirección</th>
                                    <th class="text-center">Código de la Gerencia</th>
                                    <th class="text-center">Nombre de la Gerencia</th>
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
    <script src="{{asset('assets/compiled/js/tabla-gerencia.js')}}"></script>

    <script>
        var route_gerencia = '{{ route("gerencia.data") }}'
    </script>

@endpush 