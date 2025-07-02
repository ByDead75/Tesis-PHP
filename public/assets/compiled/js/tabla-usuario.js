$(document).ready(function() {
    $(function () { 
        var table = $('#tabla_usuario').DataTable({
            processing: true,
            serverSide: true,
            bLengthChange: true,
            searching: true,
            ajax: {
                url: route_usuario,
                data: function (d) {
                    d.id = $('#id').val(),
                    d.cedula = $('#cedula').val(),
                    d.nombre = $('#nombre').val(),
                    d.cod_empresa = $('#cod_empresa').val(),
                    d.cod_direccion = $('#cod_direccion').val(),
                    d.cod_departamento = $('#cod_departamento').val(),
                    d.cod_gerencia = $('#cod_gerencia').val(),
                    d.cod_sucursal = $('#cod_sucursal').val(),
                    d.fecha_registro = $('#fecha_registro').val(),
                    d.user_master = $('#user_master').val(),
                    d.email = $('#email').val(),
                    d.cod_centro_costo = $('#cod_centro_costo').val()
                },
            },
            columns: [
                {data: 'id', name: 'id' },
                {data: 'cedula', name: 'cedula' },
                {data: 'nombre', name: 'nombre' },
                {data: 'cod_empresa', name: 'cod_empresa' },
                {data: 'cod_direccion', name: 'cod_direccion' },
                {data: 'cod_departamento', name: 'cod_departamento' },
                {data: 'cod_gerencia', name: 'cod_gerencia' },
                {data: 'cod_sucursal', name: 'cod_sucursal' },
                {data: 'fecha_registro', name: 'fecha_registro' },
                {data: 'user_master', name: 'user_master' },
                {data: 'email', name: 'email' },
                {data: 'cod_centro_costo', name: 'cod_centro_costo' },
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

