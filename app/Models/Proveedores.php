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

    public function obtener_proveedores($nb_auxiliar, $cod_auxiliar, $rif, $nit, $cod_tipo_auxiliar) {
        $resultado = self::select('proveedores.nb_auxiliar', 
        'proveedores.cod_auxiliar',
        'proveedores.rif',
        'proveedores.nit',
        DB::raw("TRIM(REPLACE(REPLACE(REPLACE(proveedores.cod_tipo_auxiliar, CHAR(13), ''), CHAR(10), ''), '\t', '')) as cod_tipo_auxiliar")
        );
        
        if($nb_auxiliar != null){
            $resultado->where('proveedores.nb_auxiliar', $nb_auxiliar);
        }
        if($cod_auxiliar != null){
            $resultado->where('proveedores.cod_auxiliar', $cod_auxiliar);
        }
        if($rif != null){
            $resultado->where('proveedores.rif', $rif);
        }
        if($nit != null){
            $resultado->where('proveedores.nit', $nit);
        }
        if($cod_tipo_auxiliar != null){
            $resultado->where('proveedores.cod_tipo_auxiliar', $cod_tipo_auxiliar);
        }else{
            $resultado->limit(100);
        }
        $resultado = $resultado->orderBy('proveedores.cod_auxiliar', 'desc')->distinct()->get();

        return $resultado;
    }
}