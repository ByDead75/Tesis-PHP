$(document).ready(function() {
    $(function () { 
        var table = $('#tabla_sucursales').DataTable({
            processing: true,
            serverSide: true,
            bLengthChange: true,
            searching: true,
            ajax: {
                url: route_sucursal,
                data: function (d) {
                    d.codigo_empresa = $('#codigo_empresa').val(),
                    d.nombre_empresa = $('#nombre_empresa').val(),
                    d.codigo_sucursal = $('#codigo_sucursal').val(),
                    d.nombre_sucursal = $('#nombre_sucursal').val()
                },
            },
            columns: [
                {data: 'actions',
                    name: 'actions',
                    orderable: false, 
                    searchable: false,
                },
                {data: 'COD_EMPRESA', name: 'COD_EMPRESA' },
                {data: 'nombre_empresa', name: 'empresa.nb_empresa' },
                {data: 'COD_SUCURSAL', name: 'COD_SUCURSAL' },
                {data: 'NB_SUCURSAL', name: 'NB_SUCURSAL' },
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

