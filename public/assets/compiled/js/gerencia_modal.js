var gerencia = function(url){
    var mbody = $('#gerenciaModal').find('.modal-body');
    mbody.html('');
    $('#gerenciaModal').modal('show');

    if ($('#gerenciaModal').find('.modal-body').children().length == 0) {  
        $("#spinner-gerencia").show()
        $.ajax({
            url: url,
            type: 'GET',
            data: {codigo_empresa : $('#empresa_codigo').val(),
                    codigo_direccion : $('#direccion_codigo').val()
            },
            dataType: "json",
            success:function(data){
                table = `
                    <tr>
                        <td class="text-bold-500">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gerencia_codigo" id="gerencia_codigo" value="0" onclick="gerencia_selecionada('0', 'GERENCIA POR DEFINIR')">
                            </div>
                        </td>
                        <td class="text-bold-500"></td>
                        <td class="text-bold-500">GERENCIA POR DEFINIR</td>
                    </tr>
                `

                for (i=0; i < data.length; i++) {
                    table = table + `
                    
                    <tr>
                            <td class="text-bold-500">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gerencia_codigo" id="gerencia_codigo" value="`+data[i]['cod_gerencia']+`" onclick="gerencia_selecionada('`+data[i]['cod_gerencia']+`','`+data[i]['nb_gerencia']+`' )">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['cod_gerencia']+`</td>
                            <td class="text-bold-500">`+data[i]['nb_gerencia']+`</td>
                        </tr>
                    `
                }

                $("#spinner-gerencia").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="gerencia_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Código</th>
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

                

                new DataTable('#gerencia_table', {
                    language: {
                            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                        },
                });

                
            }
        })
    }
}

var gerencia_selecionada = function(codigo, nombre){
    $('#gerencia_codigo').val(codigo);
    $('#gerencia').val(nombre);
    $('#gerenciaModal').modal('hide');
}