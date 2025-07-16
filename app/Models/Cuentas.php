<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class Cuentas extends Model{

    use HasFactory;
    protected $table = "cuentas";
    
    //protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        
        'cod_tipo_auxiliar',
        'cod_auxiliar',
        'destino',
        'cod_banco',
        'nu_cuenta',
    ];

    public function get_cuentas() {

    $resultado = self::select('cod_tipo_auxiliar',
                'cod_auxiliar', 
                'cod_banco', 
                'nu_cuenta', 
                'destino')
                ->distinct()
                ->get();

    return $resultado;
    }

    public function get_cuentas_proveedor($codigo_proveedor) {
        $resultado = self::select('cuentas.cod_banco',
                    DB::raw("TRIM(REPLACE(REPLACE(REPLACE(bancos.nb_banco, CHAR(13), ''), CHAR(10), ''), '\t', '')) as nb_banco"),
                    DB::raw("TRIM(REPLACE(REPLACE(REPLACE(cuentas.nu_cuenta, CHAR(13), ''), CHAR(10), ''), '\t', '')) as nu_cuenta"),
                    )
                    ->join('bancos', 'cuentas.cod_banco', '=', 'bancos.cod_banco')
                    ->where('cuentas.cod_auxiliar', $codigo_proveedor)
                    ->distinct()
                    ->get();

        return $resultado;
    }

    public function GetCuentasProveedorPorCodigo($codigo_tipo_proveedor, $codigo_proveedor) {
        $resultado = self::select('cuentas.cod_banco',
                    DB::raw("TRIM(REPLACE(REPLACE(REPLACE(bancos.nb_banco, CHAR(13), ''), CHAR(10), ''), '\t', '')) as nb_banco"),
                    DB::raw("TRIM(REPLACE(REPLACE(REPLACE(cuentas.nu_cuenta, CHAR(13), ''), CHAR(10), ''), '\t', '')) as nu_cuenta"),
                    )
                    ->join('bancos', 'cuentas.cod_banco', '=', 'bancos.cod_banco')
                    ->where('cuentas.cod_tipo_auxiliar', $codigo_tipo_proveedor)
                    ->where('cuentas.cod_auxiliar', $codigo_proveedor)
                    ->distinct()
                    ->get();

        return $resultado;
    }
}