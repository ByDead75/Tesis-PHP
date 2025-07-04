$(document).ready(function() {
    $(function () { 
        var table = $('#registros_status_solicitudes').DataTable({
            processing: true,
            serverSide: true,
            bLengthChange: true,
            searching: true,
            ajax: {
                url: route_registros_status, 
                // type: 'GET',
                // headers: {
                //     'X-CSRF-TOKEN': $('meta:eq(1)').attr('content') 
                // },
                data: function (d) {
                    d.id_solicitud = $('#id_solicitud').val(),
                    d.id_solicitante = $('#id_solicitante').val(),
                    d.fecha_desde = $('#fecha_desde').val()
                    d.fecha_hasta = $('#fecha_hasta').val()
                },
            },
            columns: [
                {data: 'actions',
                    name: 'actions',
                    orderable: false, 
                    searchable: false,
                },
                {data: 'id_solicitud', name: 'id_solicitud' },
                {data: 'nombre_solicitante', name: 'empleados1.nombre'},
                {data: 'id_solicitante', name: 'id_solicitante'},
                {data: 'fecha_solicitud', name: 'fecha_solicitud' },
                {data: 'nombre_proveedor', name: 'proveedores.nb_auxiliar'},
                {data: 'monto_total', name: 'monto_total'},
                {data: 'status_solicitud', name: 'status_solicitud'},
                

            ],
            language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
            
        });

        $('#buscar').click(function(){
            table.draw();
        });
    })
});
