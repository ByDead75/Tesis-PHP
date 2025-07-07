var proveedores = function(url){
    var mbody = $('#proveedoresModal').find('.modal-body');
    mbody.html('');
    $('#proveedoresModal').modal('show');

    if ($('#proveedoresModal').find('.modal-body').children().length == 0) {  
        $("#spinner-proveedores").show()
        $.ajax({
            url: url,
            type: 'GET',
            success:function(data){
                table = `
                    <tr>
                        <td class="text-bold-500">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="codigo_proveedor" id="codigo_proveedor" value="" onclick="proveedor_selecionado('','0', 'PROVEEDOR POR DEFINIR', '0')">
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td class="text-bold-500">PROVEEDOR POR DEFINIR</td>
                        <td></td>
                    </tr>
                `

                for (i=0; i < data.length; i++) {
                    table = table + `
                    
                    <tr>
                            <td class="text-bold-500">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="codigo_proveedor" id="codigo_proveedor" value="`+data[i]['cod_auxiliar']+`" onclick="proveedor_selecionado('`+data[i]['cod_tipo_auxiliar']+`','`+data[i]['cod_auxiliar']+`','`+data[i]['nb_auxiliar']+`','`+data[i]['rif']+`' )">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['cod_tipo_auxiliar']+`</td>
                            <td class="text-bold-500">`+data[i]['cod_auxiliar']+`</td>
                            <td class="text-bold-500">`+data[i]['nb_auxiliar']+`</td>
                            <td class="text-bold-500">`+data[i]['rif']+`</td>
                        </tr>
                    `
                }

                $("#spinner-proveedores").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="proveedores_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Tipo de proveedor</th>
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

                

                new DataTable('#proveedores_table', {
                    language: {
                            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                        },
                });

                
            }
        })
    }
}

var proveedor_selecionado = function(tipo_proveedor, codigo, nombre, rif){
    $('#tipo_proveedor').val(tipo_proveedor);
    $('#proveedor_codigo').val(codigo);
    $('#proveedor_nombre').val(nombre);
    $('#proveedor_rif').val(rif);
    $('#proveedoresModal').modal('hide');
}