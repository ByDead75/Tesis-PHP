$(document).ready(function() {
    $(function () { 
        var table = $('#tabla_departamento').DataTable({
            processing: true,
            serverSide: true,
            bLengthChange: true,
            searching: true,
            ajax: {
                url: route_departamento,
                data: function (d) {
                    d.cod_empresa = $('#cod_empresa').val(),
                    d.cod_direccion = $('#cod_direccion').val(),
                    d.cod_gerencia = $('#cod_gerencia').val(),
                    d.cod_departamento = $('#cod_departamento').val(),
                    d.nb_departamento = $('#nb_departamento').val()
                },
            },
            columns: [
                {data: 'actions',
                    name: 'actions',
                    orderable: false, 
                    searchable: false,
                },
                {data: 'nombre_empresa', name: 'empresa.nb_empresa' },
                {data: 'nombre_direccion', name: 'direccion.nb_direccion' },
                {data: 'nombre_gerencia', name: 'gerencia.nb_gerencia' },
                {data: 'cod_departamento', name: 'cod_departamento' },
                {data: 'nb_departamento', name: 'nb_departamento' },
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


