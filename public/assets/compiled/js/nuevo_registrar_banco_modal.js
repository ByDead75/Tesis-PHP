var nuevo_registro_bancos = function(url){
    var mbody = $('#nuevoBancoRegistrarModal').find('.modal-body');
    mbody.html('');
    $('#nuevoBancoRegistrarModal').modal('show');

    console.log($('#nuevoBancoRegistrarModal'));

    if ($('#nuevoBancoRegistrarModal').find('.modal-body').children().length == 0) {  
        $("#spinner-nuevo-banco-registrar").show()
        $.ajax({
            url: url,
            type: 'GET',
            success:function(data){
                table = `
                    <tr>
                        <td class="text-bold-500">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="banco_codigo" id="banco_codigo" value="0" onclick="registro_nuevo_banco_selecionado('634', 'BANCO POR DEFINIR')">
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
                                    <input class="form-check-input" type="radio" name="banco_codigo" id="banco_codigo" value="`+data[i]['cod_banco']+`" onclick="registro_nuevo_banco_selecionado('`+data[i]['cod_banco']+`','`+data[i]['nb_banco']+`' )">
                                </div>
                            </td>
                            <td class="text-bold-500">`+data[i]['cod_banco']+`</td>
                            <td class="text-bold-500">`+data[i]['nb_banco']+`</td>
                        </tr>
                    `
                }

                $("#spinner-nuevo-banco-registrar").hide();
                mbody.append(`
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="nuevo_registrar_banco_table">
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

                

                new DataTable('#nuevo_registrar_banco_table', {
                    language: {
                            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                        },
                });

                
            }
        })
    }
}

var registro_nuevo_banco_selecionado = function(codigo, nombre){
    $('#nuevo_registro_banco_codigo').val(codigo);
    $('#nuevo_registro_banco').val(nombre);
    $('#nuevoBancoRegistrarModal').modal('hide');
}