<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Montos extends Model{

    use HasFactory;
    protected $table = "montos";
    
    //protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        
        'monto_presidencia',
        'monto_director',
    ];
}