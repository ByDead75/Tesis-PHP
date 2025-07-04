@extends('template')

@section('title', 'Status Solicitud')

@push('css')

@endpush

@section('content')

<div id="main-content" class="">
        <div>
            <h2 class="card-title text-center mb-4 pb-2">Cambiar Status de la Solicitud de Pago</h2>
        </div>
    <form class="form" action="{{ route('ordenes.solicitud.editar', $solicitud->id_solicitud) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <section id="multiple-column-form " class="pb-1">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-1">
                            <h3 class="card-title text-center mb-0">Datos del Solicitante</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label class="form-label text-center d-block" for="empresa">Empresa</label>
                                            <p class="form-control-static text-center" id="empresa" name="empresa">{{ $solicitud->nombre_empresa}}</p>
                                            <input type="hidden" id="empresa_codigo" name="empresa_codigo" class="form-control" 
                                                    value="{{$solicitud->cod_empresa}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label class="form-label text-center d-block" for="sucursal">Surcusal / Oficina</label>
                                            <p class="form-control-static text-center" id="sucursal" name="sucursal">{{ $solicitud->sucursal }}</p>
                                            <input type="hidden" id="sucursal_codigo" name="sucursal_codigo" class="form-control" 
                                                    value="{{ $solicitud->cod_sucursal }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label class="form-label text-center d-block" for="centro_costo_empresa">Centro de Costo / Departamento </label>
                                            <p class="form-control-static text-center" id="centro_costo_empresa" name="centro_costo_empresa">{{ $solicitud->nombre_centro_costo}}</p>
                                            <input type="hidden" id="centro_costo_empresa_codigo" name="centro_costo_empresa_codigo"  class="form-control"  
                                                    value="{{$solicitud->codigo_centro_costo}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label class="form-label text-center d-block" for="nombre_solicitante">Solicitante</label>
                                            <p class="form-control-static text-center" id="nombre_solicitante" name="nombre_solicitante">{{$solicitud->nombre_solicitante}}</p>
                                            <input type="hidden" id="id_solicitante" class="form-control"  name="id_solicitante" value="{{ $solicitud->id_solicitante }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label class="form-label text-center d-block" for="aprobador_nombre">Aprobador del Centro</label>
                                            <p class="form-control-static text-center" id="aprobador_nombre" name="aprobador_nombre">{{ $solicitud->nombre_aprobador }}</p>
                                            <input type="hidden" id="aprobador_codigo"  name="aprobador_codigo" class="form-control" 
                                                    value="{{ $solicitud->aprobador_sol }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label  class="form-label text-center d-block" for="fecha">Fecha de Solicitud</label>
                                            <p class="form-control-static text-center" name="fecha" id="fecha">{{  \Carbon\Carbon::parse($solicitud->fecha_solicitud)->format('d-m-Y') }}</p>
                                            <input type="hidden" id="fecha_solicitud" class="form-control"  name="fecha_solicitud" value="{{  \Carbon\Carbon::parse($solicitud->fecha_solicitud)->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-1">
                            <h3 class="card-title text-center mb-0">Datos del Pago</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="tipo_proveedor" class="form-label text-center d-block">Tipo de Proveedor</label>
                                                <input type="text" id="tipo_proveedor" class="form-control text-center"  name="tipo_proveedor" value="{{ $solicitud->TipoProveedor }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_nombre" class="form-label text-center d-block">Nombre o Razón Social / Beneficiario del Pago</label>
                                                <input type="text" id="proveedor_nombre" class="form-control text-center"  name="proveedor_nombre" value="{{  $solicitud->nombre_proveedor }}" disabled>
                                                <input type="hidden" id="proveedor_codigo" class="form-control"  name="proveedor_codigo" value="{{ $solicitud->beneficiario_de_pago }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="tipo_solicitud" class="form-label text-center d-block">Factura/Presupuesto</label>
                                                <select class="form-control text-center" id="tipo_solicitud" name="tipo_solicitud" disabled>
                                                    <option value="0" {{ $solicitud->factupuesto == '1' ? 'selected' : '' }}></option>
                                                    <option value="1" {{ $solicitud->factupuesto == '1' ? 'selected' : '' }}>FACTURA</option>
                                                    <option value="2" {{ $solicitud->factupuesto == '2' ? 'selected' : '' }}>PRESUPUESTO</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_rif" class="form-label text-center d-block">Rif del Proveedor</label>
                                                <input type="text" id="proveedor_rif" class="form-control text-center" name="proveedor_rif" value="{{ $solicitud->rif }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="forma_pago" class="form-label text-center d-block">Forma de Pago</label>
                                                <select class="form-control text-center" id="forma_pago" name="forma_pago" disabled>
                                                    <option value="0" {{  $solicitud->id_pago == '1' ? 'selected' : '' }}></option>
                                                    <option value="1" {{  $solicitud->id_pago == '1' ? 'selected' : '' }}>CHEQUE</option>
                                                    <option value="2" {{  $solicitud->id_pago == '2' ? 'selected' : '' }}>TRANSFERENCIA</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="numero_tipo_solicitud" class="form-label text-center d-block">N° de la Factura/Presupuesto</label>
                                                <input type="text" id="numero_tipo_solicitud" class="form-control text-center" name="numero_tipo_solicitud" value="{{ $solicitud->factura }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_banco" class="form-label text-center d-block">Banco del Proveedor</label>
                                                <input type="text" id="proveedor_banco" class="form-control text-center" name="proveedor_banco" value="{{ $solicitud->banco_nombre }}" disabled>
                                                <input type="hidden" id="proveedor_banco_codigo" class="form-control"  name="proveedor_banco_codigo" value="{{ $solicitud->id_banco }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_numero_cuenta" class="form-label text-center d-block">N° de Cuenta</label>
                                                <input type="number" id="proveedor_numero_cuenta" class="form-control text-center" name="proveedor_numero_cuenta" value="{{ $solicitud->cuenta }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="numero_control" class="form-label text-center d-block">N° de Control</label>
                                                <input type="text" id="numero_control" class="form-control text-center" name="numero_control" value="{{ $solicitud->n_control }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_neto" class="form-label text-center d-block">Monto Neto - ej: 1200.00</label>
                                                <input type="number" step="any" id="monto_neto" class="form-control text-center" name="monto_neto" value="{{ $solicitud->monto }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_iva" class="form-label text-center d-block">Monto del IVA - ej: 144.00</label>
                                                <input type="number" step="any" id="monto_iva" class="form-control text-center" name="monto_iva" value="{{ $solicitud->monto_iva }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_total" class="form-label text-center d-block">Monto Total</label>
                                                <input type="number" step="any" id="monto_total" class="form-control text-center" name="monto_total" value="{{  $solicitud->monto_total }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div>
                                        <h3 class="card-title text-center pt-4 pb-2">Concepto de Pago</h3>
                                    </div>
                                    
                                    <div class="form-group mt-2">
                                        <textarea class="form-control"  id="concepto_de_pago" name="concepto_de_pago" disabled>{{  $solicitud->concepto_de_pago }}</textarea>
                                    </div>
                                </div>

                                <div class="row pt-4 pb-2">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div>
                                                    <h5 class="card-title">Archivos Adjuntos</h5>
                                                </div>
                                                <div class="card-body">
                                                    @if($documentos->isEmpty())
                                                        <p>No hay documentos cargados para esta solicitud.</p>
                                                    @else
                                                        <ul>
                                                            @foreach($documentos as $documento)
                                                                <li>{{ $documento->nombre_documento }} - <a href="{{ asset('storage/' . $documento->ruta) }}">Ver</a></li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-secondary me-1 mb-1" id="btn_regresar" name="btn_regresar">Regresar</button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Guardar Cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>

@include('components.modal')

@endsection

@push('js')
<!--Funcionalidad de Modales-->
    


    <script>
        document.getElementById('btn_regresar').addEventListener('click', function() {
            if(confirm('¿Está seguro de que desea salir? Los cambios no guardados se perderán.')) {
                window.history.back();
                //window.location.href="{{ route('index') }}";
            }
        });
    </script>

    
@endpush

