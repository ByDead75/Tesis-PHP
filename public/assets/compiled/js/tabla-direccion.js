$(document).ready(function() {
    $(function () { 
        var table = $('#tabla_direccion').DataTable({
            processing: true,
            serverSide: true,
            bLengthChange: true,
            searching: true,
            ajax: {
                url: route_direccion,
                data: function (d) {
                    d.cod_empresa = $('#cod_empresa').val(),
                    d.nb_empresa = $('#nb_empresa').val(),
                    d.cod_direccion = $('#cod_direccion').val(),
                    d.nb_direccion = $('#nb_direccion').val()
                },
            },
            columns: [
                {data: 'actions',
                    name: 'actions',
                    orderable: false, 
                    searchable: false,
                },
                {data: 'nombre_empresa', name: 'empresa.nb_empresa' },
                {data: 'cod_empresa', name: 'cod_empresa' },
                {data: 'cod_direccion', name: 'cod_direccion' },
                {data: 'nb_direccion', name: 'nb_direccion' },
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
