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
                    d.cedula = $('#').val(),
                    d.nombre = $('#').val(),
                    d.cod_departamento = $('#').val(),
                    d.fecha_registro = $('#').val(),
                    d.user_master = $('#').val(),
                    d.email = $('#').val(),
                    d.cod_centro_costo = $('#').val()
                },
            },
            columns: [
                {data: 'actions',
                    name: 'actions',
                    orderable: false, 
                    searchable: false,
                },
                {data: '', name: '' },
                {data: '', name: '' },
                {data: '', name: '' },
                {data: '', name: '' },
                {data: '', name: '' },
                {data: '', name: '' },
                {data: '', name: '' },
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


