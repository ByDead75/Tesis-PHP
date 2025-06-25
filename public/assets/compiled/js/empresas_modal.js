var empresas = function(url){
    var mbody = $('#empresasModal').find('.modal-body');
    mbody.html('');
    $('#empresasModal').modal('show');

    if ($('#empresasModal').find('.modal-body').children().length == 0) {  
        $("#spinner-empresas").show()
        $.ajax({
            url: url,
            type: 'GET',
            success:function(data){
                table = `
                    <tr>
                        <td class="text-bold-500">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="empresa_codigo" id="empresa_codigo" value="634" onclick="empresa_selecionada('634', 'EMPRESA POR DEFINIR')">
                            </div>
                        </td>
                        <td class="text-bold-500"></td>
                        <td class="text-bold-500">PROVEEDOR POR DEFINIR</td>
                    </tr>
                `

                for (i=0; i < data.length; i++) {
                    table = table + `
                    
                    <tr>
                            <td class="text-bold-500">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="empresa_codigo" id="empresa_codigo" value="`+data[i]['cod_empresa']+`" onclick="empresa_selecionada('`+data[i]['cod_empresa']+`','`+data[i]['nb_empresa']+`' )">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['cod_empresa']+`</td>
                            <td class="text-bold-500">`+data[i]['nb_empresa']+`</td>
                        </tr>
                    `
                }

                $("#spinner-empresas").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="empresas_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Código</th>
                                                    <th>Nombre de la Empresa</th>
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

                

                new DataTable('#empresas_table', {
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

var empresa_selecionada = function(codigo, nombre){
    $('#empresa_codigo').val(codigo);
    $('#empresa').val(nombre);
    $('#empresasModal').modal('hide');
}