<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class Proveedores extends Model{

    use HasFactory;
    protected $table = "proveedores";
    
    //protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        
        'cod_tipo_auxiliar',
        'cod_auxiliar',
        'nb_auxiliar',
        'rif',
        'nit',
    ];

    public function get_proveedores() {
        $resultado = self::select(DB::raw("TRIM(REPLACE(REPLACE(REPLACE(proveedores.cod_tipo_auxiliar, CHAR(13), ''), CHAR(10), ''), '\t', '')) as cod_tipo_auxiliar"),
        'proveedores.cod_auxiliar',
        'proveedores.nb_auxiliar', 
        'proveedores.rif')
        ->distinct()->get();

        return $resultado;
    }

    public function obtener_proveedores($cod_tipo_auxiliar, $cod_auxiliar, $nb_auxiliar, $rif, $nit) {
        $resultado = self::select('proveedores.cod_auxiliar', 
        DB::raw("TRIM(REPLACE(REPLACE(REPLACE(proveedores.cod_tipo_auxiliar, CHAR(13), ''), CHAR(10), ''), '\t', '')) as cod_tipo_auxiliar"),
        DB::raw("TRIM(REPLACE(REPLACE(REPLACE(proveedores.nb_auxiliar, CHAR(13), ''), CHAR(10), ''), '\t', '')) as nb_auxiliar"),
        DB::raw("TRIM(REPLACE(REPLACE(REPLACE(proveedores.rif, CHAR(13), ''), CHAR(10), ''), '\t', '')) as rif"),
        DB::raw("TRIM(REPLACE(REPLACE(REPLACE(proveedores.nit, CHAR(13), ''), CHAR(10), ''), '\t', '')) as nit")
        );
        
        if($nb_auxiliar != null){
            $resultado->whereRaw('LOWER(proveedores.nb_auxiliar) LIKE ?', ['%' . strtolower($nb_auxiliar) . '%']);
        }
        if($cod_auxiliar != null){
            $resultado->whereRaw('LOWER(proveedores.cod_auxiliar) LIKE ?', ['%' . strtolower($cod_auxiliar) . '%']);
        }
        if($rif != null){
            $resultado->whereRaw('LOWER(proveedores.rif) LIKE ?', ['%' . strtolower($rif) . '%']);
        }
        if($nit != null){
            $resultado->whereRaw('LOWER(proveedores.nit) LIKE ?', ['%' . strtolower($nit). '%']);
        }
        if($cod_tipo_auxiliar != null){
            $resultado->whereRaw('LOWER(proveedores.cod_tipo_auxiliar) LIKE ?', ['%' . strtolower($cod_tipo_auxiliar) . '%']);
        }else{
            $resultado->limit(100);
        }
        $resultado = $resultado->orderBy('proveedores.cod_auxiliar', 'asc')->distinct()->get();

        return $resultado;
    }

    public function GetProveedorPorCodigo($cod_auxiliar){

        $resultado = self::select('proveedores.cod_auxiliar',
                                'proveedores.nb_auxiliar',
                                'proveedores.rif',
                                'proveedores.nit',
                                'proveedores.cod_tipo_auxiliar',
                                )
                            ->where('proveedores.cod_auxiliar', $cod_auxiliar)
                            ->first();
        return $resultado;
    }
}