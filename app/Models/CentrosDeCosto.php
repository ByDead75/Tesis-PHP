<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroDeCostos extends Model{

    use HasFactory;
    protected $table = "centros_de_costo";

    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        
        'id_centro',
        'centro',
    ];
}