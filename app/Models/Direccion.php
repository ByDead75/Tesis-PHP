<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model{

    use HasFactory;
    protected $table = "direccion";
    
    protected $primaryKey = "cod_empresa, cod_direccion";

    public $timestamps = false;

    protected $fillable = [
        
        'cod_empresa',
        'cod_direccion',
        'nb_direccion',
        'fecha_inactivacion',
    ];
}