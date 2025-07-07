var registro_bancos = function(url){
    var mbody = $('#bancoRegistrarModal').find('.modal-body');
    mbody.html('');
    $('#bancoRegistrarModal').modal('show');

    console.log($('#bancoRegistrarModal'));

    if ($('#bancoRegistrarModal').find('.modal-body').children().length == 0) {  
        $("#spinner-bancos-registrar").show()
        $.ajax({
            url: url,
            type: 'GET',
            success:function(data){
                table = `
                    <tr>
                        <td class="text-bold-500">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="banco_codigo" id="banco_codigo" value="0" onclick="registro_banco_selecionado('634', 'BANCO POR DEFINIR')">
                            </div>
                        </td>
                        <td class="text-bold-500"></td>
                        <td class="text-bold-500">BANCO POR DEFINIR</td>
                    </tr>
                `

                for (i=0; i < data.length; i++) {
                    table = table + `
                    
                    <tr>
                            <td class="text-bold-500">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="banco_codigo" id="banco_codigo" value="`+data[i]['cod_banco']+`" onclick="registro_banco_selecionado('`+data[i]['cod_banco']+`','`+data[i]['nb_banco']+`' )">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['cod_banco']+`</td>
                            <td class="text-bold-500">`+data[i]['nb_banco']+`</td>
                        </tr>
                    `
                }

                $("#spinner-bancos-registrar").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="registrar_banco_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Código del Banco</th>
                                                    <th>Nombre del Banco</th>
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

                

                new DataTable('#registrar_banco_table', {
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

var registro_banco_selecionado = function(codigo, nombre){
    $('#registro_banco_codigo').val(codigo);
    $('#registro_banco').val(nombre);
    $('#bancoRegistrarModal').modal('hide');
}