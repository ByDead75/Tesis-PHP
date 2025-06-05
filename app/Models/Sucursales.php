<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model{

    use HasFactory;
    protected $table = "sucursales";
    
    protected $primaryKey = "COD_EMPRESA, COD_SUCURSAL";
    public $timestamps = false;

    protected $fillable = [
        
        'COD_EMPRESA',
        'COD_SUCURSAL',
        'NB_SUCURSAL',
        'FECHA_INACTIVACION',
    ];
}