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
    protected $casts = [
        'fecha_registro' => 'datetime:d-m-Y', 
    ];

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

    public function obtener_usuarios($cedula, $id, $nombre, $cod_departamento, 
                                $fecha_registro, $user_master, $email, $cod_centro_costo) {
                                $resultado = self::select('usuario.cedula',
                                    'usuario.id',
                                    'usuario.nombre',
                                    'usuario.cod_empresa',
                                    'usuario.cod_direccion',
                                    'usuario.cod_gerencia',
                                    'usuario.cod_departamento',
                                    'usuario.fecha_registro',
                                    'usuario.user_master',
                                    'usuario.email',
                                    'usuario.cod_centro_costo',
                                    'departamento.nb_departamento as nombre_departamento',
                                    'centro_costo.centro as nombre_centro_costo'    
                                )
                                ->join('departamento', function($join) {
                                    $join->on('usuario.cod_departamento', '=', 'departamento.cod_departamento')
                                        ->on('departamento.cod_direccion', '=', 'usuario.cod_direccion')
                                        ->on('departamento.cod_empresa', '=', 'usuario.cod_empresa');
                                })
                                ->join('centro_costo', function($join) {
                                    $join->on('usuario.cod_centro_costo', '=', 'centro_costo.id_centro')
                                        ->on('centro_costo.cod_empresa', '=', 'usuario.cod_empresa');
                                })
                                ->join('sucursales', function($join) {
                                    $join->on('usuario.cod_sucursal', '=', 'sucursales.cod_sucursal')
                                        ->on('sucursales.cod_empresa', '=', 'usuario.cod_empresa');
                                });
                if($cedula != null){
                    $resultado->where('usuario.cedula', $cedula);
                }
                if($nombre != null){
                    $resultado->whereRaw('LOWER(usuario.nombre) LIKE ?', ['%' . strtolower($nombre) . '%']);
                }
                if($cod_departamento != null){
                    $resultado->where('usuario.cod_departamento', $cod_departamento);
                }
                if($fecha_registro != null){
                    $resultado->where('usuario.fecha_registro', $fecha_registro);
                }
                if($user_master != null){
                    $resultado->where('usuario.user_master', $user_master);
                }
                if($email != null){
                    $resultado->where('usuario.email', $email);
                }
                if($cod_centro_costo != null){
                    $resultado->where('usuario.cod_centro_costo', $cod_centro_costo);
                }else{
                    $resultado->limit(50);
                }
                $resultado = $resultado->orderBy('usuario.cedula', 'asc')->distinct()->get();
                
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

    public function GetUsuariosPorId($id){

        $resultado = self::select('usuario.cedula',
                                'usuario.id',
                                'usuario.nombre',
                                'usuario.email',
                                'usuario.cod_empresa',
                                'usuario.cod_direccion',
                                'usuario.cod_gerencia',
                                'usuario.cod_departamento',
                                'usuario.fecha_registro',
                                'usuario.fecha_egreso',
                                'usuario.user_master',
                                'usuario.email',
                                'usuario.cod_centro_costo',

                                'empresa.nb_empresa as empresa_nombre',
                                'sucursales.NB_SUCURSAL as sucursal_nombre',
                                'direccion.nb_direccion as direccion_nombre',
                                'gerencia.nb_gerencia as gerencia_nombre',
                                'departamento.nb_departamento as departamento_nombre',
                                'centro_costo.centro as centro_de_costo_nombre',
                                )

                            ->join('empresa', 'usuario.cod_empresa', '=', 'empresa.cod_empresa')
                            ->join('sucursales', 'usuario.cod_sucursal', '=', 'sucursales.COD_SUCURSAL')
                            ->join('direccion', 'usuario.cod_direccion', '=', 'direccion.cod_direccion')
                            ->join('gerencia', 'usuario.cod_gerencia', '=', 'gerencia.cod_gerencia')
                            ->join('departamento', 'usuario.cod_departamento', '=', 'departamento.cod_departamento')
                            ->join('centro_costo', 'usuario.cod_centro_costo', '=', 'centro_costo.id_centro')
                            ->where('usuario.id', $id)
                            ->first();
        return $resultado;
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'cod_empresa');
    }
}