var bancos = function(url){
    var mbody = $('#bancosModal').find('.modal-body');
    mbody.html('');
    $('#bancosModal').modal('show');

    if ($('#bancosModal').find('.modal-body').children().length == 0) {  
        $("#spinner-cuentas-proveedores").show()
        $.ajax({
            url: url,
            type: 'GET',
            data: {codigo_proveedor : $('#proveedor_codigo').val()},
            dataType: "json",
            success:function(data){
                table =`
                    <tr>
                        <td class="text-bold-500">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="codigo_banco" id="codigo_banco" value="0" onclick="banco_selecionado('0', 'CUENTA BANCARIA POR DEFINIR', '0')">
                            </div>
                        </td>
                        <td class="text-bold-500"></td>
                        <td class="text-bold-500">CUENTA BANCARIA POR DEFINIR</td>
                        <td class="text-bold-500">POR DEFINIR</td>
                    </tr>
                `

                for (i=0; i < data.length; i++) {
                    table = table + `
                    
                    <tr>
                            <td class="text-bold-500">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="codigo_banco" id="codigo_banco" value="" onclick="banco_selecionado('`+data[i]['cod_banco']+`','`+data[i]['nb_banco']+`','`+data[i]['nu_cuenta']+`' )">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['cod_banco']+`</td>
                            <td class="text-bold-500">`+data[i]['nb_banco']+`</td>
                            <td class="text-bold-500">`+data[i]['nu_cuenta']+`</td>
                        </tr>
                    `
                }

                $("#spinner-cuentas-proveedores").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="proveedores_bancos_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Código del Banco</th>
                                                    <th>Banco Destino</th>
                                                    <th>N° de Cuenta</th>
                                                    
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

                

                new DataTable('#proveedores_bancos_table', {
                    language: {
                            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                        },
                });

                
            }
        })
    }
}

var banco_selecionado = function(codigo_banco, banco_proveedor, cuenta_proveedor){
    $('#proveedor_banco_codigo').val(codigo_banco);
    $('#proveedor_banco').val(banco_proveedor);
    $('#proveedor_numero_cuenta').val(cuenta_proveedor);
    $('#bancosModal').modal('hide');
}