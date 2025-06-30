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
            language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
            
        });

        $('#buscar').click(function(){
            table.draw();
        });
    })
});

