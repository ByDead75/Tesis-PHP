<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
