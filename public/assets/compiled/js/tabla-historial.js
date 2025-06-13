$(document).ready(function() {
    $('#tabla_historial').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/historial/obtener", 
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta:eq(1)').attr('content') 
            }
        },
        columns: [
            { data: 'id_solicitud', name: 'id_solicitud' },
            {data: 'nombre_solicitante', name: 'nombre_solicitante'},
            {data: 'id_solicitante', name: 'id_solicitante'},
            { data: 'fecha_solicitud', name: 'fecha_solicitud' },
            {data: 'rif', name: 'rif'},
            {data: 'monto_total', name: 'monto_total'},
            {data: 'status_solicitud', name: 'status_solicitud'},
            

        ],
        "language": {
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sSearch": "Buscar ",
                    "searchPlaceholder": "Buscar...",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "oPaginate": {
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "emptyTable": "No hay datos disponibles en la tabla",
                        // Personaliza el texto del "Mostrando X entradas" del select
                        "lengthMenu": "Mostrar _MENU_ entradas",
                        // Personaliza el texto cuando está procesando (cargando)
                        "processing": "Procesando..."
                },
    });
});

