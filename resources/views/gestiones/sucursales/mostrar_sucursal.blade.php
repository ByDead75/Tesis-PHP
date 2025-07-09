@extends('template')

@section('title', 'Listado de Sucursales')

@push('css')
    
@endpush

@section('content')

<div id="main-content" class="">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Listado de Sucursales</h3>
            </div>
            <div class="card-body pb-0">
                <form class="mb-4">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="codigo_empresa" >Código de la Empresa</label>
                                <input type="number" min="0" id="codigo_empresa" name="codigo_empresa" class="form-control" placeholder="Ingrese el Código de la Empresa">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nombre_empresa">Nombre de la Empresa</label>
                                <input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control" 
                                placeholder="Ingrese el Nombre de la Empresa">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="codigo_sucursal" >Código de la Sucursal</label>
                                <input type="number" min="0" id="codigo_sucursal" name="codigo_sucursal" class="form-control" placeholder="Ingrese el Código de la Sucursal">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nombre_sucursal">Nombre de la Sucursal</label>
                                <input type="text" id="nombre_sucursal" name="nombre_sucursal" class="form-control" 
                                placeholder="Ingrese el Nombre de la Sucursal" >
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
                        <table class="table table-striped" id="tabla_sucursales">
                            <thead >
                                <tr>
                                    <th class="text-center">Acciones</th>
                                    <th class="text-center">Código de la Empresa</th>
                                    <th class="text-center">Nombre de la Empresa</th>
                                    <th class="text-center">Código de la Sucursal</th>
                                    <th class="text-center">Nombre de la Sucursal</th>
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
        var route_sucursal = '{{ route("gestiones.sucursales.registros.obtener") }}'
    </script>

    <script src="{{asset('assets/compiled/js/tabla-sucursal.js')}}"></script>

    <script>
        function RedireccionEditarSucursal(codigo_empresa, codigo_sucursal) {

            console.log('Se hizo clic en Editar para el ID de Pago:', codigo_empresa, codigo_sucursal);

            const baseUrl = "{{ url('/editar/sucursal') }}";
                window.location.href = baseUrl + '/'+codigo_empresa+'/'+codigo_sucursal+'';
    }
    </script>

@endpush 