<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuarios extends Authenticatable {

    use HasFactory;
    protected $table = "usuarios";
    
    protected $primaryKey = "cedula";
    public $timestamps = false;

    protected $fillable = [
        
        'cedula',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function get_usuario_password(){

        return $this->password;
    }
}