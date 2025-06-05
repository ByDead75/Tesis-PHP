<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model{

    use HasFactory;
    protected $table = "proveedores";
    
    //protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        
        'cod_tipo_auxiliar',
        'cod_auxiliar',
        'nb_auxiliar',
        'rif',
        'nit',
    ];
}