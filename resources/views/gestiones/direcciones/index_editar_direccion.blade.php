@extends('template')

@section('title', 'Listado de Direcciones')

@push('css')
    
@endpush

@section('content')

<div id="main-content" class="">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Registro de Direcciones Existentes</h3>
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
                                <label class="form-label" for="" >Código de la Dirección</label>
                                <input type="text" id="" class="form-control" placeholder="Ingrese el Código de la Dirección" name="">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="">Nombre de la Empresa</label>
                                <input type="text" id="" class="form-control" placeholder="Ingrese el Nombre de la Empresa" name="">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="">Nombre de la Direccion</label>
                                <input type="text" id="" class="form-control" placeholder="Ingrese el Nombre de la Dirección" name="">
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
                        <table class="table table-striped" id="tabla_direccion">
                            <thead >
                                <tr>
                                    <th class="text-center">Acción</th>
                                    <th class="text-center">Código de la Empresa</th>
                                    <th class="text-center">Nombre de la Empresa</th>
                                    <th class="text-center">Código de la Dirección</th>
                                    <th class="text-center">Nombre de la Dirección</th>
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
    var route_direccion = '{{ route("direccion.data") }}'
</script>

<script src="{{asset('assets/compiled/js/tabla-direccion.js')}}"></script>

@endpush 