@extends('template')

@section('title', 'Generar Solicitud')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/compiled/css/generar-solicitud.css')}}">
    
    
@endpush

@section('content')
    <div id="main-content" class="pb-1">
        <div>
            <h2 class="card-title text-center mb-4 pb-2">Solicitud de Pago para Compras y Servicios</h2>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title text-center">Datos del Solicitante</h2>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="text-center d-block" for="disabledInput">Empresa</label>
                                                <p class="form-control-static text-center d-block" id="staticInput">"Empresa aqui"</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="text-center d-block" for="disabledInput">Surcusal / Oficina</label>
                                                <p class="form-control-static text-center d-block" id="staticInput">"Surcusal / Oficina aqui"</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="text-center d-block" for="disabledInput">Centro de Costo / Departamento </label>
                                                <p class="form-control-static text-center d-block" id="staticInput">"Centro de Costo aqui"</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="text-center d-block" for="disabledInput">Nombre y Apellido</label>
                                                <p class="form-control-static text-center d-block" id="staticInput">"Nombre y Apellido aqui"</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                            <label class="text-center d-block" for="disabledInput">Aprobador del Centro</label>
                                            <p class="form-control-static text-center d-block" id="staticInput">"Aprobador del Centro aqui"</p>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


<div id="main-content" class="pt-1">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title text-center">Datos del Pago</h2>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="tipo_proveedor" class="form-label">Tipo de Proveedor</label>
                                            <input type="text" id="tipo_proveedor" class="form-control" placeholder="Seleccione el proveedor" name="tipo_proveedor" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_nombre" class="form-label">Nombre o Razón Social / Beneficiario del Pago</label>
                                            <input type="text" id="proveedor_nombre" class="form-control" placeholder="Clic para seleccionar un proveedor" name="proveedor_nombre">
                                            <input type="hidden" id="proveedor_codigo" class="form-control"  name="proveedor_codigo">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="tipo_solicitud" class="form-label">Factura/Presupuesto</label>
                                                <select class="form-select" id="tipo_solicitud">
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">FACTURA</option>
                                                    <option value="2">PRESUPUESTO</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_rif" class="form-label">Rif del Proveedor</label>
                                            <input type="text" id="proveedor_rif" class="form-control" name="proveedor_rif" placeholder="Seleccione el proveedor" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="forma_pago" class="form-label">Forma de Pago</label>
                                                <select class="form-select" id="forma_pago">
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">CHEQUE</option>
                                                    <option value="2">TRANSFERENCIA</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="numero_tipo_solicitud" class="form-label">N° de la Factura/Presupuesto</label>
                                            <input type="text" id="numero_tipo_solicitud" class="form-control" name="numero_tipo_solicitud" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_banco" class="form-label">Banco del Proveedor</label>
                                            <input type="text" id="proveedor_banco" class="form-control" placeholder="Clic para seleccionar un banco" name="proveedor_banco">
                                            <input type="hidden" id="proveedor_banco_codigo" class="form-control"  name="proveedor_banco_codigo">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_numero_cuenta" class="form-label">N° de Cuenta</label>
                                                <input type="number" id="proveedor_numero_cuenta" class="form-control" name="proveedor_numero_cuenta" placeholder="Seleccione el banco" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="numero_control" class="form-label">N° de Control</label>
                                            <input type="text" id="numero_control" class="form-control" name="numero_control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_neto" class="form-label">Monto Neto - ej: 1200.00</label>
                                            <input type="number" step="any" id="monto_neto" class="form-control" name="monto_neto">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_iva" class="form-label">Monto del IVA - ej: 144.00</label>
                                            <input type="number" step="any" id="monto_iva" class="form-control" name="monto_iva">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="monto_total" class="form-label">Monto Total</label>
                                            <input type="number" step="any" id="monto_total" class="form-control" name="monto_total">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div>
                                        <h3 class="card-title text-center pt-4 pb-2">Concepto de Pago</h3>
                                    </div>
                                    <div class="form-group mt-2">
                                        <textarea class="form-control" id="concepto_de_pago" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="row pt-4 pb-2">
                                    <x-file_upload/>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-secondary me-1 mb-1">Regresar</button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Enviar Solicitud</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

