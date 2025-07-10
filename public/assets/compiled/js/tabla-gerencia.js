$(document).ready(function() {
    $(function () { 
        var table = $('#tabla_gerencia').DataTable({
            processing: true,
            serverSide: true,
            bLengthChange: true,
            searching: true,
            ajax: {
                url: route_gerencia,
                data: function (d) {
                    d.codigo_empresa = $('#codigo_empresa').val(),
                    d.nombre_empresa = $('#nombre_empresa').val(),
                    d.codigo_direccion = $('#codigo_direccion').val(),
                    d.nombre_direccion = $('#nombre_direccion').val(),
                    d.codigo_gerencia = $('#codigo_gerencia').val(),
                    d.nombre_gerencia = $('#nombre_gerencia').val()
                },
            },
            columns: [
                {data: 'actions',
                    name: 'actions',
                    orderable: false, 
                    searchable: false,
                },
                {data: 'cod_empresa', name: 'cod_empresa' },
                {data: 'nombre_empresa', name: 'empresa.nb_empresa' },
                {data: 'cod_direccion', name: 'cod_direccion' },
                {data: 'nombre_direccion', name: 'direccion.nb_direccion' },
                {data: 'cod_gerencia', name: 'cod_gerencia' },
                {data: 'nb_gerencia', name: 'nb_gerencia' },
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


