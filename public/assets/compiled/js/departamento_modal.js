var departamento = function(url){
    var mbody = $('#departamentoModal').find('.modal-body');
    mbody.html('');
    $('#departamentoModal').modal('show');

    if ($('#departamentoModal').find('.modal-body').children().length == 0) {  
        $("#spinner-departamento").show()
        $.ajax({
            url: url,
            type: 'GET',
            data: {codigo_empresa : $('#empresa_codigo').val(),
                    codigo_direccion : $('#direccion_codigo').val(),
                    codigo_gerencia : $('#gerencia_codigo').val()
            },
            dataType: "json",
            success:function(data){
                table = `
                    <tr>
                        <td class="text-bold-500">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="departamento_codigo" id="departamento_codigo" value="0" onclick="departamento_selecionado('0', 'DEPARTAMENTO POR DEFINIR')">
                            </div>
                        </td>
                        <td class="text-bold-500"></td>
                        <td class="text-bold-500">DEPARTAMENTO POR DEFINIR</td>
                    </tr>
                `

                for (i=0; i < data.length; i++) {
                    table = table + `
                    
                    <tr>
                            <td class="text-bold-500">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="departamento_codigo" id="departamento_codigo" value="`+data[i]['cod_departamento']+`" onclick="departamento_selecionado('`+data[i]['cod_departamento']+`','`+data[i]['nb_departamento']+`' )">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['cod_departamento']+`</td>
                            <td class="text-bold-500">`+data[i]['nb_departamento']+`</td>
                        </tr>
                    `
                }

                $("#spinner-departamento").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="departamento_table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Código</th>
                                                    <th>Nombre del Departamento</th>
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

                

                new DataTable('#departamento_table', {
                    language: {
                            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                        },
                });

                
            }
        })
    }
}

var departamento_selecionado = function(codigo, nombre){
    $('#departamento_codigo').val(codigo);
    $('#departamento').val(nombre);
    $('#departamentoModal').modal('hide');
}