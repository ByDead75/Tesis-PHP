@extends('template')

@section('title', 'Editar Solicitud')

@push('css')

@endpush

@section('content')

<div id="main-content" class="">
        <div>
            <h2 class="card-title text-center mb-4 pb-2">Editar Solicitud de Pago</h2>
        </div>
    <form class="form" action="{{ route('ordenes.solicitud.registros.selecionada', $solicitud->id_solicitud) }}" method="POST">
    @csrf
    @method('PUT')
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title text-center">Datos del Solicitante</h2>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="text-center d-block" for="disabledInput">Empresa</label>
                                                <p class="form-control-static text-center d-block" id="empresa">{{ old('empresa', $solicitud->empresa) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="text-center d-block" for="disabledInput">Surcusal / Oficina</label>
                                                <p class="form-control-static text-center d-block" id="sucursal">{{ old('sucursal', $solicitud->sucursal) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="text-center d-block" for="disabledInput">Centro de Costo / Departamento </label>
                                                <p class="form-control-static text-center d-block" id="centro_de_costo">{{ old('centro_de_costo', $solicitud->centro_de_costo) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="text-center d-block" for="disabledInput">Nombre y Apellido</label>
                                                <p class="form-control-static text-center d-block" id="nombre_solicitante">{{ old('nombre_solicitante', $solicitud->nombre_solicitante) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                            <label class="text-center d-block" for="disabledInput">Aprobador del Centro</label>
                                            <p class="form-control-static text-center d-block" id="nombre_aprobador">{{ old('nombre_aprobador', $solicitud->nombre_aprobador) }}</p>
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
                        <div class="card-header">
                            <h2 class="card-title text-center">Datos del Pago</h2>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="tipo_proveedor" class="form-label">Tipo de Proveedor</label>
                                            <input type="text" id="tipo_proveedor" class="form-control" placeholder="Seleccione el proveedor" name="tipo_proveedor" readonly 
                                                    value="{{ old('tipo_proveedor', $solicitud->TipoProveedor) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_nombre" class="form-label">Nombre o Razón Social / Beneficiario del Pago</label>
                                            <input type="text" id="proveedor_nombre" class="form-control" placeholder="Clic para seleccionar un proveedor" name="proveedor_nombre"
                                                    value="{{ old('proveedor_nombre', $solicitud->proveedor_de_nombre) }}">
                                            <input type="hidden" id="proveedor_codigo" class="form-control"  name="proveedor_codigo">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="tipo_solicitud" class="form-label">Factura/Presupuesto</label>
                                                <select class="form-select" id="tipo_solicitud" name="tipo_solicitud">
                                                    <option value="">Seleccionar</option>
                                                    <option value="1" {{ old('tipo_solicitud', $solicitud->factupuesto) == '1' ? 'selected' : '' }}>FACTURA</option>
                                                    <option value="2" {{ old('tipo_solicitud', $solicitud->factupuesto) == '2' ? 'selected' : '' }}>PRESUPUESTO</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_rif" class="form-label">Rif del Proveedor</label>
                                            <input type="text" id="proveedor_rif" class="form-control" name="proveedor_rif" 
                                                    value="{{ old('proveedor_rif', $solicitud->rif) }}"
                                                    placeholder="Seleccione el proveedor" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="forma_pago" class="form-label">Forma de Pago</label>
                                                <select class="form-select" id="forma_pago" name="forma_pago">
                                                    <option value="">Seleccionar</option>
                                                    <option value="1" {{ old('forma_pago', $solicitud->id_pago) == '1' ? 'selected' : '' }}>CHEQUE</option>
                                                    <option value="2" {{ old('forma_pago', $solicitud->id_pago) == '2' ? 'selected' : '' }}>TRANSFERENCIA</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="numero_tipo_solicitud" class="form-label">N° de la Factura/Presupuesto</label>
                                            <input type="text" id="numero_tipo_solicitud" class="form-control" name="numero_tipo_solicitud" placeholder=""
                                                    value="{{ old('numero_tipo_solicitud', $solicitud->factura) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_banco" class="form-label">Banco del Proveedor</label>
                                            <input type="text" id="proveedor_banco" class="form-control" placeholder="Clic para seleccionar un banco" name="proveedor_banco"
                                                    value="{{ old('proveedor_banco', $solicitud->banco_nombre) }}">
                                            <input type="hidden" id="proveedor_banco_codigo" class="form-control"  name="proveedor_banco_codigo">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_numero_cuenta" class="form-label">N° de Cuenta</label>
                                            <input type="number" id="proveedor_numero_cuenta" class="form-control" name="proveedor_numero_cuenta" placeholder="Seleccione el banco" readonly
                                                    value="{{ old('proveedor_numero_cuenta', $solicitud->cuenta) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="numero_control" class="form-label">N° de Control</label>
                                            <input type="text" id="numero_control" class="form-control" name="numero_control" placeholder=""
                                                    value="{{ old('numero_control', $solicitud->n_control) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_neto" class="form-label">Monto Neto - ej: 1200.00</label>
                                            <input type="number" step="any" id="monto_neto" class="form-control" name="monto_neto" placeholder=""
                                                    value="{{ old('monto_neto', $solicitud->monto) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_iva" class="form-label">Monto del IVA - ej: 144.00</label>
                                            <input type="number" step="any" id="monto_iva" class="form-control" name="monto_iva" placeholder=""
                                                value="{{ old('monto_iva', $solicitud->monto_iva) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_total" class="form-label">Monto Total</label>
                                            <input type="number" step="any" id="monto_total" class="form-control" name="monto_total" value="{{ old('monto_total', $solicitud->monto_total) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div>
                                        <h3 class="card-title text-center pt-4 pb-2">Concepto de Pago</h3>
                                    </div>
                                    
                                    <div class="form-group mt-2">
                                        <textarea class="form-control" id="concepto_de_pago" rows="3">{{ old('concepto_de_pago', $solicitud->concepto_de_pago) }}</textarea>
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
                                                    <p class="card-text">Los archivos a subir deben estar en formato PDF, PNG, JPEG, GIF...</p>
                                                    <!-- imgBB file uploader -->
                                                    <input type="file" name="image" id="image" class="imgbb-filepond" 
                                                            value="{{ old('image', $solicitud->imagen) }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-secondary me-1 mb-1">Regresar</button>
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

