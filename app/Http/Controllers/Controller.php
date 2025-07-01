<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function cargar_archivo_temporal(Request $request)
    {
        if ($request->hasFile('archivos')) {
    
            $archivos = $request->file('archivos');
    
            foreach($archivos as $archivo){
                try {
                    $extension = $archivo->getClientOriginalExtension();
                } catch (\Exception $e) {
                    $extension = 'txt';
                }
                $nombre_archivo = 'documento_' . time() . '_' . time() . '.' . $extension;
                $ruta_archivo = 'public/temp/' . $nombre_archivo;
    
                if (Storage::exists($ruta_archivo)) {
                    abort(422, 'El archivo ya existe.');
                } else {
                    $archivo->storeAs('public/temp/', $nombre_archivo);
                    return $nombre_archivo;
                }
            }
        }
        
        return abort(500, 'Error en la carga');
    }

    protected function eliminar_archivo_temporal(Request $request)
    {
        $archivo_temporal = $request->getContent();

        if ($archivo_temporal) {

            Storage::delete('public/temp/' . $archivo_temporal);
        
            return $archivo_temporal;
        }

        return false;
    } 
}
