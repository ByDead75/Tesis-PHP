<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model{

    use HasFactory;
    protected $table = "empresa";
    
    protected $primaryKey = "cod_empresa";

    public $timestamps = false;

    protected $fillable = [
        
        'cod_empresa',
        'nb_empresa',
        'logo_empresa',
    ];
}