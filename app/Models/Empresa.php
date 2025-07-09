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

    public function obtener_empresas($cod_empresa, $nb_empresa) {
        $resultado = self::select('empresa.cod_empresa', 
                                    'empresa.nb_empresa');
        
        if($cod_empresa != null){
            $resultado->where('empresa.cod_empresa', $cod_empresa);
        }
        if($nb_empresa != null){
            $resultado->whereRaw('LOWER(empresa.nb_empresa) LIKE ?', ['%' . strtolower($nb_empresa) . '%']);
        }else{
            $resultado->limit(100);
        }
        $resultado = $resultado->orderBy('empresa.cod_empresa', 'asc')->distinct()->get();

        return $resultado;
    }

    public function GetEmpresaPorCodigo($cod_empresa){

        $resultado = self::select('empresa.cod_empresa',
                                'empresa.nb_empresa',
                                )
                            ->where('empresa.cod_empresa', $cod_empresa)
                            ->first();
        return $resultado;
    }
}