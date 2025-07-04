var centro_costo = function(url){
    var mbody = $('#centroDeCostoModal').find('.modal-body');
    mbody.html('');
    $('#centroDeCostoModal').modal('show');

    if ($('#centroDeCostoModal').find('.modal-body').children().length == 0) {  
        $("#spinner-centroDeCosto").show()
        $.ajax({
            url: url,
            type: 'GET',
            data: {codigo_empresa : $('#empresa_codigo').val(),
                    codigo_gerencia : $('#gerencia_codigo').val()
            },
            dataType: "json",
            success:function(data){
                table = `
                    <tr>
                        <td class="text-bold-500">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="centro_costo_codigo" id="centro_costo_codigo" value="634" onclick="centro_costo_selecionado('0', 'CENTRO DE COSTO POR DEFINIR')">
                            </div>
                        </td>
                        <td class="text-bold-500"></td>
                        <td class="text-bold-500">CENTRO DE COSTO POR DEFINIR</td>
                    </tr>
                `

                for (i=0; i < data.length; i++) {
                    table = table + `
                    
                    <tr>
                            <td class="text-bold-500">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="centro_costo_codigo" id="centro_costo_codigo" value="`+data[i]['id_centro']+`" onclick="centro_costo_selecionado('`+data[i]['id_centro']+`','`+data[i]['centro']+`' )">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['id_centro']+`</td>
                            <td class="text-bold-500">`+data[i]['centro']+`</td>
                        </tr>
                    `
                }

                $("#spinner-centroDeCosto").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="centro_costo_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Código</th>
                                                    <th>Nombre del Centro de Costo</th>
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

                

                new DataTable('#centro_costo_table', {
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

var centro_costo_selecionado = function(codigo, nombre){
    $('#centro_costo_codigo').val(codigo);
    $('#centro_costo').val(nombre);
    $('#centroDeCostoModal').modal('hide');
}