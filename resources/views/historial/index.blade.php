@extends('template')

@section('title', 'Historial de Solicitudes')

@push('css')
    
@endpush

@section('content')

<div id="main-content" class="">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Historial de Solicitudes</h3>
            </div>
            <div class="card-body pb-0">
                <form class="mb-4">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="id_solicitud" >ID de Solicitud</label>
                                <input type="text" id="id_solicitud" class="form-control" placeholder="Ingrese la ID de la Solicitud" name="id_solicitud">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="id_solicitante" >ID de Solicitante</label>
                                <input type="text" id="id_solicitante" class="form-control" placeholder="Ingrese la ID del Solicitante" name="id_solicitante">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="status_solicitud">Status</label>
                                    <select class="form-select" id="status_solicitud">
                                        <option value="">Seleccionar</option>
                                        <option value="1">POR APROBACION</option>
                                        <option value="2">APROBADA</option>
                                        <option value="3">RECHAZADA</option>
                                        <option value="4">PAGADA</option>
                                        <option value="5">RECIBIDO ADM</option>
                                    </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="fecha_desde">Fecha desde</label>
                                <input type="date" id="fecha_desde" class="form-control"name="fecha_desde">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="fecha_hasta">Fecha hasta</label>
                                <input type="date" id="fecha_hasta" class="form-control" name="fecha_hasta">
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
                    <!-- Tabla para el Historial en jQuery -->
                    <div class="table">
                        <table class="table table-striped" id="tabla_historial">
                            <thead >
                                <tr>
                                    <th class="text-center">ID de Solicitud</th>
                                    <th class="text-center">Solicitante</th>
                                    <th class="text-center">ID de Solicitante</th>
                                    <th class="text-center">Fecha de la Solicitud</th>
                                    <th class="text-center">RIF</th>
                                    <th class="text-center">Monto Total</th>
                                    <th class="text-center">Status</th>
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
    var route_historial = '{{ route("historial.data") }}'
</script>

<script src="{{asset('assets/compiled/js/tabla-historial.js')}}"></script>
@endpush 