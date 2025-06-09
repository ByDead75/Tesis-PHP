<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    $resultado = self::select('cod_auxiliar', 'cod_banco', 'nu_cuenta', 'destino')->distinct()->get();

    return $resultado;
    }
}