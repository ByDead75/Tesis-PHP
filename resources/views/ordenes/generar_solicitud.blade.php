@extends('template')

@section('title', 'Generar Solicitud')

@push('css')
    <link rel="stylesheet" href="./assets/compiled/css/ordenes.css">
    <link rel="stylesheet" href="./assets/compiled/css/tables.css">
@endpush

@section('content')
    <div id="main-content" class="pb-1">
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
                                                <label for="disabledInput">Empresa</label>
                                                <p class="form-control-static" id="staticInput">"Empresa aqui"</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="disabledInput">Surcusal / Oficina</label>
                                                <p class="form-control-static" id="staticInput">"Surcusal / Oficina aqui"</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="disabledInput">Centro de Costo</label>
                                                <p class="form-control-static" id="staticInput">"Centro de Costo aqui"</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="disabledInput">Nombre y Apellido</label>
                                                <p class="form-control-static" id="staticInput">"Nombre y Apellido aqui"</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                            <label for="disabledInput">Aprobador del Centro</label>
                                            <p class="form-control-static" id="staticInput">"Aprobador del Centro aqui"</p>
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


<div id="main-content" class="">
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
                                            <label for="tipo_proveedor_column" class="form-label">Tipo de Proveedor</label>
                                            <input type="text" id="tipo_proveedor" class="form-control" placeholder="Seleccione el proveedor" name="tipo_proveedor" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="proveedor_nombre_column" class="form-label">Nombre o Razón Social / Beneficiario del Pago</label>
                                            <input type="text" id="proveedor_nombre" class="form-control" placeholder="Clic para seleccionar un proveedor" name="proveedor_nombre">
                                            <input type="hidden" id="proveedor_codigo" class="form-control"  name="proveedor_codigo">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Factura/Presupuesto</label>
                                                <select class="form-select" id="basicSelect">
                                                    <option value="">Seleccionar</option>
                                                    <option value="FACTURA">FACTURA</option>
                                                    <option value="PRESUPUESTO">PRESUPUESTO</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Rif del Proveedor</label>
                                            <input type="text" id="proveedor_rif" class="form-control" name="proveedor_rif" placeholder="Seleccione el proveedor" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Forma de Pago</label>
                                                <select class="form-select" id="basicSelect">
                                                    <option value="">Seleccionar</option>
                                                    <option value="FACTURA">FACTURA</option>
                                                    <option value="PRESUPUESTO">PRESUPUESTO</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label">N° de la Factura/Presupuesto</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Banco del Proveedor</label>
                                            <input type="text" id="proveedor_banco" class="form-control" placeholder="Clic para seleccionar un banco" name="proveedor_banco">
                                            <input type="hidden" id="proveedor_banco_codigo" class="form-control"  name="proveedor_banco_codigo">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">N° de Cuenta</label>
                                                <input type="text" id="proveedor_numero_cuenta" class="form-control" name="proveedor_numero_cuenta" placeholder="Seleccione el banco" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label">N° de Control</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column" class="form-label">Monto Neto - ej: 1200.00</label>
                                            <input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="country-floating" class="form-label">Monto del IVA - ej: 144.00</label>
                                            <input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="company-column" class="form-label">Monto Total</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div>
                                        <h3 class="text-center pt-4 pb-2">Concepto de Pago</h3>
                                    </div>
                                    <div class="form-group mt-2">
                                        <textarea class="form-control" id="solicitud_texto" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="row pt-4 pb-2">
                                    <x-file_upload/>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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
    
    <script src="./assets/compiled/js/proveedores_modal.js"></script>
    <script src="./assets/compiled/js/bancos_modal.js"></script>
    

    <script>
        $('#proveedor_nombre').on('click', function () {
            proveedores('{{ url("proveedores/index") }}')  
        })
    </script>

    <script>
        $('#proveedor_banco').on('click', function () {
            if ($('#proveedor_nombre').val() === "") {
                alert('Debes seleccionar un proveedor primero');
                proveedores('{{ url("proveedores/index") }}')  
                return
            }
            bancos('{{ route("cuentas.proveedores.index") }}')
        })
    </script>

    
    
@endpush

<!-- 
    -->