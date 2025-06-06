<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Input</title>
    <link rel="stylesheet" href="prueba.css">
</head>
<body>
    <div>
        <select class="form-select" id="basicSelect">

            @foreach($bancos as $banco)
                <option value="{{ $banco->cod_banco }}">{{ $banco->nb_banco }}</option>
            @endforeach
            
        </select>

        <select class="form-select" id="basicSelect">

            @foreach($centros as $centro)
                <option value="{{ $centro->id_centro }}">{{ $centro->centro }}</option>
            @endforeach
            
        </select>
    
    </div>
</body>
</html>