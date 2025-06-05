<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model{

    use HasFactory;
    protected $table = "departamento";
    
    protected $primaryKey = "cod_empresa, cod_direccion, cod_gerencia, cod_departamento";

    public $timestamps = false;

    protected $fillable = [
        
        'cod_empresa',
        'cod_direccion',
        'cod_gerencia',
        'cod_departamento',
        'nb_departamento',
        'NB_ALTERNO',
        'fecha_inactivacion',
    ];
}