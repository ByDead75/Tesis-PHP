$(document).ready(function() {
    $(function () { 
        var table = $('#tabla_empresa').DataTable({
            processing: true,
            serverSide: true,
            bLengthChange: true,
            searching: true,
            ajax: {
                url: route_empresa,
                data: function (d) {
                    d.cod_empresa = $('#cod_empresa').val(),
                    d.nb_empresa = $('#nb_empresa').val()
                },
            },
            columns: [
                {data: 'actions',
                    name: 'actions',
                    orderable: false, 
                    searchable: false,
                },
                {data: 'cod_empresa', name: 'cod_empresa' },
                {data: 'nb_empresa', name: 'nb_empresa' },
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            }  
        });

        $('#buscar').click(function(){
            table.draw();
        });
    })
});
