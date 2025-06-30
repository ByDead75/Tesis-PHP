<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CentroCosto extends Model{

    use HasFactory;
    protected $table = "centro_costo";
    
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        
        'id_centro',
        'centro',
        'cod_empresa',
        'cod_aprobador',
        'status_aprobador',
        'cod_director',
        'cod_gerencia',
        'centro_costocol',
    ];
    public function get_centro_costo() {
        $resultado = self::select('centro_costo.centro',
        'centro_costo.cod_aprobador')
        ->distinct()->get();

        return $resultado;
    }

    public function get_centro_costo_empresa($codigo_empresa) {
        $resultado = self::select('centro_costo.id_centro',
                    DB::raw("TRIM(REPLACE(REPLACE(REPLACE(centro_costo.centro, CHAR(13), ''), CHAR(10), ''), '\t', '')) as centro"),
                    'centro_costo.cod_gerencia',
                    'centro_costo.cod_aprobador',
                    'gerencia.nb_gerencia as gerencia',
                    'empleados1.nombre as aprobador'
                    )
                    ->join('gerencia', 'centro_costo.cod_gerencia', '=', 'gerencia.cod_gerencia')
                    ->join('empleados1', 'centro_costo.cod_aprobador', '=', 'empleados1.cedula')
                    ->where('centro_costo.cod_empresa', $codigo_empresa)
                    ->distinct()
                    ->get();

        return $resultado;
    }

    public function get_centro_costo_gerencia($codigo_empresa, $codigo_gerencia) {
        $resultado = self::select('centro_costo.id_centro',
                    DB::raw("TRIM(REPLACE(REPLACE(REPLACE(centro_costo.centro, CHAR(13), ''), CHAR(10), ''), '\t', '')) as centro")
                    )
                    ->where('centro_costo.cod_empresa', $codigo_empresa)
                    ->where('centro_costo.cod_gerencia', $codigo_gerencia)
                    ->distinct()
                    ->get();

        return $resultado;
    }
}
