@extends('template')

@section('title', 'Listado de Empresas')

@push('css')
    
@endpush

@section('content')

<div id="main-content" class="">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Listado de Empresas</h3>
            </div>
            <div class="card-body pb-0">
                <form class="mb-4">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="cod_empresa" >Código de la Empresa</label>
                                <input type="number" min="0" id="cod_empresa" name="cod_empresa" class="form-control" 
                                placeholder="Ingrese el Código de la Empresa">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nb_empresa" >Razon Social</label>
                                <input type="text" id="nb_empresa" name="nb_empresa" class="form-control" 
                                placeholder="Ingrese la Razon Social">
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
                        <table class="table table-striped" id="tabla_empresa">
                            <thead >
                                <tr>
                                    <th class="text-center">Acciones</th>
                                    <th class="text-center">Codigo de la Empresa</th>
                                    <th class="text-center">Razon Social</th>
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

    <script>
        function RedireccionEditarEmpresa(codigo_empresa) {

            console.log('Se hizo click en Editar para el ID de la Empresa:', codigo_empresa);

            const baseUrl = "{{ url('/editar/empresa') }}";
                window.location.href = baseUrl + '/'+codigo_empresa+'';
        }
    </script>

@endpush 