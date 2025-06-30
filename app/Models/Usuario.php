<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable {

    use HasFactory;
    protected $table = "usuario";
    
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        'id',
        'cedula',
        'password',
        'nombre',
        'cod_empresa',
        'cod_direccion',
        'cod_departamento',
        'cod_gerencia',
        'cod_sucursal',
        'fecha_registro',
        'fecha_egreso',
        'user_master',  
        'email',
        'firma_digitaL',
        'cod_centro_costo',
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

    public function GetUsuarioLogeado($id_usuario){

        $resultado = self::select('usuario.cedula',
                                'usuario.nombre',
                                'usuario.cod_empresa',
                                'usuario.cod_sucursal',
                                'usuario.cod_centro_costo',

                                'empresa.nb_empresa as empresa',
                                'sucursales.NB_SUCURSAL as sucursal',
                                'centro_costo.centro as centro_de_costo',
                                )
                            ->join('empresa', 'usuario.cod_empresa', '=', 'empresa.cod_empresa')
                            ->join('sucursales', 'usuario.cod_sucursal', '=', 'sucursales.COD_SUCURSAL')
                            ->join('centro_costo', 'usuario.cod_centro_costo', '=', 'centro_costo.id_centro')
                            ->where('usuario.cedula', $id_usuario)
                            ->first();

        return $resultado;
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'cod_empresa');
    }
}