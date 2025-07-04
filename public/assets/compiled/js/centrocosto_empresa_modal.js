var centroCosto_empresa = function(url){
    var mbody = $('#centroDeCostoEmpresaModal').find('.modal-body');
    mbody.html('');
    $('#centroDeCostoEmpresaModal').modal('show');

    if ($('#centroDeCostoEmpresaModal').find('.modal-body').children().length == 0) {  
        $("#spinner-centroDeCostoEmpresa").show()
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
                                <input class="form-check-input" type="radio" name="centro_costo_codigo" id="centro_costo_codigo" value="0" onclick="centro_costo_empresa_selecionado('0', 'CENTRO DE COSTO POR DEFINIR', '0', '')">
                            </div>
                        </td>
                        <td class="text-bold-500"></td>
                        <td class="text-bold-500">CENTRO DE COSTO POR DEFINIR</td>
                        <td class="text-bold-500"></td>
                    </tr>
                `

                for (i=0; i < data.length; i++) {
                    table = table + `
                    
                    <tr>
                            <td class="text-bold-500">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="centro_costo_codigo" id="centro_costo_codigo" value="`+data[i]['id_centro']+`" onclick="centro_costo_empresa_selecionado('`+data[i]['id_centro']+`','`+data[i]['centro']+`','`+data[i]['cod_aprobador']+`','`+data[i]['aprobador']+`')">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['id_centro']+`</td>
                            <td class="text-bold-500">`+data[i]['centro']+`</td>
                            <td class="text-bold-500">`+data[i]['gerencia']+`</td>
                        </tr>
                    `
                }

                $("#spinner-centroDeCostoEmpresa").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="centro_costo_empresa_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Código</th>
                                                    <th>Nombre del Centro de Costo</th>
                                                    <th>Nombre de la Gerencia</th>
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

                

                new DataTable('#centro_costo_empresa_table', {
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

var centro_costo_empresa_selecionado = function(codigo, nombre, codigo_aprobador, aprobador){
    $('#centro_costo_codigo').val(codigo);
    $('#centro_costo_empresa').val(nombre);
    $('#aprobador_codigo').val(codigo_aprobador);
    $('#aprobador_nombre').val(aprobador);
    $('#centroDeCostoEmpresaModal').modal('hide');
}