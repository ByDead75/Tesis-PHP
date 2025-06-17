@extends('template')

@section('title', 'Historial de Solicitudes')

@push('css')
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="./assets/compiled/css/table-datatable-jquery.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/js/dataTables.js">
@endpush

@section('content')

<div id="main-content" class="pt-0">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Historial de Solicitudes</h3>
            </div>
            <div class="card-body pb-0">
                <form action="" method="GET" class="mb-4">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="first-name-column" >ID de Solicitud</label>
                                <input type="text" id="id_solicitud" class="form-control" placeholder="Ingrese la ID de la Solicitud" name="id_solicitud">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="first-name-column" >ID de Solicitante</label>
                                <input type="text" id="id_solicitante" class="form-control" placeholder="Ingrese la ID del Solicitante" name="id_solicitante">
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Status</label>
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

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Fecha desde</label>
                                <input type="date" id="fecha_desde" class="form-control"name="fecha_desde">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Fecha hasta</label>
                                <input type="date" id="fecha_hasta" class="form-control" name="fecha_hasta">
                            </div>
                        </div>

                        <div class="col-sm-12 d-flex justify-content-end pt-3">
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
                            <thead>
                                <tr>
                                    <th>ID Solicitud</th>
                                    <th>Solicitante</th>
                                    <th>ID Solicitante</th>
                                    <th>Fecha de la Solicitud</th>
                                    <th>RIF</th>
                                    <th>Monto Total</th>
                                    <th>Status</th>
                                    <!--<th>Detalles</th> -->
                                </tr>
                            </thead>
                            <tbody>
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
    <script src="./assets/compiled/js/tabla-historial.js"></script>
    <script>
        var route_historial = '{{ route("historial.obtener") }}'
    </script>
@endpush