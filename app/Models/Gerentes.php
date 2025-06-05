<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerentes extends Model{

    use HasFactory;
    protected $table = "gerentes";
    
    //protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        
        'cod_empresa',
        'cod_trabajador',
        'fecha',
    ];
}