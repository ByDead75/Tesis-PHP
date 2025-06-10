<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Campos</title>
    <link rel="stylesheet" href="prueba.css">
</head>
<body>
    <div>
        <label for="selectBanco">Banco</label>
        <select class="form-select" id="selectBanco">
            @foreach($bancos as $banco)
                <option value="{{ $banco->cod_banco }}">{{ $banco->nb_banco }}</option>
            @endforeach
        </select>

        <label for="selectCentro">Centro</label>
        <select class="form-select" id="selectCentro">
            @foreach($centros as $centro)
                <option value="{{ $centro->id_centro }}">{{ $centro->centro }}</option>
            @endforeach
        </select>

        <label for="selectProveedor">Proveedor</label>
        <select class="form-select" id="selectProveedor">
            @foreach($proveedores as $proveedor)
                <option value="{{ $proveedor->cod_tipo_auxiliar }}">{{ $proveedor->nb_auxiliar }}</option>
            @endforeach
        </select>

        <label for="selectEmpresa">Empresa</label>
        <select class="form-select" id="selectEmpresa"">
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->cod_empresa }}">{{ $empresa->nb_empresa }}</option>
            @endforeach 
        </select>

        <label for="selectCuenta">Cuenta</label>
        <select class="form-select" id="selectCuenta">
            @foreach($cuentas as $cuenta)
                <option value="{{ $cuenta->cod_auxiliar }}">{{ $cuenta->nu_cuenta }}</option>
            @endforeach
        </select>
         
    </div>
</body>
</html>