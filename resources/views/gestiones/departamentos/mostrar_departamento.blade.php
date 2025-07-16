@extends('template')

@section('title', 'Listado de Departamentos')

@push('css')
    
@endpush

@section('content')

<div id="main-content" class="">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Listado de Departamentos</h3>
            </div>
            <div class="card-body pb-0">
                <form class="mb-4">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="cod_empresa">Código de la Empresa</label>
                                <input type="text" id="cod_empresa" class="form-control" 
                                placeholder="Ingrese el Código de la Empresa" name="cod_empresa">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="cod_direccion" >Código de la Direccion</label>
                                <input type="text" id="cod_direccion" class="form-control" 
                                placeholder="Ingrese el Código de la Direccion" name="cod_direccion">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="cod_gerencia">Código de la Gerencia</label>
                                <input type="text" id="cod_gerencia" class="form-control" 
                                placeholder="Ingrese el Código de la Gerencia" name="cod_gerencia">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="cod_departamento">Código del Departamento</label>
                                <input type="text" id="cod_departamento" class="form-control" 
                                placeholder="Ingrese el Código del Departamento" name="cod_departamento">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nb_departamento">Nombre del Departamento</label>
                                <input type="text" id="nb_departamento" class="form-control" 
                                placeholder="Ingrese el Nombre del Departamento" name="nb_departamento">
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
                        <table class="table table-striped" id="tabla_departamento">
                            <thead >
                                <tr>
                                    <th class="text-center">Acciones</th>
                                    <th class="text-center">Nombre de la Empresa</th>
                                    <th class="text-center">Nombre de la Dirección</th>
                                    <th class="text-center">Nombre de la Gerencia</th>
                                    <th class="text-center">Código del Departamento</th>
                                    <th class="text-center">Nombre del Departamento</th>
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
    var route_departamento = '{{ route("departamento.data") }}'
</script>

<script src="{{asset('assets/compiled/js/tabla-departamento.js')}}"></script>

<script>
    function RedireccionEditarDepartamento(codigo_empresa, codigo_direccion, codigo_gerencias, codigo_departamento) {

        const baseUrl = "{{ url('/editar/departamento') }}";
            window.location.href = baseUrl + '/'+codigo_empresa+'/'+codigo_direccion+'/'+codigo_gerencias+'/'+codigo_departamento+'';
}
</script>

@endpush 