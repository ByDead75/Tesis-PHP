var direccion = function(url){
    var mbody = $('#direccionModal').find('.modal-body');
    mbody.html('');
    $('#direccionModal').modal('show');

    if ($('#direccionModal').find('.modal-body').children().length == 0) {  
        $("#spinner-direccion").show()
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
                                <input class="form-check-input" type="radio" name="direccion_codigo" id="direccion_codigo" value="0" onclick="direccion_selecionada('0', 'DIRECCION POR DEFINIR')">
                            </div>
                        </td>
                        <td class="text-bold-500"></td>
                        <td class="text-bold-500">DIRECCION POR DEFINIR</td>
                    </tr>
                `

                for (i=0; i < data.length; i++) {
                    table = table + `
                    
                    <tr>
                            <td class="text-bold-500">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="direccion_codigo" id="direccion_codigo" value="`+data[i]['cod_direccion']+`" onclick="direccion_selecionada('`+data[i]['cod_direccion']+`','`+data[i]['nb_direccion']+`' )">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['cod_direccion']+`</td>
                            <td class="text-bold-500">`+data[i]['nb_direccion']+`</td>
                        </tr>
                    `
                }

                $("#spinner-direccion").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="direccion_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Código</th>
                                                    <th>Nombre de la Dirección</th>
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

                

                new DataTable('#direccion_table', {
                    language: {
                            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                        },
                });

                
            }
        })
    }
}

var direccion_selecionada = function(codigo, nombre){
    $('#direccion_codigo').val(codigo);
    $('#direccion').val(nombre);
    $('#direccionModal').modal('hide');
}