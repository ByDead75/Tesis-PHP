<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class Empresa extends Model{

    use HasFactory;
    protected $table = "empresa";
    
    protected $primaryKey = "cod_empresa";

    public $timestamps = false;

    protected $fillable = [
        
        'cod_empresa',
        'nb_empresa',
        'logo_empresa',
    ];

    public function get_empresas() {
        $resultado = self::select('empresa.cod_empresa',
        DB::raw("TRIM(REPLACE(REPLACE(REPLACE(empresa.nb_empresa, CHAR(13), ''), CHAR(10), ''), '\t', '')) as nb_empresa"),
        )
        ->distinct()
        ->get();

        return $resultado;
    }
}