@extends('template')

@section('title', 'Pruebas Historial')

@push('css')

@endpush

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title text-center">
                    Historial de Solicitudes
                </h2>
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <table class="table" id="tabla_historial">
                        <thead>
                            <tr>
                                <th>ID Solicitud</th>
                                <th>Solicitante</th>
                                <th>ID Solicitante</th>
                                <th>Fecha de la Solicitud</th>
                                <th>RIF</th>
                                <th>Monto Total</th>
                                <th>Estatus</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
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
<!--Pruebas - Historial -->
    

    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/static/js/pages/datatables.js"></script>

    
@endpush