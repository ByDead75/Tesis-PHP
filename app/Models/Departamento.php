<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model{

    use HasFactory;
    protected $table = "departamento";
    
    protected $primaryKey = "cod_empresa, cod_direccion, cod_gerencia, cod_departamento";

    public $timestamps = false;

    protected $fillable = [
        
        'cod_empresa',
        'cod_direccion',
        'cod_gerencia',
        'cod_departamento',
        'nb_departamento',
        'NB_ALTERNO',
        'fecha_inactivacion',
    ];

    public function get_departamento_gerencia($codigo_empresa, $codigo_direccion, $codigo_gerencia) {
        $resultado = self::select('departamento.cod_departamento',
                    'departamento.nb_departamento')
                    ->where('departamento.cod_empresa', $codigo_empresa)
                    ->where('departamento.cod_direccion', $codigo_direccion)
                    ->where('departamento.cod_gerencia', $codigo_gerencia)
                    ->distinct()
                    ->get();

        return $resultado;
    }
}