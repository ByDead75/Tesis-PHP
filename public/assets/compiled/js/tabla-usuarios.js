$(document).ready(function() {
    $(function () { 
        var table = $('#tabla_usuarios').DataTable({
            processing: true,
            serverSide: true,
            bLengthChange: true,
            searching: true,
            ajax: {
                url: route_usuarios,
                data: function (d) {
                    d.cedula = $('#cedula').val()
                },
            },
            columns: [
                {data: 'cedula', name: 'cedula' },
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
                            "lengthMenu": "Mostrar _MENU_ entradas",
                            "processing": "Procesando..."
                    },
            
        });

        $('#buscar').click(function(){
            table.draw();
        });
    })
});


                
