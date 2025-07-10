$(document).ready(function() {
    $(function () { 
        var table = $('#tabla_proveedor').DataTable({
            processing: true,
            serverSide: true,
            bLengthChange: true,
            searching: true,
            ajax: {
                url: route_proveedor,
                data: function (d) {
                    d.cod_tipo_auxiliar = $('#cod_tipo_auxiliar').val(),
                    d.nb_auxiliar = $('#nb_auxiliar').val(),
                    d.rif = $('#rif').val()
                },
            },
            columns: [
                {data: 'actions',
                    name: 'actions',
                    orderable: false, 
                    searchable: false,
                },
                {data: 'nb_auxiliar', name: 'nb_auxiliar' },
                {data: 'cod_auxiliar', name: 'cod_auxiliar' },                
                {data: 'rif', name: 'rif' },
                {data: 'nit', name: 'nit' },
                {data: 'cod_tipo_auxiliar', name: 'cod_tipo_auxiliar' },
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

