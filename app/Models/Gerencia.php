<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model{

    use HasFactory;
    protected $table = "gerencia";
    
    protected $primaryKey = "cod_empresa, cod_direccion, cod_gerencia";
    public $timestamps = false;

    protected $fillable = [
        
        'cod_empresa',
        'cod_direccion',
        'cod_gerencia',
        'nb_gerencia',
        'fecha inactivacion',
    ];
}