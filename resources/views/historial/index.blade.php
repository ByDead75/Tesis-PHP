@extends('template')

@section('title', 'Historial de Solicitudes')

@push('css')
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="./assets/compiled/css/table-datatable-jquery.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/js/dataTables.js">
    
@endpush

@section('content')


<!-- Tabla para el Historial en jQuery -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title text-center">
                    Historial de Solicitudes
                </h2>
            </div>
            <div class="card-body">
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
                                <th>Estatus</th>
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
@endsection


@push('js')
    <script src="./assets/compiled/js/tabla-historial.js"></script>
@endpush