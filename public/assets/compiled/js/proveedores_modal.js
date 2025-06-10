var proveedores = function(url){
    var mbody = $('#proveedoresModal').find('.modal-body');
    mbody.html('');
    $('#proveedoresModal').modal('show');

    if ($('#proveedoresModal').find('.modal-body').children().length == 0) {  
        // $("#spinner").show()
        $.ajax({
            url: url,
            type: 'GET',
            success:function(data){
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
                `

                for (i=0; i < data.length; i++) {
                    table = table + `
                        <tr>
                            <td class="text-bold-500">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="codigo_proveedor" id="codigo_proveedor" value="`+data[i]['cod_auxiliar']+`" onclick="proveedor_selecionado('`+data[i]['cod_auxiliar']+`','`+data[i]['nb_auxiliar']+`')">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['cod_auxiliar']+`</td>
                            <td class="text-bold-500">`+data[i]['nb_auxiliar']+`</td>
                            <td class="text-bold-500">`+data[i]['rif']+`</td>
                        </tr>
                    `
                }

                // $("#spinner").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="tabla_proveedores">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Código</th>
                                                    <th>Nombre del proveedor</th>
                                                    <th>RIF</th>
                                                </tr>
                                            </thead>
                                            <tbody>`
                                                +table+
                                            `</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);

                // var table1 = document.querySelector('#tabla_clinicas');
                // var dataTable = new simpleDatatables.DataTable(table1);
            }
        })
    }
}

var proveedor_selecionado = function(codigo, nombre){
    $('#proveedor_codigo').val(codigo);
    $('#proveedor_nombre').val(nombre);
    $('#proveedoresModal').modal('hide');
}