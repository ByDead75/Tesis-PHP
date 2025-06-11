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
                    <table class="table table-hover" id="tabla_historial">
                        <thead class="">
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
                            @foreach($solicitudes as $solicitud)
                            <tr>
                                
                                <td value="{{ $solicitud->id_solicitud }}">{{ $solicitud->id_solicitud }}</td>
                                <td>{{ $solicitud->nombre_solicitante }}</td>
                                <td value="{{ $solicitud->id_solicitud }}">{{ $solicitud->id_solicitante }}</td>
                                <td value="{{ $solicitud->id_solicitud }}">{{ $solicitud->fecha_solicitud }}</td>
                                <td value="{{ $solicitud->id_solicitud }}">{{ $solicitud->rif }}</td>
                                <td value="{{ $solicitud->id_solicitud }}"> {{ $solicitud->monto_total }} Bs</td>
                                <td> <span class="badge bg-primary">Completada</span> </td>
                                <td><i class="bi bi-journals"></i></td>
                            </tr>
                            @endforeach
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="./assets/compiled/js/tablas.js"></script>
@endpush