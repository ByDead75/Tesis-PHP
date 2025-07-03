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
                    d.cedula = $('#cedula').val(),
                    d.nombre = $('#nombre').val(),
                    d.cod_departamento = $('#cod_departamento').val(),
                    d.fecha_registro = $('#fecha_registro').val(),
                    d.user_master = $('#user_master').val(),
                    d.email = $('#email').val(),
                    d.cod_centro_costo = $('#cod_centro_costo').val()
                },
            },
            columns: [
                {data: 'cedula', name: 'cedula' },
                {data: 'nombre', name: 'nombre' },
                {data: 'nombre_departamento', name: 'departamento.nb_departamento' },
                {data: 'fecha_registro', name: 'fecha_registro' },
                {data: 'user_master', name: 'user_master' },
                {data: 'email', name: 'email' },
                {data: 'nombre_centro_costo', name: 'centro_costo.centro' },
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

