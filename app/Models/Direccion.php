<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model{

    use HasFactory;
    protected $table = "direccion";
    
    protected $primaryKey = "cod_empresa, cod_direccion";

    public $timestamps = false;

    protected $fillable = [
        
        'cod_empresa',
        'cod_direccion',
        'nb_direccion',
        'fecha_inactivacion',
    ];

    public function get_direccion_empresas($codigo_empresa) {
        $resultado = self::select('direccion.cod_direccion',
                    'direccion.nb_direccion')
                    ->where('direccion.cod_empresa', $codigo_empresa)
                    ->distinct()
                    ->get();

        return $resultado;
    }

    public function obtener_direcciones($cod_empresa, $cod_direccion, $nb_direccion) {
        $resultado = self::select('direccion.cod_empresa',
                                    'direccion.cod_direccion',
                                    'direccion.nb_direccion',
                                    'empresa.nb_empresa as nombre_empresa'
                                    )
                                    ->join('empresa', function($join) {
                                    $join->on('direccion.cod_empresa', '=', 'empresa.cod_empresa');
                                    });
        
        if($cod_empresa != null){
            $resultado->where('direccion.cod_empresa', $cod_empresa);
        }
        if($cod_direccion != null){
            $resultado->where('direccion.cod_direccion', $cod_direccion);
        }
        if($nb_direccion != null){
            $resultado->whereRaw('LOWER(direccion.nb_direccion) LIKE ?', ['%' . strtolower($nb_direccion) . '%']);
        }else{
            $resultado->limit(100);
        }
        $resultado = $resultado->orderBy('direccion.cod_direccion', 'desc')->distinct()->get();

        return $resultado;
    }

    public function GetDireccionPorCodigo($cod_direccion){

        $resultado = self::select('direccion.cod_empresa',
                                'direccion.cod_direccion',
                                'direccion.nb_direccion',
                                )
                            ->where('direccion.cod_direccion', $cod_direccion)
                            ->first();
        return $resultado;
    }
}