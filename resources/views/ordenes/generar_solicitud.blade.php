@extends('template')

@section('title', 'Generar Solicitud')

@push('css')
    <link rel="stylesheet" href="./assets/compiled/css/ordenes.css">
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
                                            <input type="text" id="tipo_proveedor" class="form-control" placeholder="" name="tipo_proveedor">
                                            <input type="hidden" id="tipo_proveedor_codigo" class="form-control"  name="tipo_proveedor_codigo">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column" >Nombre o Razón Social / Beneficiario del Pago</label>
                                            <input type="text" id="proveedor_nombre" class="form-control" placeholder="Clic para seleccionar un proveedor" name="proveedor_nombre">
                                            <input type="hidden" id="proveedor_codigo" class="form-control"  name="proveedor_codigo">
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
                                            <select class="form-select" id="selectBanco">
                                                <option value="">Seleccionar</option>
                                                @foreach($bancos as $banco)     
                                                    <option value="{{ $banco->cod_banco }}">{{ $banco->nb_banco }}</option>
                                                @endforeach
                                            </select>
                                            <x-modal id="" title="" />
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

                            <div>
<section class="section">
    <div class="card">
    <div class="card-header">
    <h5 class="card-title">
    Minimal jQuery Datatable
    </h5>
    </div>
    <div class="card-body">
    <div class="table-responsive datatable-minimal">
    <table class="table" id="table2">
    <thead>
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>City</th>
    <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>Graiden</td>
    <td>vehicula.aliquet@semconsequat.co.uk</td>
    <td>076 4820 8838</td>
    <td>Offenburg</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Dale</td>
    <td>fringilla.euismod.enim@quam.ca</td>
    <td>0500 527693</td>
    <td>New Quay</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Nathaniel</td>
    <td>mi.Duis@diam.edu</td>
    <td>(012165) 76278</td>
    <td>Grumo Appula</td>
    <td>
        <span class="badge bg-danger">Inactive</span>
    </td>
    </tr>
    <tr>
    <td>Darius</td>
    <td>velit@nec.com</td>
    <td>0309 690 7871</td>
    <td>Ways</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Oleg</td>
    <td>rhoncus.id@Aliquamauctorvelit.net</td>
    <td>0500 441046</td>
    <td>Rossignol</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Kermit</td>
    <td>diam.Sed.diam@anteVivamusnon.org</td>
    <td>(01653) 27844</td>
    <td>Patna</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Jermaine</td>
    <td>sodales@nuncsit.org</td>
    <td>0800 528324</td>
    <td>Mold</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Ferdinand</td>
    <td>gravida.molestie@tinciduntadipiscing.org</td>
    <td>(016977) 4107</td>
    <td>Marlborough</td>
    <td>
        <span class="badge bg-danger">Inactive</span>
    </td>
    </tr>
    <tr>
    <td>Kuame</td>
    <td>Quisque.purus@mauris.org</td>
    <td>(0151) 561 8896</td>
    <td>Tresigallo</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Deacon</td>
    <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
    <td>07740 599321</td>
    <td>Karapınar</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Channing</td>
    <td>tempor.bibendum.Donec@ornarelectusante.ca</td>
    <td>0845 46 49</td>
    <td>Warrnambool</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Aladdin</td>
    <td>sem.ut@pellentesqueafacilisis.ca</td>
    <td>0800 1111</td>
    <td>Bothey</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Cruz</td>
    <td>non@quisturpisvitae.ca</td>
    <td>07624 944915</td>
    <td>Shikarpur</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Keegan</td>
    <td>molestie.dapibus@condimentumDonecat.edu</td>
    <td>0800 200103</td>
    <td>Assen</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Ray</td>
    <td>placerat.eget@sagittislobortis.edu</td>
    <td>(0112) 896 6829</td>
    <td>Hofors</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Maxwell</td>
    <td>diam@dapibus.org</td>
    <td>0334 836 4028</td>
    <td>Thane</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Carter</td>
    <td>urna.justo.faucibus@orci.com</td>
    <td>07079 826350</td>
    <td>Biez</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Stone</td>
    <td>velit.Aliquam.nisl@sitametrisus.com</td>
    <td>0800 1111</td>
    <td>Olivar</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Berk</td>
    <td>fringilla.porttitor.vulputate@taciti.edu</td>
    <td>(0101) 043 2822</td>
    <td>Sanquhar</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Philip</td>
    <td>turpis@euenimEtiam.org</td>
    <td>0500 571108</td>
    <td>Okara</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Kibo</td>
    <td>feugiat@urnajustofaucibus.co.uk</td>
    <td>07624 682306</td>
    <td>La Cisterna</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Bruno</td>
    <td>elit.Etiam.laoreet@luctuslobortisClass.edu</td>
    <td>07624 869434</td>
    <td>Rocca d"Arce</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Leonard</td>
    <td>blandit.enim.consequat@mollislectuspede.net</td>
    <td>0800 1111</td>
    <td>Lobbes</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Hamilton</td>
    <td>mauris@diam.org</td>
    <td>0800 256 8788</td>
    <td>Sanzeno</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Harding</td>
    <td>Lorem.ipsum.dolor@etnetuset.com</td>
    <td>0800 1111</td>
    <td>Obaix</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    <tr>
    <td>Emmanuel</td>
    <td>eget.lacus.Mauris@feugiatSednec.org</td>
    <td>(016977) 8208</td>
    <td>Saint-Remy-Geest</td>
    <td>
        <span class="badge bg-success">Active</span>
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
</section>
                            </div>

                            
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

@include('components.modal')

@endsection

@push('js')
<!--Funcionalidad de Perfil (Generar Solicitud) -->
    
    <script src="./assets/compiled/js/proveedores_modal.js"></script>

    <script>
        $('#proveedor_nombre').on('click', function () {
            proveedores('{{ url("proveedores/index") }}')
        })
    </script>

    
@endpush