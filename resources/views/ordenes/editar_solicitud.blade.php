@extends('template')

@section('title', 'Editar Solicitud')

@push('css')

@endpush

@section('content')

<div id="main-content" class="">
        <div>
            <h2 class="card-title text-center mb-4 pb-2">Editar Solicitud de Pago</h2>
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
                                            <label class="form-label text-center d-block" for="disabledInput">Empresa</label>
                                            <select class="form-select text-center" id="empresa_codigo" name="empresa_codigo" required>
                                                <option value="{{ old('empresa_codigo', $solicitud->cod_empresa) }}">{{ old('nombre_empresa', $solicitud->nombre_empresa) }}</option>
                                                @foreach($empresas as $empresa)
                                                    <option value="{{ $empresa->cod_empresa }}">{{ $empresa->nb_empresa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label class="form-label text-center d-block" for="disabledInput">Surcusal / Oficina</label>
                                            <input type="text" id="sucursal" name="sucursal" class="form-control text-center" placeholder="Click para seleccionar la Sucursal" 
                                                    value="{{ old('sucursal', $solicitud->sucursal) }}">
                                            <input type="hidden" id="sucursal_codigo" name="sucursal_codigo" class="form-control" 
                                                    value="{{ old('sucursal_codigo', $solicitud->cod_sucursal) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label class="form-label text-center d-block" for="centro_costo_empresa">Centro de Costo / Departamento </label>
                                            <input type="text" id="centro_costo_empresa" class="form-control text-center" placeholder="Click para seleccionar el Centro de Costo" name="centro_costo_empresa"
                                                    value="{{ old('centro_costo_empresa', $solicitud->nombre_centro_costo) }}">
                                            <input type="hidden" id="centro_costo_empresa_codigo" name="centro_costo_empresa_codigo"  class="form-control"  
                                                    value="{{ old('centro_costo_empresa_codigo', $solicitud->codigo_centro_costo) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label class="form-label text-center d-block" for="nombre_solicitante">Nombre y Apellido</label>
                                            <p class="form-control-static text-center" id="nombre_solicitante" name="nombre_solicitante">{{ old('nombre_solicitante', $solicitud->nombre_solicitante) }}</p>
                                            <input type="hidden" id="id_solicitante" class="form-control"  name="id_solicitante" value="{{ old('id_solicitante', $solicitud->id_solicitante) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label class="form-label text-center d-block" for="aprobador_nombre">Aprobador del Centro</label>
                                            <input type="text" class="form-control text-center" id="aprobador_nombre" name='aprobador_nombre' 
                                                    value="{{ old('aprobador_nombre', $solicitud->nombre_aprobador) }}" readonly>
                                                <input type="hidden" id="aprobador_codigo"  name="aprobador_codigo" class="form-control" 
                                                        value="{{ old('aprobador_codigo', $solicitud->aprobador_sol) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label  class="form-label text-center d-block" for="fecha">Fecha de Solicitud</label>
                                            <p class="form-control-static text-center" name="fecha" id="fecha">{{ old('fecha', \Carbon\Carbon::parse($solicitud->fecha_solicitud)->format('d-m-Y')) }}</p>
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
                                            <input type="text" id="tipo_proveedor" class="form-control text-center" placeholder="Seleccione el proveedor" name="tipo_proveedor" readonly 
                                                    value="{{ old('tipo_proveedor', $solicitud->TipoProveedor) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_nombre" class="form-label text-center d-block">Nombre o Razón Social / Beneficiario del Pago</label>
                                            <input type="text" id="proveedor_nombre" class="form-control text-center" placeholder="Clic para seleccionar un proveedor" name="proveedor_nombre"
                                                    value="{{ old('proveedor_nombre', $solicitud->nombre_proveedor) }}">
                                            <input type="hidden" id="proveedor_codigo" class="form-control"  name="proveedor_codigo" value="{{ old('proveedor_codigo', $solicitud->beneficiario_de_pago) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="tipo_solicitud" class="form-label text-center d-block">Factura/Presupuesto</label>
                                                <select class="form-select text-center" id="tipo_solicitud" name="tipo_solicitud">
                                                    <option value="0">Seleccionar</option>
                                                    <option value="1" {{ old('tipo_solicitud', $solicitud->factupuesto) == '1' ? 'selected' : '' }}>FACTURA</option>
                                                    <option value="2" {{ old('tipo_solicitud', $solicitud->factupuesto) == '2' ? 'selected' : '' }}>PRESUPUESTO</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_rif" class="form-label text-center d-block">Rif del Proveedor</label>
                                            <input type="text" id="proveedor_rif" class="form-control text-center" name="proveedor_rif" 
                                                    value="{{ old('proveedor_rif', $solicitud->rif) }}"
                                                    placeholder="Seleccione el proveedor" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="forma_pago" class="form-label text-center d-block">Forma de Pago</label>
                                                <select class="form-select text-center" id="forma_pago" name="forma_pago">
                                                    <option value="0">Seleccionar</option>
                                                    <option value="1" {{ old('forma_pago', $solicitud->id_pago) == '1' ? 'selected' : '' }}>CHEQUE</option>
                                                    <option value="2" {{ old('forma_pago', $solicitud->id_pago) == '2' ? 'selected' : '' }}>TRANSFERENCIA</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="numero_tipo_solicitud" class="form-label text-center d-block">N° de la Factura/Presupuesto</label>
                                            <input type="text" id="numero_tipo_solicitud" class="form-control text-center" name="numero_tipo_solicitud" 
                                                    value="{{ old('numero_tipo_solicitud', $solicitud->factura) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_banco" class="form-label text-center d-block">Banco del Proveedor</label>
                                            <input type="text" id="proveedor_banco" class="form-control text-center" placeholder="Clic para seleccionar un banco" name="proveedor_banco"
                                                    value="{{ old('proveedor_banco', $solicitud->banco_nombre) }}">
                                            <input type="hidden" id="proveedor_banco_codigo" class="form-control"  name="proveedor_banco_codigo" value="{{ old('proveedor_banco_codigo', $solicitud->id_banco) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_numero_cuenta" class="form-label text-center d-block">N° de Cuenta</label>
                                            <input type="number" id="proveedor_numero_cuenta" class="form-control text-center" name="proveedor_numero_cuenta" placeholder="Seleccione el banco" readonly
                                                    value="{{ old('proveedor_numero_cuenta', $solicitud->cuenta) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="numero_control" class="form-label text-center d-block">N° de Control</label>
                                            <input type="text" id="numero_control" class="form-control text-center" name="numero_control" 
                                                    value="{{ old('numero_control', $solicitud->n_control) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_neto" class="form-label text-center d-block">Monto Neto - ej: 1200.00</label>
                                            <input type="number" step="any" id="monto_neto" class="form-control text-center" name="monto_neto" 
                                                    value="{{ old('monto_neto', $solicitud->monto) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_iva" class="form-label text-center d-block">Monto del IVA - ej: 144.00</label>
                                            <input type="number" step="any" id="monto_iva" class="form-control text-center" name="monto_iva" 
                                                value="{{ old('monto_iva', $solicitud->monto_iva) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_total" class="form-label text-center d-block">Monto Total</label>
                                            <input type="number" step="any" id="monto_total" class="form-control text-center" name="monto_total" value="{{ old('monto_total', $solicitud->monto_total) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div>
                                        <h3 class="card-title text-center pt-4 pb-2">Concepto de Pago</h3>
                                    </div>
                                    
                                    <div class="form-group mt-2">
                                        <textarea class="form-control"  id="concepto_de_pago" name="concepto_de_pago" required>{{ old('concepto_de_pago', $solicitud->concepto_de_pago) }}</textarea>
                                    </div>
                                </div>

                                <div class="row pt-4 pb-2">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div>
                                                    <h5 class="card-title">Subir Archivo (Opcional)</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">Los archivos a subir deben estar en formato PDF, PNG, JPEG, JPG...</p>
                                                    <!-- imgBB file uploader -->
                                                    <input type="file" id="archivos" name="archivos[]" class="basic-filepond" multiple value="">
                                                    <!-- @foreach($documentos as $documento)
                                                    {{ old('archivos', $documento->nombre_documento) }}
                                                    @endforeach-->
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
    


    <script src="{{asset('assets/compiled/js/proveedores_modal.js')}}"></script>
    <script src="{{asset('assets/compiled/js/bancos_modal.js')}}"></script>

    <script src="{{asset('assets/compiled/js/sucursales_modal.js')}}"></script>
    <script src="{{asset('assets/compiled/js/centrocosto_empresa_modal.js')}}"></script>
    

    <script>
        $('#proveedor_nombre').on('click', function () {
            proveedores('{{ route("buscar.proveedores") }}')  
        })
    </script>

    <script>
        $('#proveedor_banco').on('click', function () {
            if ($('#proveedor_nombre').val() === "") {
                alert('Debes seleccionar un proveedor primero');
                proveedores('{{ route("buscar.proveedores") }}')  
                return
            }
            bancos('{{ route("buscar.cuentas.proveedores") }}')
        })
    </script>

    <script>
        $('#sucursal').on('click', function () {
            if ($('#empresa_codigo').val() === "") {
                alert('Debes seleccionar una empresa primero'); 
                return
            }
            sucursales('{{ route("buscar.sucursales.empresa") }}')
        })
    </script>

    <script>
        $('#centro_costo_empresa').on('click', function () {
            if ($('#empresa_codigo').val() === "") {
                alert('Debes seleccionar una empresa primero'); 
                return;
            }
            centroCosto_empresa('{{ route("buscar.centrocosto.empresa") }}')
        })
    </script>

    <script>
        $('input[type=file]').each(function(){
            filepond.create({id : $(this).attr("id") });
        })
    </script>

    <script>
        document.getElementById('btn_regresar').addEventListener('click', function() {
            if(confirm('¿Está seguro de que desea salir? Los cambios no guardados se perderán.')) {
                window.location.href="{{ route('index') }}";
            }
        });
    </script>

    <script>
        // Obtener referencias a los elementos del DOM
        const input1 = document.getElementById('monto_neto');
        const input2 = document.getElementById('monto_iva');
        const resultadoInput = document.getElementById('monto_total');

        // Función para calcular la suma y actualizar el resultado
        function calcularSuma() {
            
            const valor1 = parseFloat(input1.value) || 0;
            const valor2 = parseFloat(input2.value) || 0;

            const suma = valor1 + valor2;

            // Mostrar el resultado en el tercer input
            resultadoInput.value = suma;
        }

        // Añadir "escuchadores" de eventos a los inputs
        // Cada vez que el valor de input1 o input2 cambie, se llamará a calcularSuma()
        input1.addEventListener('input', calcularSuma);
        input2.addEventListener('input', calcularSuma);

        // Opcional: Calcular la suma inicial al cargar la página
        document.addEventListener('DOMContentLoaded', calcularSuma);

    </script>
    
@endpush

