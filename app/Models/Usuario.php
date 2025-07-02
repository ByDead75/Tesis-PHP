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

    public function GetUsuarios() {
                                $resultado = self::select('usuario.id', 
                                    'usuario.cedula',
                                    'usuario.nombre', 
                                    'usuario.cod_empresa',
                                    'usuario.cod_direccion',
                                    'usuario.cod_departamento',
                                    'usuario.cod_gerencia',
                                    'usuario.cod_sucursal',
                                    'usuario.fecha_registro',
                                    'usuario.user_master',
                                    'usuario.email',
                                    'usuario.cod_centro_costo',
                                );
                                /*->join('empresa', 'usuario.cod_empresa', '=', 'empresa.cod_empresa')
                                ->join('sucursales', 'usuario.cod_sucursal', '=', 'sucursales.COD_SUCURSAL')
                                ->join('centro_costo', 'usuario.cod_centro_costo', '=', 'centro_costo.id_centro')
                                ->where('usuario.cedula', $id_usuario);
                                */
                
                            $resultado->orderBy('usuario.id', 'desc')->distinct()
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