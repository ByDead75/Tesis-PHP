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
                <div class="table datatable-minimal">
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
                                <th>Detalles</th>
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
<!--Pruebas - Historial -->
    
    <script src="./assets/compiled/js/tabla-historial.js"></script>

    

    
@endpush