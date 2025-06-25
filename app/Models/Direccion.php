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
}