$(document).on("click", ".form-control-solicitud", function () {
    $("#proveedoresModal").modal("show");

    $.ajax({
        url: url,

        type: "GET",

        success: function (data) {
            table = `

                    <tr>

                        <td class="text-bold-500">

                            <div class="form-check">

                                <input class="form-check-input" type="radio" name="codigo_suscripcion" id="codigo_suscripcion" value="634" onclick="proveedor_selecionado('634','PROVEEDOR POR DEFINIR')">

                            </div>

                        </td>

                        <td class="text-bold-500"></td>

                        <td class="text-bold-500">PROVEEDOR POR DEFINIR</td>

                        <td class="text-bold-500"></td>

                    </tr>

                `;

            for (i = 0; i < data.length; i++) {
                table =
                    table +
                    `

                        <tr>

                            <td class="text-bold-500">

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="codigo_suscripcion" id="codigo_suscripcion" value="` +
                    data[i]["codigo"] +
                    `" onclick="proveedor_selecionado('` +
                    data[i]["codigo"] +
                    `','` +
                    data[i]["nombre"] +
                    `')">

                                </div>

                            </td>

                            <td class="text-bold-500">` +
                    data[i]["codigo"] +
                    `</td>

                            <td class="text-bold-500">` +
                    data[i]["nombre"] +
                    `</td>

                            <td class="text-bold-500">` +
                    data[i]["rif"] +
                    `</td>

                        </tr>

                    `;
            }

            $("#spinner").hide();

            mbody.append(
                `

                    <div class="row" id="table-hover-row">

                        <div class="col-12">

                            <div class="card mb-0">

                                <div class="card-content">

                                    <div class="table-responsive">

                                        <table class="table table-hover mb-0" id="tabla_clinicas">

                                            <thead>

                                                <tr>

                                                    <th>#</th>

                                                    <th>Código</th>

                                                    <th>Nombre de la Clínica</th>

                                                    <th>RIF</th>

                                                </tr>

                                            </thead>

                                            <tbody>` +
                    table +
                    `</tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                `
            );

            var table1 = document.querySelector("#tabla_clinicas");

            var dataTable = new simpleDatatables.DataTable(table1);
        },
    });
});

/*
document.addEventListener('click', function(event) {
    // Check if the clicked element or its parent has the ID 'numero_cuenta'
    if (event.target.matches('.form-control-solicitud') || event.target.closest('.form-control-solicitud')) {
        if (myModal) {
            // For Bootstrap 5+ modals
            var modalInstance = bootstrap.Modal.getOrCreateInstance(myModal);

            let mtitle = myModal.querySelector('.modal-title');
            if (mtitle) { // Verifica si el elemento fue encontrado
                mtitle.innerHTML = 'este es un titulo de pruebas';
            }


            modalInstance.show();

            // If you're using an older version of Bootstrap (e.g., 3 or 4) that relies on jQuery
            // or a custom modal implementation, you might need a different approach:
            // myModal.style.display = 'block'; // Basic display toggle
            // myModal.classList.add('show'); // Add 'show' class if your CSS uses it for visibility
            // myModal.setAttribute('aria-hidden', 'false'); // Accessibility for screen readers
        }
    }
});

*/
