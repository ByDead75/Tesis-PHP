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

    public function GetUsuarios($cedula) {
        $resultado = self::select('gestiones.usuarios.cedula');
                if($cedula != null){
                    $resultado->where('gestiones.usuarios.cedula', $cedula);
                }else {
                    $resultado->limit(100);
                }
                $resultado->orderBy('gestiones.usuarios.cedula', 'desc')->distinct()
                ->get();
                
        return $resultado;
    }
}