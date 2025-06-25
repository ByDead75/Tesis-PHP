var sucursales = function(url){
    var mbody = $('#sucursalesModal').find('.modal-body');
    mbody.html('');
    $('#sucursalesModal').modal('show');

    if ($('#sucursalesModal').find('.modal-body').children().length == 0) {  
        $("#spinner-sucursales").show()
        $.ajax({
            url: url,
            type: 'GET',
            data: {codigo_empresa : $('#empresa_codigo').val()},
            dataType: "json",
            success:function(data){
                table = `
                    <tr>
                        <td class="text-bold-500">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sucursal_codigo" id="sucursal_codigo" value="634" onclick="sucursal_selecionada('634', 'SUCURSAL POR DEFINIR')">
                            </div>
                        </td>
                        <td class="text-bold-500"></td>
                        <td class="text-bold-500">SUCURSAL POR DEFINIR</td>
                    </tr>
                `

                for (i=0; i < data.length; i++) {
                    table = table + `
                    
                    <tr>
                            <td class="text-bold-500">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sucursal_codigo" id="sucursal_codigo" value="`+data[i]['COD_SUCURSAL']+`" onclick="sucursal_selecionada('`+data[i]['COD_SUCURSAL']+`','`+data[i]['NB_SUCURSAL']+`' )">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['COD_SUCURSAL']+`</td>
                            <td class="text-bold-500">`+data[i]['NB_SUCURSAL']+`</td>
                        </tr>
                    `
                }

                $("#spinner-sucursales").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="sucursales_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Código</th>
                                                    <th>Nombre de la Sucursal</th>
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

                

                new DataTable('#sucursales_table', {
                    "language": {
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sSearch": "Buscar ",
                    "searchPlaceholder": "Buscar...",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfo": "Página _PAGE_ de _PAGES_",
                    "oPaginate": {
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                },
                });

                
            }
        })
    }
}

var sucursal_selecionada = function(codigo, nombre){
    $('#sucursal_codigo').val(codigo);
    $('#sucursal').val(nombre);
    $('#sucursalesModal').modal('hide');
}