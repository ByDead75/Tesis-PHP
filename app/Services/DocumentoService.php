<?php

namespace App\Services;

use App\Models\Dual;
use App\Models\Documento;
use Illuminate\Support\Facades\Storage;

class DocumentoService 
{

    public static function copiar($from_path, $to_path)
    {
        if (!Storage::exists($from_path)) {
            throw new \Exception('El archivo de origen no existe: ' . $from_path);
        }
    
        $contenido = Storage::get($from_path);
        
        if ($contenido === null) {
            throw new \Exception('No se pudo obtener el contenido del archivo: ' . $from_path);
        }
    
        Storage::put($to_path, $contenido);
    
        if (!Storage::exists($to_path)) {
            throw new \Exception('El archivo no se guardó, intente de nuevo');
        }
    
        return;
    }

    public static function guardar(array $data)
    {
        $documento = Documento::create($data);

        return $documento;
    }

    public static function eliminar($from_path)
    {
        $intentos = 1;
        $eliminado = false;
    
        for ($i = 0; $i < $intentos; $i++) {
            if (Storage::exists($from_path)) {
                $eliminado = Storage::delete($from_path);
            }
    
            if ($eliminado) {
                break;
            }

            sleep(1);
        }

        return;
    }
}
