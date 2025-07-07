@extends('template')

@section('title', 'Crear Solicitud')

@push('css')

@endpush

@section('content')
    <div id="main-content" class="">
        <div>
            <h2 class="card-title text-center mb-4 pb-2">Solicitud de Pago para Compras y Servicios</h2>
        </div>
        <form class="form" id="crearSolicitud" action="{{ route('ordenes.solicitud.crear') }}" method="POST">
        @csrf
            <section id="multiple-column-form" class="pb-1">
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
                                                <label class="form-label text-center d-block" for="empresa_codigo">Empresa</label>
                                                    <select class="form-select text-center" id="empresa_codigo" name="empresa_codigo" >
                                                        <option value="">Click para seleccionar su empresa</option>
                                                        @foreach($empresas as $empresa)
                                                            <option value="{{ $empresa->cod_empresa }}">{{ $empresa->nb_empresa }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label text-center d-block" for="sucursal">Surcusal / Oficina</label>
                                                    <input type="text" id="sucursal" name="sucursal" class="form-control text-center"
                                                        placeholder="Click para seleccionar su Sucursal" >
                                                    <input type="hidden" id="sucursal_codigo" name="sucursal_codigo" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label text-center d-block" for="centro_costo_empresa">Centro de Costo / Departamento </label>
                                                    <input type="text" id="centro_costo_empresa" name="centro_costo_empresa" class="form-control text-center"
                                                        placeholder="Click para seleccionar su Centro de Costo" >
                                                    <input type="hidden" id="centro_costo_empresa_codigo" class="form-control" name="centro_costo_empresa_codigo">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label text-center d-block" for="nombre_solicitante">Solicitante</label>
                                                    <p class="form-control-static text-center" id="nombre_solicitante" name="nombre_solicitante">{{ $nombre }}</p>
                                                    <input type="hidden" id="id_solicitante" class="form-control" name="id_solicitante" value="{{ $cedula }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label class="form-label text-center d-block" for="aprobador_nombre">Aprobador del Centro</label>
                                                    <input type="text" class="form-control text-center" id="aprobador_nombre" name='aprobador_nombre' disabled >
                                                    <input type="hidden" id="aprobador_codigo" class="form-control" name="aprobador_codigo">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label  class="form-label text-center d-block" for="fecha">Fecha de Solicitud</label>
                                                    <p class="form-control-static text-center" name="fecha" id="fecha" val>{{now()->format('d-m-Y')}}</p>
                                                    <input type="hidden" id="fecha_solicitud" class="form-control" name="fecha_solicitud" value="{{ now()->format('Y-m-d') }}">
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
                                                    <input type="text" id="tipo_proveedor" class="form-control text-center" 
                                                    placeholder="Seleccione el proveedor" name="tipo_proveedor" readonly >
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="proveedor_nombre" class="form-label text-center d-block">Nombre o Razón Social / Beneficiario del Pago</label>
                                                    <input type="text" id="proveedor_nombre" class="form-control text-center" 
                                                        placeholder="Clic para seleccionar un proveedor" name="proveedor_nombre" >
                                                    <input type="hidden" id="proveedor_codigo" class="form-control" name="proveedor_codigo">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="tipo_solicitud" class="form-label text-center d-block">Factura/Presupuesto</label>
                                                    <select class="form-select text-center" id="tipo_solicitud" name="tipo_solicitud" >
                                                        <option value="0">Seleccionar</option>
                                                        <option value="1">FACTURA</option>
                                                        <option value="2">PRESUPUESTO</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="proveedor_rif" class="form-label text-center d-block">Rif del Proveedor</label>
                                                    <input type="text" id="proveedor_rif" class="form-control text-center" name="proveedor_rif" 
                                                    placeholder="Seleccione el proveedor" readonly >
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="forma_pago" class="form-label text-center d-block">Forma de Pago</label>
                                                    <select class="form-select text-center" id="forma_pago" name="forma_pago" >
                                                        <option value="0">Seleccionar</option>
                                                        <option value="1">CHEQUE</option>
                                                        <option value="2">TRANSFERENCIA</option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="numero_tipo_solicitud" class="form-label text-center d-block">N° de la Factura/Presupuesto</label>
                                                    <input type="text" id="numero_tipo_solicitud" class="form-control text-center" name="numero_tipo_solicitud" 
                                                    placeholder="Ingrese el Número de la Factura" maxlength="10" oninput="checkLength1(this)">
                                                        <div id="limit-message1" style="color: red; display: none;">
                                                            El número de factura no puede exceder los 10 caracteres.
                                                        </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="proveedor_banco" class="form-label text-center d-block">Banco del Proveedor</label>
                                                    <input type="text" id="proveedor_banco" class="form-control text-center" placeholder="Clic para seleccionar un banco" name="proveedor_banco" >
                                                    <input type="hidden" id="proveedor_banco_codigo" class="form-control" name="proveedor_banco_codigo">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="proveedor_numero_cuenta" class="form-label text-center d-block">N° de Cuenta</label>
                                                    <input type="number" id="proveedor_numero_cuenta" class="form-control text-center" name="proveedor_numero_cuenta" 
                                                    placeholder="Seleccione el banco" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="numero_control" class="form-label text-center d-block">N° de Control</label>
                                                    <input type="text" id="numero_control" class="form-control text-center" name="numero_control" 
                                                    placeholder="Ingrese el Número de Control" maxlength="20" oninput="checkLength2(this)">
                                                        <div id="alert" style="color: red; display: none;"></div>
                                                        <div id="limit-message2" style="color: red; display: none;">
                                                            El número de cuenta no puede exceder los 20 caracteres.
                                                        </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="monto_neto" class="form-label text-center d-block">Monto Neto - ej: 1200.00</label>
                                                    <input type="number" step="any" min="0" id="monto_neto" class="form-control text-center" name="monto_neto" placeholder="Ingrese el Monto Neto">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="monto_iva" class="form-label text-center d-block">Monto del IVA - ej: 144.00</label>
                                                    <input type="number" step="any" min="0" id="monto_iva" class="form-control text-center" name="monto_iva" placeholder="Ingrese el Monto del IVA">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="monto_total" class="form-label text-center d-block">Monto Total</label>
                                                    <input type="number" step="any" min="0" id="monto_total" class="form-control text-center" name="monto_total" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div>
                                            <h3 class="card-title text-center pt-4 pb-2">Concepto de Pago</h3>
                                        </div>

                                        <div class="form-group mt-2">
                                            <textarea class="form-control" id="concepto_de_pago" name="concepto_de_pago" rows="3" ></textarea>
                                        </div>
                                    </div>

                                    <div class="row pt-4 pb-2">
                                        <div class="col-12">
                                            <div>
                                                <h5 class="card-title">Subir Archivo (Opcional)</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Los archivos a subir deben estar en formato PDF, PNG, JPEG, JPG...</p>
                                                    <input type="file" id="archivos" name="archivos[]" class="basic-filepond" multiple>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-between align-items-center">
                                            <button type="button" class="btn btn-secondary me-1 mb-1" id="btn_regresar" name="btn_regresar">Regresar</button>
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Enviar Solicitud</button>
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
    $('#crearSolicitud').validate({
        rules: { // <-- Alertas para cada input según su ID
            empresa_codigo: {
                required: true
            },
            sucursal: {
                required: true
            },
            centro_costo_empresa: {
                required: true
            },
            nombre_solicitante: {
                required: true
            },
            aprobador_nombre: {
                required: true
            },
            tipo_proveedor: {
                required: true
            },
            proveedor_nombre: {
                required: true
            },
            tipo_solicitud: {
                required: true
            },
            proveedor_rif: {
                required: true
            },
            forma_pago: {
                required: true
            },
            numero_tipo_solicitud: {
                required: true
            }
        },
        messages: { // <-- Mensajes personalizados para cada alerta según su ID
            empresa_codigo: {
                required: "Empresa requerida"
            },
            sucursal_codigo: {
                required: "Sucursal requerida"
            },
            centro_costo_empresa: {
                required: "Centro de costo requerido"
            },
            nombre_solicitante: {
                required: "Nombre del solicitante requerido"
            },
            aprobador_nombre: {
                required: "Nombre del aprobador requerido"
            },
            tipo_proveedor: {
                required: "Tipo de proveedor requerido"
            },
            proveedor_nombre: {
                required: "Nombre del proveedor requerido"
            },
            tipo_solicitud: {
                required: "Tipo de solicitud requerido"
            },
            proveedor_rif: {
                required: "RIF del proveedor requerido"
            },
            forma_pago: {
                required: "Forma de pago requerida"
            },
            numero_tipo_solicitud: {
                required: "Número de tipo de solicitud requerido"
            }
        }
    });
    </script>

    <script>
        function checkLength1(input) {
            const alertDiv = document.getElementById('alert');
            const limitMessageDiv = document.getElementById('limit-message1');
            
            if (input.value.length > 10) {
                alertDiv.style.display = 'block';
            } else {
                alertDiv.style.display = 'none';
            }
            if (input.value.length === 10) {
                limitMessageDiv.style.display = 'block';
            } else {
                limitMessageDiv.style.display = 'none';
            }
        }

        function checkLength2(input) {
            const alertDiv = document.getElementById('alert');
            const limitMessageDiv = document.getElementById('limit-message2');
            
            if (input.value.length > 20) {
                alertDiv.style.display = 'block';
            } else {
                alertDiv.style.display = 'none';
            }
            if (input.value.length === 20) {
                limitMessageDiv.style.display = 'block';
            } else {
                limitMessageDiv.style.display = 'none';
            }
        }
    </script>

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
                window.history.back();
                
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

