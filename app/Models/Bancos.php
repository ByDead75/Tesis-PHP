<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bancos extends Model{

    use HasFactory;
    protected $table = "bancos";
    
    protected $primaryKey = "cod_banco";

    public $timestamps = false;

    protected $fillable = [
        
        'cod_banco',
        'nb_banco',
    ];

    public function get_bancos() {
        $resultado = self::select('cod_banco','nb_banco')->distinct()->get();

        return $resultado;
    }
}
