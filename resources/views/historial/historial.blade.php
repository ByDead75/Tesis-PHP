@extends('template')

@section('title', 'Historial de Solicitudes')

@push('css')

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
                <div class="table-responsive datatable-minimal">
                    <div class="row">
                        <div class="col-10">
                            <div class="dataTables_length" id="table2_length">
                                <label>
                                    <select name="table2_length" aria-controls="table2" class="form-select form-select-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> 
                                </label>
                            </div>
                        </div>
                        <div class="col-2">
                            <div id="table2_filter" class="dataTables_filter">
                                <label>
                                    <input type="search" class="form-control form-control-sm" placeholder="Search.." aria-controls="table2">
                                </label>
                            </div>
                        </div>
                    </div>
                    <table class="table" id="table2">
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
                            @foreach($solicitudes as $solicitud)
                            <tr>
                                
                                <td value="{{ $solicitud->id_solicitud }}">{{ $solicitud->id_pago }}</td>
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
                    {{ $solicitudes->links() }}
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

    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    
    <script src="assets/compiled/js/app.js"></script>
    
    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/static/js/pages/datatables.js"></script>