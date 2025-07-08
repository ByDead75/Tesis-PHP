<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model{

    use HasFactory;
    protected $table = "departamento";
    
    protected $primaryKey = "cod_empresa, cod_direccion, cod_gerencia, cod_departamento";

    public $timestamps = false;

    protected $fillable = [
        
        'cod_empresa',
        'cod_direccion',
        'cod_gerencia',
        'cod_departamento',
        'nb_departamento',
        'NB_ALTERNO',
        'fecha_inactivacion',
    ];

    public function get_departamento_gerencia($codigo_empresa, $codigo_direccion, $codigo_gerencia) {
        $resultado = self::select('departamento.cod_departamento',
                    'departamento.nb_departamento')
                    ->where('departamento.cod_empresa', $codigo_empresa)
                    ->where('departamento.cod_direccion', $codigo_direccion)
                    ->where('departamento.cod_gerencia', $codigo_gerencia)
                    ->distinct()
                    ->get();

        return $resultado;
    }

    public function obtener_departamentos($cod_empresa, $cod_direccion, $cod_gerencia, 
                                            $cod_departamento, $nb_departamento) {
            $resultado = self::select('departamento.cod_empresa', 
                                    'departamento.cod_direccion', 
                                    'departamento.cod_gerencia', 
                                    'departamento.cod_departamento',
                                    'empresa.nb_empresa as nombre_empresa',
                                    'direccion.nb_direccion as nombre_direccion',
                                    'gerencia.nb_gerencia as nombre_gerencia',
                                    'departamento.nb_departamento',
                                    )
                                    ->join('empresa', function($join) {
                                    $join->on('departamento.cod_empresa', '=', 'empresa.cod_empresa');
                                    })
                                    ->join('direccion', function($join) {
                                    $join->on('departamento.cod_direccion', '=', 'direccion.cod_direccion');
                                    })
                                    ->join('gerencia', function($join) {
                                    $join->on('departamento.cod_gerencia', '=', 'gerencia.cod_gerencia');
                                    });

        if($cod_empresa != null){
            $resultado->whereRaw('LOWER(departamento.cod_empresa) LIKE ?', ['%' . strtolower($cod_empresa) . '%']);
        }
        if($cod_direccion != null){
            $resultado->whereRaw('LOWER(departamento.cod_direccion) LIKE ?', ['%' . strtolower($cod_direccion) . '%']);
        }
        if($cod_gerencia != null){
            $resultado->whereRaw('LOWER(departamento.cod_gerencia) LIKE ?', ['%' . strtolower($cod_gerencia) . '%']);
        }
        if($cod_departamento != null){
            $resultado->whereRaw('LOWER(departamento.cod_departamento) LIKE ?', ['%' . strtolower($cod_departamento). '%']);
        }
        if($nb_departamento != null){
            $resultado->whereRaw('LOWER(departamento.nb_departamento) LIKE ?', ['%' . strtolower($nb_departamento) . '%']);
        }else{
            $resultado->limit(100);
        }
        $resultado = $resultado->orderBy('departamento.cod_departamento', 'desc')->distinct()->get();

        return $resultado;
    }

    public function GetDepartamentoPorCodigo($cod_departamento){

        $resultado = self::select('departamento.cod_empresa', 
                                'departamento.cod_direccion', 
                                'departamento.cod_gerencia', 
                                'departamento.cod_departamento',
                                'departamento.nb_departamento',
                                )
                            ->where('departamento.cod_departamento', $cod_departamento)
                            ->first();
        return $resultado;
    }
}