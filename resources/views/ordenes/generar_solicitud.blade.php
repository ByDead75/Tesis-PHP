@extends('template')

@section('title', 'Generar Solicitud')

@push('css')

@endpush

@section('content')



    <div class="d-flex justify-content-center">
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


    <div class="d-flex justify-content-center">
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
                                            <label for="first-name-column" >Tipo de Proveedor</label>
                                            <select class="form-select" id="basicSelect">
                                                <option value="prueba">Seleccionar</option>
                                                <option value="prueba">Prueba</option>
                                                <option value="prueba">Prueba</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" >Nombre o Razón Social / Beneficiario del Pago</label>
                                            <select class="form-select" id="basicSelect">
                                                <option value="prueba">Seleccionar</option>
                                                <option value="prueba">Prueba</option>
                                                <option value="prueba">Prueba</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" >Factura/Presupuesto</label>
                                                <select class="form-select" id="basicSelect">
                                                    <option value="prueba">Seleccionar</option>
                                                    <option value="prueba">Prueba</option>
                                                    <option value="prueba">Prueba</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Rif del Proveedor</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" >Forma de Pago</label>
                                                <select class="form-select" id="basicSelect">
                                                    <option value="prueba">Seleccionar</option>
                                                    <option value="prueba">Prueba</option>
                                                    <option value="prueba">Prueba</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="company-column">N° de la Factura/Presupuesto</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" >Banco</label>
                                                <select class="form-select" id="basicSelect">
                                                    <option value="prueba">Seleccionar</option>
                                                    <option value="prueba">Prueba</option>
                                                    <option value="prueba">Prueba</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" >N° de Cuenta</label>
                                                <select class="form-select" id="basicSelect">
                                                    <option value="prueba">Seleccionar</option>
                                                    <option value="prueba">Prueba</option>
                                                    <option value="prueba">Prueba</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="company-column">N° de Control</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Monto Neto - ej: 1200.00</label>
                                            <input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Monto del IVA - ej: 144.00</label>
                                            <input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Monto Total</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                                        </div>
                                    </div>
                                    

                            <section class="section">
                                        <div class="row">
                                            <div class="col">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="text-center">Concepto de Pago</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group mt-2">
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </section>

                            <div>
                                <x-file_upload/>
                            </div>
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

    <div>

    </div>

    <script src="/public/assets/compiled/js/app.js"></script>
    <script src="./assets/compiled/js/app.js"></script>

@endsection

@push('js')

@endpush