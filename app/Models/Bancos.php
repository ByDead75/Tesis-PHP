<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class Bancos extends Model{

    use HasFactory;
    protected $table = "bancos";
    
    protected $primaryKey = "cod_banco";

    public $timestamps = false;

    protected $fillable = [
        
        'cod_banco',
        'nb_banco',
    ];
/*
    public function get_bancos() {
        $resultado = self::select('cod_banco','nb_banco')->distinct()->get();

        return $resultado;
    }
*/
    public function get_agregar_banco() {
        $resultado = self::select('cod_banco', 
        DB::raw("TRIM(REPLACE(REPLACE(REPLACE(bancos.nb_banco, CHAR(13), ''), CHAR(10), ''), '\t', '')) as nb_banco"),
            )
        
        ->distinct()
        ->orderBy('cod_banco')
        ->get();

        return $resultado;
    }
}
