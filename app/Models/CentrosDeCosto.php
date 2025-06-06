<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentrosDeCosto extends Model{

    use HasFactory;
    protected $table = "centros_de_costo";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        
        'id_centro',
        'centro',
    ];

    public function get_centros() {
        $resultado = self::select('id_centro','centro')->distinct()->get();

        return $resultado;
    }
}