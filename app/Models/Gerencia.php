<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model{

    use HasFactory;
    protected $table = "gerencia";
    
    protected $primaryKey = "cod_empresa, cod_direccion, cod_gerencia";
    public $timestamps = false;

    protected $fillable = [
        
        'cod_empresa',
        'cod_direccion',
        'cod_gerencia',
        'nb_gerencia',
        'fecha inactivacion',
    ];

    public function get_gerencia_direccion($codigo_empresa, $codigo_direccion) {
        $resultado = self::select('gerencia.cod_gerencia',
                    'gerencia.nb_gerencia')
                    ->where('gerencia.cod_empresa', $codigo_empresa)
                    ->where('gerencia.cod_direccion', $codigo_direccion)
                    ->distinct()
                    ->get();

        return $resultado;
    }
}