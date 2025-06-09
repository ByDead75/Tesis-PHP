@extends('template')

@section('title', 'Generar Solicitud')

@push('css')

@endpush

@section('content')

    <div>
        <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Datos del Solicitante</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disabledInput">Empresa</label>
                            <p class="form-control-static" id="staticInput">"Empresa aqui"</p>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Surcusal / Oficina</label>
                            <p class="form-control-static" id="staticInput">"Surcusal / Oficina aqui"</p>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Centro de Costo</label>
                            <p class="form-control-static" id="staticInput">"Centro de Costo aqui"</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disabledInput">Nombre y Apellido</label>
                            <p class="form-control-static" id="staticInput">"Nombre y Apellido aqui"</p>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Aprobador del Centro</label>
                            <p class="form-control-static" id="staticInput">"Aprobador del Centro aqui"</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="me-1 mb-1 d-inline-block">
                                <!-- Button trigger for large size modal -->
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                    data-bs-target="#large">
                                    Large Modal
                                </button>
                                <!--large size Modal -->
                                <div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel17" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel17">Large Modal</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                a
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="button" class="btn btn-primary ms-1"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Accept</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

                            


    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Concepto de Pago
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <div>
        <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Datos del Pago</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group modal-small">
                                            <label for="first-name-column">First Name</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Last Name</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname-column">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="city-column">City</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Country</label>
                                            <input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Company</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Country</label>
                                            <input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Company</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Country</label>
                                            <input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Company</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <div class="form-check">
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox5" class="form-check-input" checked="">
                                                <label for="checkbox5">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group mandatory">
                            <fieldset>
                                <label class="form-label"> Favourite Colour </label>
                                <div class="col-6">
                                    <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="flexRadioDefault"
                                        id="flexRadioDefault1"
                                        data-parsley-required="true"
                                    />
                                    <label
                                        class="form-check-label form-label"
                                        for="flexRadioDefault1"
                                    >
                                        Red
                                    </label>
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="flexRadioDefault"
                                    id="flexRadioDefault2"
                                />
                                <label
                                    class="form-check-label form-label"
                                    for="flexRadioDefault2"
                                >
                                    Blue
                                </label>
                                </div>
                                </div>

                            </fieldset>
                        </div>
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

    <div>

    </div>

    <script src="/public/assets/compiled/js/app.js"></script>
    <script src="./assets/compiled/js/app.js"></script>

@endsection

@push('js')

@endpush